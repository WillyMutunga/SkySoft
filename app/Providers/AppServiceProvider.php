<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share company settings globally with all Blade views
        View::composer('*', function ($view) {
            $settings = [];
            try {
                if (Schema::hasTable('settings')) {
                    $settings = Setting::getAllAsMap();
                }
            } catch (\Exception $e) {
                $settings = [];
            }

            // Defaults fallback
            $defaults = [
                'company_phone' => '+254 712 345 678',
                'company_whatsapp' => '+254712345678',
                'company_email' => 'info@skysoftsystems.co.ke',
                'sales_email' => 'sales@skysoftsystems.co.ke',
                'office_address' => 'Nairobi, Kenya',
                'working_hours' => 'Mon - Sat: 8:00 AM - 6:00 PM',
                'tagline' => 'Smart IT Systems & Power Infrastructure Kenya',
                'facebook_url' => 'https://facebook.com',
                'linkedin_url' => 'https://linkedin.com',
                'twitter_url' => 'https://twitter.com',
            ];

            $view->with('companySettings', array_merge($defaults, $settings));
        });
    }
}
