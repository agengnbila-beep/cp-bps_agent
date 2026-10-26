<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// 1. Eksekusi konfigurasi dan buat instance aplikasi (cukup 1 kali)
$app = Application::configure(basePath: dirname(__DIR__))
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

// 2. Timpa direktori storage HANYA setelah instance $app berhasil dibuat
if (isset($_ENV['VERCEL_REGION']) || env('VERCEL')) {
    $app->useStoragePath('/tmp/storage');
}

// Tidak perlu blok 'else' karena jika dijalankan di lokal, 
// Laravel otomatis menggunakan path bawaannya (dirname(__DIR__).'/storage')

return $app;