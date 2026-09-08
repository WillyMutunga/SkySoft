<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
        }

        if ($request->filled('category')) {
            $query->where('category', $request->get('category'));
        }

        $products = $query->orderBy('sort_order', 'asc')->latest()->paginate(15);
        $categories = Category::where('is_active', true)->orderBy('sort_order')->pluck('name')->toArray();
        if (empty($categories)) {
            $categories = Product::select('category')->distinct()->pluck('category')->toArray();
        }

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->orderBy('sort_order')->pluck('name')->toArray();
        if (empty($categories)) {
            $categories = [
                'Point of Sale (POS)',
                'Power Backup & UPS',
                'Networking & Security',
                'Enterprise Software',
                'Security & Surveillance',
                'Hardware & Accessories',
            ];
        }

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'badge' => 'nullable|string|max:100',
            'price' => 'nullable|numeric|min:0',
            'currency' => 'required|string|max:10',
            'price_type' => 'required|in:fixed,starting_at,custom_quote',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'features' => 'nullable|string',
            'specs' => 'nullable|string',
            'image_url' => 'nullable|string|max:1000',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'is_featured' => 'boolean',
            'in_stock' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['in_stock'] = $request->has('in_stock');
        $validated['slug'] = Str::slug($validated['name']);

        // Handle Direct Image File Upload
        if ($request->hasFile('image_file')) {
            $uploadDir = public_path('uploads/products');
            if (!File::isDirectory($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true, true);
            }
            $file = $request->file('image_file');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $validated['image_url'] = '/uploads/products/' . $filename;
        }

        if (!empty($request->features)) {
            $featuresList = array_filter(array_map('trim', explode("\n", $request->features)));
            $validated['features'] = array_values($featuresList);
        } else {
            $validated['features'] = [];
        }

        if (!empty($request->specs)) {
            $specsMap = [];
            $lines = array_filter(array_map('trim', explode("\n", $request->specs)));
            foreach ($lines as $line) {
                if (str_contains($line, ':')) {
                    [$key, $val] = explode(':', $line, 2);
                    $specsMap[trim($key)] = trim($val);
                } else {
                    $specsMap[trim($line)] = '';
                }
            }
            $validated['specs'] = $specsMap;
        } else {
            $validated['specs'] = [];
        }

        unset($validated['image_file']);
        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully with image!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('is_active', true)->orderBy('sort_order')->pluck('name')->toArray();
        if (empty($categories)) {
            $categories = [
                'Point of Sale (POS)',
                'Power Backup & UPS',
                'Networking & Security',
                'Enterprise Software',
                'Security & Surveillance',
                'Hardware & Accessories',
            ];
        }

        // Ensure current product's category is included in list if custom
        if (!empty($product->category) && !in_array($product->category, $categories)) {
            $categories[] = $product->category;
        }

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'badge' => 'nullable|string|max:100',
            'price' => 'nullable|numeric|min:0',
            'currency' => 'required|string|max:10',
            'price_type' => 'required|in:fixed,starting_at,custom_quote',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'features' => 'nullable|string',
            'specs' => 'nullable|string',
            'image_url' => 'nullable|string|max:1000',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'is_featured' => 'boolean',
            'in_stock' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['in_stock'] = $request->has('in_stock');
        $validated['slug'] = Str::slug($validated['name']);

        // Handle Direct Image File Upload
        if ($request->hasFile('image_file')) {
            $uploadDir = public_path('uploads/products');
            if (!File::isDirectory($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true, true);
            }
            $file = $request->file('image_file');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $validated['image_url'] = '/uploads/products/' . $filename;
        }

        if (!empty($request->features)) {
            $featuresList = array_filter(array_map('trim', explode("\n", $request->features)));
            $validated['features'] = array_values($featuresList);
        } else {
            $validated['features'] = [];
        }

        if (!empty($request->specs)) {
            $specsMap = [];
            $lines = array_filter(array_map('trim', explode("\n", $request->specs)));
            foreach ($lines as $line) {
                if (str_contains($line, ':')) {
                    [$key, $val] = explode(':', $line, 2);
                    $specsMap[trim($key)] = trim($val);
                } else {
                    $specsMap[trim($line)] = '';
                }
            }
            $validated['specs'] = $specsMap;
        } else {
            $validated['specs'] = [];
        }

        unset($validated['image_file']);
        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
