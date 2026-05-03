<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ ."/vendor/autoload.php";
require_once __DIR__ ."/src/routes/main.php";

use App\Http\Core;
use App\Http\Route;


Core::dispatch(Route::routes());