<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * List all system users with role and permission indicators.
     */
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('role')) {
            $query->where('role', $request->input('role'));
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->input('status') === 'active');
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(15)->withQueryString();

        $allPermissions = $this->getAvailablePermissions();

        return view('admin.users.index', compact('users', 'allPermissions'));
    }

    /**
     * Show form to create a new user and assign permissions.
     */
    public function create()
    {
        $availablePermissions = $this->getAvailablePermissions();
        $roles = $this->getAvailableRoles();

        return view('admin.users.create', compact('availablePermissions', 'roles'));
    }

    /**
     * Display a user (redirect to edit).
     */
    public function show(User $user)
    {
        return redirect()->route('admin.users.edit', $user->id);
    }

    /**
     * Store a new user with chosen privileges.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|max:50',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string',
            'is_active' => 'nullable|boolean',
        ]);

        $permissions = $request->input('permissions', []);

        // If super_admin role is selected, give full permissions
        if ($request->input('role') === 'super_admin') {
            $permissions = array_keys($this->getAvailablePermissions());
        }

        User::create([
            'name' => $request->input('name'),
            'email' => strtolower(trim($request->input('email'))),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
            'permissions' => $permissions,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User account created successfully with assigned privileges.');
    }

    /**
     * Show form to edit user privileges and details.
     */
    public function edit(User $user)
    {
        $availablePermissions = $this->getAvailablePermissions();
        $roles = $this->getAvailableRoles();

        return view('admin.users.edit', compact('user', 'availablePermissions', 'roles'));
    }

    /**
     * Update user details and privileges.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|max:50',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string',
            'is_active' => 'nullable|boolean',
        ]);

        // Guard: Prevent logged-in user from locking themselves out
        if (Auth::id() === $user->id) {
            if (!$request->boolean('is_active', true)) {
                return back()->withErrors(['is_active' => 'You cannot deactivate your own active session.'])->withInput();
            }
        }

        $permissions = $request->input('permissions', []);

        if ($request->input('role') === 'super_admin') {
            $permissions = array_keys($this->getAvailablePermissions());
        }

        $data = [
            'name' => $request->input('name'),
            'email' => strtolower(trim($request->input('email'))),
            'role' => $request->input('role'),
            'permissions' => $permissions,
            'is_active' => $request->boolean('is_active', true),
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', "User [{$user->name}] privileges updated successfully.");
    }

    /**
     * Delete a user account safely.
     */
    public function destroy(User $user)
    {
        // Guard 1: Cannot delete own account
        if (Auth::id() === $user->id) {
            return back()->with('error', 'Action prohibited: You cannot delete your currently authenticated account.');
        }

        // Guard 2: Protect primary super administrator
        if ($user->email === 'wmutunga003@gmail.com') {
            return back()->with('error', 'Action prohibited: The primary root system administrator cannot be deleted.');
        }

        $userName = $user->name;
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', "User [{$userName}] has been removed from the system.");
    }

    /**
     * Catalog of granular system permissions.
     */
    protected function getAvailablePermissions(): array
    {
        return [
            'products.manage' => [
                'name' => 'Product Catalog & Hardware',
                'description' => 'Create, edit, upload product photos, manage prices, specifications, and promotional badges.',
                'group' => 'Catalog Management',
            ],
            'inquiries.manage' => [
                'name' => 'Customer Quotes & Inquiries',
                'description' => 'View customer RFQs, update contact handling status, export inquiries to CSV, and manage leads.',
                'group' => 'CRM & Sales',
            ],
            'posts.manage' => [
                'name' => 'Tech Insights & Blog CMS',
                'description' => 'Publish, draft, edit articles, manage tags, reading times, and cover images.',
                'group' => 'Content & Marketing',
            ],
            'settings.manage' => [
                'name' => 'Company & Tracking Settings',
                'description' => 'Update company address, phone, email, WhatsApp, SEO tags, GA4 & Meta Pixel IDs, and scripts.',
                'group' => 'System Administration',
            ],
            'users.manage' => [
                'name' => 'User Privileges & Access Control',
                'description' => 'Create new staff users, assign specific function permissions, modify roles, and manage access.',
                'group' => 'Security & RBAC',
            ],
        ];
    }

    /**
     * Available system roles.
     */
    protected function getAvailableRoles(): array
    {
        return [
            'super_admin' => [
                'name' => 'Super Administrator',
                'description' => 'Unrestricted root access to all modules, settings, and user management.',
            ],
            'admin' => [
                'name' => 'Administrator',
                'description' => 'Full administrative access with customizable function permissions.',
            ],
            'manager' => [
                'name' => 'Operations Manager',
                'description' => 'Access to product catalog, customer quote requests, and order inquiries.',
            ],
            'editor' => [
                'name' => 'Content Editor',
                'description' => 'Access to write and manage Tech Insights articles and website blog posts.',
            ],
            'support' => [
                'name' => 'Customer Support Agent',
                'description' => 'Access to view and respond to incoming customer inquiries and RFQs.',
            ],
        ];
    }
}
