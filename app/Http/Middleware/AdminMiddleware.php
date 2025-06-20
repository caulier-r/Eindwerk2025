<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Log that middleware is being called
        Log::info('AdminMiddleware: STARTED', [
            'url' => $request->url(),
            'method' => $request->method()
        ]);

        $user = $request->user();

        // Controleer of gebruiker ingelogd is
        if (!$user) {
            Log::warning('AdminMiddleware: User not logged in');
            return redirect()->route('login');
        }

        Log::info('AdminMiddleware: User found', [
            'user_id' => $user->id,
            'user_email' => $user->email
        ]);

        // Check admin role
        $hasAdminRole = $user->hasRole('admin');

        Log::info('AdminMiddleware: Role check', [
            'user_id' => $user->id,
            'hasRole_admin' => $hasAdminRole,
            'all_roles' => $user->roles->pluck('name')->toArray()
        ]);

        if (!$hasAdminRole) {
            Log::error('AdminMiddleware: ACCESS DENIED', [
                'user_id' => $user->id,
                'user_roles' => $user->roles->pluck('name')->toArray()
            ]);
            abort(403, 'Geen toegang tot admin gebied. Je moet een admin zijn.');
        }

        Log::info('AdminMiddleware: ACCESS GRANTED', ['user_id' => $user->id]);
        return $next($request);
    }
}
