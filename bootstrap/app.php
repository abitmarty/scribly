<?php

// Suppress PDO MySQL deprecation warnings (PHP 8.5+)
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    if (strpos($errstr, 'PDO::MYSQL_ATTR_SSL_CA') !== false) {
        return true;
    }
    return false;
}, E_DEPRECATED);

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
