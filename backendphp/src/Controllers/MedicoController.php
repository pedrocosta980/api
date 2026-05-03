<?php

namespace App\Controllers;

use App\Http\Response;
use App\Http\Request;
use App\Services\MedicoService;

class MedicoController{

  public static function index(Request $request, Response $response){
    $medicoService = MedicoService::all();
    
    $response::json([
      'data'=> $medicoService
    ], 200);
  }

  public static function show(Request $request, Response $response, array $params){
    [$id] = $params;

    $medicoService = MedicoService::show($id);
    
    $response::json([
      'data'=> $medicoService
    ], 200);
  }
  
  public static function create(Request $request, Response $response){
    $body = $request::body();
    $medicoService = MedicoService::create($body);

    if(isset($medicoService["error"])){
      return $response::json([
        "type" => "error",
        "message" => $medicoService["error"]
      ]);
    }
    
    if(!$medicoService["created"]){
      return $response::json([
        "data" => [],
        "message" => "Erro ao tentar cadastrar"
      ], 500);
    }

    return $response::json([
      "data" => $medicoService["data"],
      "message" => "Cadastro feito com sucesso!"
    ], 200);
  }

  public static function update(Request $request, Response $response, array $params){
    [$id] = $params;
    $data = $request::body();

    $medicoService = MedicoService::update($id, $data);

    if(isset($medicoService["error"])){
      return $response::json([
        "type" => "error",
        "message" => $medicoService["error"]
      ]);
    }

    if(!$medicoService["updated"]){
      return $response::json([
        "data" => [],
        "message" => "Medico não atualizado"
      ], 500);
    }

    return $response::json([
      'data'=> $medicoService,
      "message" => "Atualizado com sucesso!"
    ], 200);
  }

  public static function destroy(Request $request, Response $response, array $params){
    [$id] = $params;

    $medicoService = MedicoService::destroy($id);
    
    if(!$medicoService["deleted"]){
      return $response::json([
        "data" => [],
        "message" => "Erro ao tentar deletar"
      ], 500);
    }

    return $response::json([
      'data'=> $medicoService["data"],
      "message" => "Deletado com sucesso!"
    ], 200);
  }
}
