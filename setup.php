<!DOCTYPE html>
<html>
  <head>
    <title>Configurar base de datos</title>
  </head>
  <body>

    <h3>Configurando...</h3>

<?php // Example 26-3: setup.php
use Illuminate\Database\Capsule\Manager as Capsule;
require_once 'functions.php';
require_once 'createdb.php';
require "vendor/autoload.php";
require "config/database.php";

Capsule::schema()->create('users', function ($table) {
 $table->integer('iduser')->autoIncrement();
 $table->string('nombre')->unique();
 $table->string('apellido');
 $table->string('contra');
 $table->integer('idaccess');
 $table->integer('español');
 $table->integer('matematicas');
 $table->integer('historia');
});
Capsule::table('users')->insert(['nombre' => 'Uriel', 'apellido' => 'Ceron', 'contra' => '123456', 'idaccess' => '1', 'español' =>'0' , 'matematicas'=> '0', 'historia'=> '0']);
 ?>   
 <br>...hecho.
  </body>
</html>
