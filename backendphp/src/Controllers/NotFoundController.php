<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;

class NotFoundController{
  public static function index(Request $request, Response $response){
    $response::json([
      "message" => "Route not found",
      "type" => "error"
    ], 404);
    return;
  }
}