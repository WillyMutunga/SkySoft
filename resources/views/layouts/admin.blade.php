<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | SkySoft Systems</title>
    <link rel="icon" type="image/png" href="https://img.icons8.com/color/96/server.png">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                        }
                    }
                }
            }
        }
    </script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="bg-slate-100 font-sans text-slate-800 antialiased flex min-h-screen" x-data="{ sidebarOpen: false }">

    <!-- Mobile Sidebar Backdrop -->
    <div x-show="sidebarOpen" x-cloak class="fixed inset-0 z-40 bg-slate-900/60 backdrop-blur-sm md:hidden" @click="sidebarOpen = false"></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-slate-300 flex flex-col justify-between transition-transform duration-300 ease-in-out md:translate-x-0 md:static md:inset-auto">
        <div>
            <!-- Admin Brand Logo -->
            <div class="h-20 px-6 flex items-center justify-between border-b border-slate-800">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-400 flex items-center justify-center text-white font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <div>
                        <span class="text-lg font-extrabold text-white tracking-tight">SkySoft</span>
                        <span class="text-[10px] uppercase font-bold text-emerald-400 block -mt-1">Admin Portal</span>
                    </div>
                </a>
                <button @click="sidebarOpen = false" class="md:hidden text-slate-400 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="p-4 space-y-1.5 text-sm font-medium">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-600 text-white font-semibold shadow-md' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    <span>Dashboard</span>
                </a>

                @if(Auth::user()->hasPermission('products.manage'))
                <a href="{{ route('admin.products.index') }}" class="flex items-center px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.products.*') ? 'bg-emerald-600 text-white font-semibold shadow-md' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    <span>Products Catalog</span>
                </a>

                <a href="{{ route('admin.categories.index') }}" class="flex items-center px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.categories.*') ? 'bg-emerald-600 text-white font-semibold shadow-md' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                    <span>Product Categories</span>
                </a>
                @endif

                @if(Auth::user()->hasPermission('inquiries.manage'))
                <a href="{{ route('admin.inquiries.index') }}" class="flex items-center px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.inquiries.*') ? 'bg-emerald-600 text-white font-semibold shadow-md' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>Customer Inquiries</span>
                </a>
                @endif

                @if(Auth::user()->hasPermission('posts.manage'))
                <a href="{{ route('admin.posts.index') }}" class="flex items-center px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.posts.*') ? 'bg-emerald-600 text-white font-semibold shadow-md' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    <span>Tech Insights & Blog</span>
                </a>
                @endif

                @if(Auth::user()->hasPermission('settings.manage'))
                <a href="{{ route('admin.settings.index') }}" class="flex items-center px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.settings.*') ? 'bg-emerald-600 text-white font-semibold shadow-md' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>Company Settings</span>
                </a>
                @endif

                @if(Auth::user()->hasPermission('users.manage'))
                <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.users.*') ? 'bg-emerald-600 text-white font-semibold shadow-md' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span>Users & Privileges</span>
                </a>
                @endif

                <div class="pt-4 border-t border-slate-800">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center px-4 py-2.5 text-xs text-slate-400 hover:text-emerald-400 transition">
                        <svg class="w-4 h-4 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        <span>View Live Website</span>
                    </a>
                </div>
            </nav>
        </div>

        <!-- User / Logout -->
        <div class="p-4 border-t border-slate-800">
            <div class="flex items-center justify-between mb-3 px-2">
                <div>
                    <p class="text-xs font-bold text-white flex items-center gap-1.5">
                        <span>{{ Auth::user()->name ?? 'Administrator' }}</span>
                    </p>
                    <span class="inline-block mt-1 text-[10px] font-bold px-1.5 py-0.2 rounded border {{ Auth::user()->role_badge_class ?? 'bg-slate-800 text-slate-400 border-slate-700' }}">
                        {{ Auth::user()->role_title ?? 'Staff' }}
                    </span>
                    <p class="text-[10px] text-slate-500 truncate mt-0.5">{{ Auth::user()->email ?? '' }}</p>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-rose-900/40 text-slate-300 hover:text-rose-400 text-xs font-semibold transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span>Log Out</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Admin Body -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        
        <!-- Header -->
        <header class="bg-white border-b border-slate-200 h-20 flex items-center justify-between px-6 sm:px-8">
            <div class="flex items-center">
                <button @click="sidebarOpen = true" class="md:hidden mr-4 text-slate-600 hover:text-slate-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <div>
                    <h1 class="text-xl font-bold text-slate-900">@yield('header_title', 'Management Dashboard')</h1>
                </div>
            </div>

            <div class="flex items-center space-x-3">
                <span class="hidden sm:inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold border {{ Auth::user()->role_badge_class ?? 'bg-slate-100 text-slate-700 border-slate-200' }}">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span>
                    {{ Auth::user()->role_title ?? 'Staff' }}
                </span>

                @if(Auth::user()->hasPermission('products.manage'))
                <a href="{{ route('admin.products.create') }}" class="hidden sm:inline-flex items-center px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold shadow-sm transition">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span>Add Product</span>
                </a>
                @endif
            </div>
        </header>

        <!-- Flash messages -->
        <div class="px-6 sm:px-8 pt-6">
            @if(session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-xl text-xs text-emerald-800 font-semibold mb-4">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error') || $errors->any())
            <div class="bg-rose-50 border-l-4 border-rose-500 p-4 rounded-r-xl text-xs text-rose-800 font-semibold mb-4">
                @if(session('error')) {{ session('error') }} @endif
                @if($errors->any())
                    <ul class="list-disc list-inside mt-1">
                        @foreach($errors->all() as $err) <li>{{ $err }}</li> @endforeach
                    </ul>
                @endif
            </div>
            @endif
        </div>

        <!-- Dynamic Content -->
        <main class="flex-1 overflow-y-auto p-6 sm:p-8">
            @yield('content')
        </main>
    </div>

</body>
</html>
