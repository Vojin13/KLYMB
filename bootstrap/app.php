<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);
        $middleware->web(\App\Http\Middleware\ActivityLogMiddleware::class);
        $middleware->redirectGuestsTo(fn () => abort(403, 'Access Denied. You do not have the required credentials to access this secure area. Please sign in with an authorized account to continue.'));
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
