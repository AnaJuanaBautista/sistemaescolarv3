<?php // Example 26-4: index.php
  use Illuminate\Database\Capsule\Manager as Capsule;

  require_once 'data.php';
  require_once 'header.php';

  echo "<div class='center'>";
  
  if ($loggedin)
  { 
    $f[] = $user->nombre;//0
    $f[] = $user->iduser;//1
    $f[] = $user->apellido;//2
    $f[] = $user->español;//3
    $f[] = $user->matematicas;//4
    $f[] = $user->historia;//5
    $f[] = $user->idaccess;//6
    //primera parte que cambie
    $sql = Capsule::table('users')->select('nombre', 'iduser', 'idaccess')->where('idaccess', '=', 2)->get();
    $w = $sql;
    // aqui arriba igual cambie la w es minuscula juana
    $access = Capsule::table('users')->where('idaccess', '=' , 2)->first();
    $access = Capsule::table('users')->where('nombre', '=' , $nombre)->first();
    //$sql = queryMysql("SELECT * FROM users WHERE idaccess = '2'") or die(mysqli_error($connection));
    $idaccess= $access->idaccess;
    if($idaccess== 1 )
    {
      echo "Opciones de Maestro: <br>";

      echo   "<a data-role='button' data-inline='true' data-icon='user'
      data-transition='slide' href='actualizar.php'>Actualizar calificaciones</a>";

      echo "<br>";
      
      echo   "<a data-role='button' data-inline='true' data-icon='user'
      data-transition='slide' href='borrar.php'>Borrar calificaciones</a> <br>"; 

      echo "El siguiente formulario es para que ingreses las calficaciones de los alumnos: "; 

      echo '<center><div class="card" style="width: 30rem;">
      <div class="card-body">
      <form action="index.php" method= "get">
      <br>
      <select class="form-control" value="alumno" id="exampleFormControlSelect1" name="alumno" placeholder="SELECCIONE EL NOMBRE DEL ALUMNO AL QUE DESEA CAMBIAR LA CALIFICACION">';
      // while ($f = mysqli_fetch_array($sql)) {
        foreach ($w as $alum) {
          echo "<option value=" . $alum->iduser.">". $alum->nombre ."</option>"; 
          }
      echo '</select>
      <p>Calificacion de Español: </p>
      <input type="int" class="form-control" name="cal_esp" placeholder="Ingrese calificacion de Español"> 

      <p>Calificacion de  Matematicas: </p>
      <input type="int" class="form-control"  name="cal_mate" placeholder="Ingrese calificacion de Matematicas">

      <p>Calificacion de Historia: </p>
      <input type="int" class="form-control" name="cal_histo" placeholder="Ingrese calificacion de Historia ">
      <br>
      <input class="btn btn-primary" type="submit"  name="enviar">
    </form>
  </div>
</div> </center>';
error_reporting(E_ALL ^ E_NOTICE,);
$calEspa = $_GET["cal_esp"];
$calMate = $_GET["cal_mate"];
$calHisto = $_GET["cal_histo"];
$alumno = $_GET["alumno"];

echo   $calEspa;
echo $calMate = $_GET["cal_mate"];
echo $calHisto = $_GET["cal_histo"];
echo $alumno = $_GET["alumno"];

  if (!empty($_GET['alumno'])) {
  $id = $_GET['alumno'];  
  $id = $alumno; 
  echo  $id;
  /*queryMysql("UPDATE users 
  SET español = '$calEspa', matematicas = '$calMate', historia= '$calHisto'  
  WHERE iduser = '$id' ");*/ 
  Capsule::table('users')->where('iduser', $id)
  ->update(['español' => $calEspa]);
  Capsule::table('users')->where('iduser', $id)
  ->update(['matematicas' => $calMate]);
  Capsule::table('users')->where('iduser', $id)
  ->update(['historia' => $calHisto]);

  }


    }
    else{
//en mis f arriba cada una corresponde a un numero por lo que la f va relacionada por eso nombre es 0 y asi consecutivamente
      echo " Alumno";
      echo '<h1>Tus calificaciones: </h1>';
      echo '<br> <center> <div class="card" style="width: 18rem;">
      <div class="card-body">
      
        <h5 class="card-title">Calificaciones de '. $f[0] . '</h5>
        <h6 class="card-subtitle mb-2 text-muted">Materias: </h6>
        <ol>
          <li>
              <p>Español: ' . $f[3] . '</p>
          </li>
          <li>
          <p>Matematicas: ' . $f[4] . '</p>
      </li>

      <li>
      <p>Historia: ' . $f[5] . '</p>
  </li>';
    }
  
  }   
  else{
    echo ' Por favor registrate o inicia sesión <br>';
    echo"<a data-role='button' data-inline='true' data-icon='user'
    data-transition='slide' href='signup.php'>Registrarse</a>";
    echo  "<br>";
    echo"<a data-role='button' data-inline='true' data-icon='user'
    data-transition='slide' href='login.php'>Iniciar sesion</a>";
      }           

  echo <<<_END
      </div><br>
    </div>
    <div data-role="footer">
    </div>
  </body>
</html>
_END;
//mysqli_close($connection);
?>