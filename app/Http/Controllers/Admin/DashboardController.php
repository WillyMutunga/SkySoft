<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Inquiry;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_products' => Product::count(),
            'featured_products' => Product::where('is_featured', true)->count(),
            'total_inquiries' => Inquiry::count(),
            'pending_inquiries' => Inquiry::where('status', 'pending')->count(),
            'total_users' => User::count(),
            'active_users' => User::where('is_active', true)->count(),
        ];

        $recentInquiries = Inquiry::with('product')
            ->latest()
            ->take(5)
            ->get();

        $recentProducts = Product::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentInquiries', 'recentProducts'));
    }
}
