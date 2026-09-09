<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('admin.login');
        }

        if ($user->is_active === false || $user->is_active === 0 || $user->is_active === '0') {
            Auth::logout();
            return redirect()->route('admin.login')->withErrors([
                'email' => 'Your account has been deactivated. Please contact your system administrator.'
            ]);
        }

        if (!$user->hasPermission($permission)) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Access Denied: Insufficient privileges.'], 403);
            }
            return redirect()->route('admin.dashboard')->with('error', 'Access Denied: You do not have permission to access the requested module.');
        }

        return $next($request);
    }
}
