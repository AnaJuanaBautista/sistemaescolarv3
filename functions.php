<?php 
//cambie aca y no necesite dejar el local o lo de pasword porque ya contenia los datos nota 7
use Illuminate\Database\Capsule\Manager as Capsule;
require "vendor/autoload.php";
require "config/database.php";  


  function destroySession()
  {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
  }
?>