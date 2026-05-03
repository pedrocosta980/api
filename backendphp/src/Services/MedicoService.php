<?php

namespace App\Services;

use App\Utils\Validator;
use Exception;
use PDOException;
use App\Models\Medico;

class MedicoService{
  public static function all(){
    try{
      $all = Medico::all();
    
      return $all ? $all : [];
    }catch(PDOException $e){
      return ["message" => $e->getMessage(), (int)$e->getCode()];
    }catch(Exception $e){
      return ["message" => $e->getMessage()];
    }
  }

  public static function show(Int | String $id){
    try{
      $medico = Medico::show($id);
    
      return $medico ? $medico : [];
    }catch(PDOException $e){
      return ["message" => $e->getMessage(), (int)$e->getCode()];
    }catch(Exception $e){
      return ["message" => $e->getMessage()];
    }
  }

  public static function create(array $data){
    try{
      $fields = Validator::validate([
        "nome" => $data["nome"] ?? "",
        "crm" => $data["crm"] ?? "",
        "ufcrm" => $data["ufcrm"] ?? "",
      ]);

      $medico = Medico::create($fields);

      return $medico;
    }catch(PDOException $e){
      return ["message" => $e->getMessage(), (int)$e->getCode()];
    }catch(Exception $e){
      return ["message" => $e->getMessage()];
    }
  }

  public static function update(Int | string $id, array $data){
    try{
      $fields = Validator::validate([
        "nome" => $data["nome"] ?? "",
        "crm" => $data["crm"] ?? "",
        "ufcrm" => $data["ufcrm"] ?? "",
      ]);

      $medico = Medico::update($id, $data);
      
      return $medico;
    }catch(PDOException $e){
      return ["message" => $e->getMessage()];
    }catch(Exception $e){
      return ["message" => $e->getMessage()];
    }
  }

  public static function destroy(Int | String $id){
    try{
      $medico = Medico::destroy($id);

      return $medico;
    }catch(PDOException $e){
      return ["message" => $e->getMessage()];
    }catch(Exception $e){
      return ["message" => $e->getMessage()];
    }
  }
}