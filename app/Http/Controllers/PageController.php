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

    public function sitemap()
    {
        $products = Product::all();
        $posts = class_exists('\App\Models\Post') ? \App\Models\Post::published()->get() : collect();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Core Static Pages
        $staticRoutes = [
            ['url' => route('home'), 'priority' => '1.0', 'freq' => 'weekly'],
            ['url' => route('products.index'), 'priority' => '0.9', 'freq' => 'daily'],
            ['url' => route('services'), 'priority' => '0.8', 'freq' => 'weekly'],
            ['url' => route('solutions'), 'priority' => '0.8', 'freq' => 'weekly'],
            ['url' => route('about'), 'priority' => '0.7', 'freq' => 'monthly'],
            ['url' => route('contact'), 'priority' => '0.7', 'freq' => 'monthly'],
            ['url' => route('blog.index'), 'priority' => '0.8', 'freq' => 'daily'],
        ];

        foreach ($staticRoutes as $r) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($r['url']) . '</loc>';
            $xml .= '<changefreq>' . $r['freq'] . '</changefreq>';
            $xml .= '<priority>' . $r['priority'] . '</priority>';
            $xml .= '</url>';
        }

        // Dynamic Product Pages
        foreach ($products as $p) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars(route('products.show', $p->slug)) . '</loc>';
            $xml .= '<lastmod>' . $p->updated_at->toAtomString() . '</lastmod>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.85</priority>';
            $xml .= '</url>';
        }

        // Dynamic Blog Posts
        foreach ($posts as $post) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars(route('blog.show', $post->slug)) . '</loc>';
            $xml .= '<lastmod>' . ($post->updated_at ?? now())->toAtomString() . '</lastmod>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.75</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=UTF-8'
        ]);
    }

    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /admin\n";
        $content .= "Allow: /\n\n";
        $content .= "Sitemap: " . url('/sitemap.xml') . "\n";

        return response($content, 200, [
            'Content-Type' => 'text/plain; charset=UTF-8'
        ]);
    }
}
