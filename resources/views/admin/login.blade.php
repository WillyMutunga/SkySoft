<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | SkySoft Systems</title>
    <link rel="icon" type="image/png" href="https://img.icons8.com/color/96/server.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 font-sans text-slate-800 antialiased min-h-screen flex items-center justify-center p-4">
    
    <div class="w-full max-w-md bg-white rounded-3xl p-8 sm:p-10 shadow-2xl border border-slate-800 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500 rounded-bl-full opacity-10 pointer-events-none"></div>

        <!-- Logo & Header -->
        <div class="text-center space-y-2 mb-8">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-400 flex items-center justify-center text-white mx-auto shadow-lg shadow-emerald-500/30">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">SkySoft Admin Portal</h1>
            <p class="text-xs text-slate-500">Sign in to manage products, pricing, and inquiries</p>
        </div>

        @if(session('success'))
        <div class="bg-emerald-50 text-emerald-800 p-3.5 rounded-xl text-xs font-semibold mb-6 border border-emerald-200">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="bg-rose-50 text-rose-800 p-3.5 rounded-xl text-xs font-semibold mb-6 border border-rose-200">
            {{ $errors->first() }}
        </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Email Address</label>
                <input type="email" name="email" required value="{{ old('email', 'wmutunga003@gmail.com') }}" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Password</label>
                <input type="password" name="password" required placeholder="••••••••" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
            </div>

            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center text-slate-600">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500 border-slate-300 mr-2">
                    <span>Keep me logged in</span>
                </label>
            </div>

            <div>
                <button type="submit" class="w-full py-3.5 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-lg shadow-emerald-600/30 transition">
                    Sign In to Dashboard
                </button>
            </div>
        </form>

        <div class="mt-8 pt-6 border-t border-slate-100 text-center">
            <a href="{{ route('home') }}" class="text-xs text-slate-500 hover:text-emerald-600 transition">&larr; Return to Public Website</a>
        </div>
    </div>

</body>
</html>
