@extends('layouts.admin')

@section('title', 'Create User & Assign Function Privileges')

@section('content')
<div class="max-w-4xl mx-auto space-y-6" x-data="userForm()">
    <!-- Top Navigation -->
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.users.index') }}" class="p-2 rounded-xl bg-white border border-slate-200 text-slate-600 hover:text-slate-900 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <h1 class="text-2xl font-black text-slate-900 tracking-tight">Create New User</h1>
                <p class="text-xs text-slate-500">Add a staff member and customize their specific website function privileges.</p>
            </div>
        </div>
    </div>

    <!-- User Form -->
    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Account Credentials Card -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
            <h2 class="text-base font-bold text-slate-900 border-b border-slate-100 pb-3 flex items-center">
                <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center mr-2.5 text-xs font-black">1</span>
                User Credentials & Role
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">Full Name <span class="text-rose-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. Kelvin Mwangi" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm font-medium">
                    @error('name')<p class="text-xs text-rose-500 mt-1 font-semibold">{{ $message }}</p>@enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">Work Email Address <span class="text-rose-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="e.g. kelvin@skysoftsystems.co.ke" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm font-medium">
                    @error('email')<p class="text-xs text-rose-500 mt-1 font-semibold">{{ $message }}</p>@enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">Password <span class="text-rose-500">*</span></label>
                    <input type="password" name="password" required placeholder="Minimum 8 characters" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm font-medium">
                    @error('password')<p class="text-xs text-rose-500 mt-1 font-semibold">{{ $message }}</p>@enderror
                </div>

                <!-- Password Confirmation -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">Confirm Password <span class="text-rose-500">*</span></label>
                    <input type="password" name="password_confirmation" required placeholder="Repeat password" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm font-medium">
                </div>

                <!-- Role Selection -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">System Role Designation <span class="text-rose-500">*</span></label>
                    <select name="role" x-model="selectedRole" @change="applyRolePreset(selectedRole)" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm font-semibold text-slate-800">
                        @foreach($roles as $key => $role)
                        <option value="{{ $key }}" {{ old('role', 'admin') === $key ? 'selected' : '' }}>{{ $role['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Active Status -->
                <div class="flex items-center pt-6">
                    <label class="relative flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                        <span class="ml-3 text-sm font-bold text-slate-800">Account Active (Permit Login)</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Function Privileges Card -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-100 pb-4 gap-3">
                <h2 class="text-base font-bold text-slate-900 flex items-center">
                    <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center mr-2.5 text-xs font-black">2</span>
                    Granular Website Function Privileges
                </h2>

                <!-- Quick Presets -->
                <div class="flex flex-wrap items-center gap-1.5">
                    <span class="text-[11px] font-bold text-slate-400 uppercase mr-1">Quick Presets:</span>
                    <button type="button" @click="setPreset(['products.manage', 'inquiries.manage', 'posts.manage', 'settings.manage', 'users.manage'])" class="px-2.5 py-1 rounded-lg bg-purple-50 hover:bg-purple-100 text-purple-700 font-bold text-[11px] border border-purple-200 transition">All Privileges</button>
                    <button type="button" @click="setPreset(['products.manage', 'inquiries.manage'])" class="px-2.5 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-bold text-[11px] border border-emerald-200 transition">Store Manager</button>
                    <button type="button" @click="setPreset(['inquiries.manage'])" class="px-2.5 py-1 rounded-lg bg-cyan-50 hover:bg-cyan-100 text-cyan-700 font-bold text-[11px] border border-cyan-200 transition">Support Agent</button>
                    <button type="button" @click="setPreset(['posts.manage'])" class="px-2.5 py-1 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-700 font-bold text-[11px] border border-amber-200 transition">Content Editor</button>
                    <button type="button" @click="setPreset([])" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-[11px] border border-slate-200 transition">Clear All</button>
                </div>
            </div>

            <p class="text-xs text-slate-500">Check the boxes below for each module this user should be authorized to view and modify.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($availablePermissions as $key => $perm)
                <label class="flex items-start p-4 rounded-xl border border-slate-200 bg-slate-50/60 hover:bg-white hover:border-emerald-500/50 transition cursor-pointer group shadow-sm">
                    <input type="checkbox" name="permissions[]" value="{{ $key }}" x-model="permissions" class="mt-1 h-4 w-4 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                    <div class="ml-3">
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-sm text-slate-900 group-hover:text-emerald-700 transition">{{ $perm['name'] }}</span>
                            <span class="text-[10px] bg-slate-200 text-slate-700 px-1.5 py-0.5 rounded font-bold">{{ $perm['group'] }}</span>
                        </div>
                        <p class="text-xs text-slate-500 mt-1 leading-relaxed">{{ $perm['description'] }}</p>
                    </div>
                </label>
                @endforeach
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center justify-end space-x-3 pt-4">
            <a href="{{ route('admin.users.index') }}" class="px-6 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-sm transition">Cancel</a>
            <button type="submit" class="px-8 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-black text-sm shadow-md transition transform hover:-translate-y-0.5">
                Save & Assign User Privileges
            </button>
        </div>
    </form>
</div>

<script>
function userForm() {
    return {
        selectedRole: '{{ old('role', 'admin') }}',
        permissions: @json(old('permissions', ['products.manage', 'inquiries.manage', 'posts.manage'])),
        setPreset(perms) {
            this.permissions = perms;
        },
        applyRolePreset(role) {
            if (role === 'super_admin' || role === 'admin') {
                this.setPreset(['products.manage', 'inquiries.manage', 'posts.manage', 'settings.manage', 'users.manage']);
            } else if (role === 'manager') {
                this.setPreset(['products.manage', 'inquiries.manage']);
            } else if (role === 'editor') {
                this.setPreset(['posts.manage']);
            } else if (role === 'support') {
                this.setPreset(['inquiries.manage']);
            }
        }
    }
}
</script>
@endsection
