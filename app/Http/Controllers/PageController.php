<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $featuredProducts = Product::where('is_featured', true)
            ->orderBy('sort_order', 'asc')
            ->take(4)
            ->get();

        $categories = Product::select('category')
            ->distinct()
            ->pluck('category');

        return view('pages.home', compact('featuredProducts', 'categories'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function solutions()
    {
        return view('pages.solutions');
    }

    public function contact()
    {
        $products = Product::orderBy('name', 'asc')->get();
        return view('pages.contact', compact('products'));
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'product_id' => 'nullable|exists:products,id',
            'message' => 'required|string|max:3000',
        ]);

        Inquiry::create($validated);

        return redirect()->back()->with('success', 'Thank you for reaching out! Our technology team in Nairobi will contact you within 2 business hours.');
    }
}
