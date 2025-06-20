<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckPlan;
use App\Http\Middleware\AdminMiddleware; // ✅ Voeg deze import toe

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'check.plan' => CheckPlan::class,
            'admin' => AdminMiddleware::class, // ✅ Voeg admin middleware toe
        ]);

        // ✅ Exclure le webhook Stripe de la protection CSRF
        $middleware->validateCsrfTokens(except: [
            'stripe/webhook', // 👈 C'est tout ce qu'il faut
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
