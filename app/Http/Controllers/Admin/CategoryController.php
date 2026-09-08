<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display all product categories.
     */
    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $categories = $query->withCount('products')
                            ->orderBy('sort_order', 'asc')
                            ->orderBy('name', 'asc')
                            ->paginate(15)
                            ->withQueryString();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show form to create a new category.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a new product category.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'description' => 'nullable|string|max:1000',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);

        Category::create([
            'name' => trim($validated['name']),
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.categories.index')->with('success', "Product Category [{$validated['name']}] created successfully.");
    }

    /**
     * Display a single category (redirect to edit).
     */
    public function show(Category $category)
    {
        return redirect()->route('admin.categories.edit', $category->id);
    }

    /**
     * Show form to edit a category.
     */
    public function edit(Category $category)
    {
        $category->loadCount('products');
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update an existing product category.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('categories')->ignore($category->id)],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('categories')->ignore($category->id)],
            'description' => 'nullable|string|max:1000',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $oldName = $category->name;
        $newName = trim($validated['name']);
        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($newName);

        $category->update([
            'name' => $newName,
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        // If category name was renamed, update linked products to preserve relationships
        if ($oldName !== $newName) {
            Product::where('category', $oldName)->update(['category' => $newName]);
        }

        return redirect()->route('admin.categories.index')->with('success', "Product Category [{$newName}] updated successfully.");
    }

    /**
     * Delete a category safely.
     */
    public function destroy(Category $category)
    {
        $productCount = Product::where('category', $category->name)->count();

        if ($productCount > 0) {
            return back()->with('error', "Cannot delete category [{$category->name}] because it currently contains {$productCount} products. Please reassign or delete the products first.");
        }

        $categoryName = $category->name;
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', "Category [{$categoryName}] has been deleted.");
    }
}
