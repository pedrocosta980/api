<?php

namespace App\Models;

use App\Models\Database;
use PDO;

class Medico extends Database{
  public static function all(){
    $pdo = self::connection();
    
    $stmt = $pdo->query("SELECT * FROM medicos");
    $all = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $all;
  }
  
  public static function show(int|string $id){
    $pdo = self::connection();

    $stmt = $pdo->prepare("
      SELECT * FROM medicos WHERE id = ?
    ");
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public static function create(array $data){
    $pdo = self::connection();

    $create = $pdo->prepare("
      INSERT INTO medicos (nome, crm, ufcrm) VALUES (?, ?, ?)
    ");
    $create->execute([
      $data["nome"],
      $data["crm"],
      $data["ufcrm"]
    ]);

    $stmt = $pdo->prepare("
      SELECT * FROM medicos WHERE id = ?
    ");
    $id = $pdo->lastInsertId();
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    return [
      "created" => $id > 0 ? true : false, 
      "data" => $data
    ];
  }

  public static function update(Int | string $id, array $data){
    $pdo = self::connection();

    $update = $pdo->prepare("UPDATE medicos SET nome = ?, crm = ?, ufcrm = ? WHERE id = ?");
    $update->execute([
      $data["nome"],
      $data["crm"],
      $data["ufcrm"],
      $id
    ]);


    $stmt = $pdo->prepare("
      SELECT * FROM medicos WHERE id = ?
    ");
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    return [
      "updated" => $update->rowCount() > 0 ? true: false,
      "data" => $data
    ];
  }

  public static function destroy(Int|String $id){
    $pdo = self::connection();

    $stmt = $pdo->prepare("
      SELECT * FROM medicos WHERE id = ?
    ");
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    $delete = $pdo->prepare("DELETE FROM medicos WHERE id = ?");

    $delete->execute([$id]);

    return [
      "deleted" => $delete->rowCount() > 0 ? true : false,
      "data" => $data
    ];
  }
}