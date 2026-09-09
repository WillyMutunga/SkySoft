<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'permissions',
        'is_active',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'permissions' => 'array',
            'is_active' => 'boolean',
            'last_login_at' => 'datetime',
        ];
    }

    /**
     * Determine if the user is a super administrator.
     */
    public function isSuperAdmin(): bool
    {
        return ($this->role ?? '') === 'super_admin' || ($this->email ?? '') === 'wmutunga003@gmail.com';
    }

    /**
     * Check if user has a specific permission.
     */
    public function hasPermission(string $permission): bool
    {
        if ($this->isSuperAdmin()) {
            return true;
        }

        if ($this->is_active === false || $this->is_active === 0 || $this->is_active === '0') {
            return false;
        }

        $permissions = $this->permissions;
        if (is_string($permissions)) {
            $permissions = json_decode($permissions, true) ?: [];
        }
        if (!is_array($permissions)) {
            $permissions = [];
        }

        return in_array('*', $permissions, true) || in_array($permission, $permissions, true);
    }

    /**
     * Check if user has any of the given permissions.
     */
    public function hasAnyPermission(array $permissions): bool
    {
        if ($this->isSuperAdmin()) {
            return true;
        }

        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Human-readable role label.
     */
    public function getRoleTitleAttribute(): string
    {
        $role = $this->role ?? 'admin';
        return match ($role) {
            'super_admin' => 'Super Administrator',
            'admin' => 'Administrator',
            'manager' => 'Operations Manager',
            'editor' => 'Content & Catalog Editor',
            'support' => 'Support Specialist',
            default => ucfirst(str_replace('_', ' ', (string)$role)),
        };
    }

    /**
     * Role badge Tailwind styling.
     */
    public function getRoleBadgeClassAttribute(): string
    {
        $role = $this->role ?? 'admin';
        return match ($role) {
            'super_admin' => 'bg-purple-100 text-purple-800 border-purple-200',
            'admin' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
            'manager' => 'bg-blue-100 text-blue-800 border-blue-200',
            'editor' => 'bg-amber-100 text-amber-800 border-amber-200',
            'support' => 'bg-cyan-100 text-cyan-800 border-cyan-200',
            default => 'bg-slate-100 text-slate-800 border-slate-200',
        };
    }
}
