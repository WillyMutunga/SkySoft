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
        // Automatically ensure new migrations and SQLite columns are executed
        try {
            if (Schema::hasTable('users')) {
                $userCols = Schema::getColumnListing('users');
                if (!in_array('role', $userCols)) {
                    \Illuminate\Support\Facades\DB::statement("ALTER TABLE users ADD COLUMN role VARCHAR DEFAULT 'admin'");
                }
                if (!in_array('permissions', $userCols)) {
                    \Illuminate\Support\Facades\DB::statement("ALTER TABLE users ADD COLUMN permissions TEXT NULL");
                }
                if (!in_array('is_active', $userCols)) {
                    \Illuminate\Support\Facades\DB::statement("ALTER TABLE users ADD COLUMN is_active TINYINT(1) DEFAULT 1");
                }
                if (!in_array('last_login_at', $userCols)) {
                    \Illuminate\Support\Facades\DB::statement("ALTER TABLE users ADD COLUMN last_login_at DATETIME NULL");
                }
            }

            if (!Schema::hasTable('categories')) {
                \Illuminate\Support\Facades\DB::statement("CREATE TABLE IF NOT EXISTS categories (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    name VARCHAR UNIQUE NOT NULL,
                    slug VARCHAR UNIQUE NOT NULL,
                    description TEXT NULL,
                    icon VARCHAR NULL,
                    sort_order INTEGER DEFAULT 0,
                    is_active TINYINT(1) DEFAULT 1,
                    created_at DATETIME NULL,
                    updated_at DATETIME NULL
                )");
            }
        } catch (\Throwable $e) {
            // Ignore if in console or running migration
        }

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
                'google_analytics_id' => '',
                'meta_pixel_id' => '',
                'custom_head_scripts' => '',
            ];

            $nonEmpty = array_filter($settings, function ($val) {
                return $val !== null && trim((string)$val) !== '';
            });

            $view->with('companySettings', array_merge($defaults, $nonEmpty));
        });
    }
}
