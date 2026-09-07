<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->get('category');
        $search = $request->get('search');

        $query = Product::query();

        if ($selectedCategory && $selectedCategory !== 'all') {
            $query->where('category', $selectedCategory);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $products = $query->orderBy('sort_order', 'asc')->paginate(12);

        $categories = Product::select('category')
            ->distinct()
            ->pluck('category');

        return view('pages.products', compact('products', 'categories', 'selectedCategory', 'search'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->take(3)
            ->get();

        return view('pages.product-detail', compact('product', 'relatedProducts'));
    }

    public function datasheet($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('pages.product-datasheet', compact('product'));
    }

    public function submitQuote(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'company' => 'nullable|string|max:255',
            'quantity' => 'nullable|string|max:50',
            'message' => 'nullable|string|max:2000',
        ]);

        $customMessage = "Quote Request for: " . $product->name;
        if (!empty($validated['quantity'])) {
            $customMessage .= " | Quantity: " . $validated['quantity'];
        }
        if (!empty($validated['message'])) {
            $customMessage .= "\n\nClient Note: " . $validated['message'];
        }

        Inquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'company' => $validated['company'] ?? null,
            'subject' => "Quote Request: " . $product->name,
            'message' => $customMessage,
            'product_id' => $product->id,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Your quote request for ' . $product->name . ' has been received! Our sales specialists will get in touch shortly.');
    }
}
