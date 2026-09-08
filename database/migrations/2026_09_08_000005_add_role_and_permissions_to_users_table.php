<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('admin');
            }
            if (!Schema::hasColumn('users', 'permissions')) {
                $table->text('permissions')->nullable();
            }
            if (!Schema::hasColumn('users', 'is_active')) {
                $table->boolean('is_active')->default(true);
            }
            if (!Schema::hasColumn('users', 'last_login_at')) {
                $table->timestamp('last_login_at')->nullable();
            }
        });

        // Set existing users as super_admin with all permissions
        DB::table('users')->update([
            'role' => 'super_admin',
            'permissions' => json_encode([
                'products.manage',
                'inquiries.manage',
                'posts.manage',
                'settings.manage',
                'users.manage',
            ]),
            'is_active' => true,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'permissions', 'is_active', 'last_login_at']);
        });
    }
};
