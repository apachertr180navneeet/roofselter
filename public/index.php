<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Fix SCRIPT_NAME when root .htaccess rewrites to public/ subdir
if (isset($_SERVER['REQUEST_URI'], $_SERVER['SCRIPT_NAME'])) {
    $uri = $_SERVER['REQUEST_URI'];
    $script = $_SERVER['SCRIPT_NAME'];
    $common = '';
    $len = min(strlen($uri), strlen($script));
    for ($i = 0; $i < $len; $i++) {
        if ($uri[$i] === $script[$i]) {
            $common .= $uri[$i];
        } else {
            $prefix = substr($common, 0, strrpos($common, '/') + 1);
            $_SERVER['SCRIPT_NAME'] = $prefix . basename($script);
            $_SERVER['PHP_SELF'] = $prefix . basename($script);
            break;
        }
    }
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
