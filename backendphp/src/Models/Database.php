<?php

namespace App\Models;

use PDO;

class Database{
    public static function connection(){
      $pdo = new PDO("mysql:host=localhost;port=3306;dbname=hospital", "root", "");

      return $pdo;
    }
}