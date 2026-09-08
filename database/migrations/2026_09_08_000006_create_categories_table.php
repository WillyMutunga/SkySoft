<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->string('slug')->unique();
                $table->text('description')->nullable();
                $table->string('icon')->nullable();
                $table->integer('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });

            // Populate initial standard categories
            $initialCategories = [
                ['name' => 'Point of Sale (POS)', 'description' => 'Touch POS terminals, barcode scanners, thermal receipt printers, and cash drawers.'],
                ['name' => 'Power Backup & UPS', 'description' => 'Online pure sine wave double-conversion UPS, backup inverter systems, and power conditioners.'],
                ['name' => 'Networking & Security', 'description' => 'Structured Cat6 LAN cabling, managed switches, routers, and enterprise cyber firewalls.'],
                ['name' => 'Enterprise Software', 'description' => 'Cloud POS ERP software, school management portals, automated M-Pesa STK, and KRA eTIMS.'],
                ['name' => 'Security & Surveillance', 'description' => 'AI facial recognition CCTV cameras, biometric time-attendance, and smart access control.'],
                ['name' => 'Hardware & Accessories', 'description' => 'POS rolls, barcode labels, server racks, patch panels, and computer accessories.'],
            ];

            foreach ($initialCategories as $index => $cat) {
                DB::table('categories')->insert([
                    'name' => $cat['name'],
                    'slug' => Str::slug($cat['name']),
                    'description' => $cat['description'],
                    'sort_order' => $index + 1,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
