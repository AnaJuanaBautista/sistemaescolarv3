<?php
use Illuminate\Database\Capsule\Manager as Capsule;
require_once "data.php";

echo ("
        <title>ACTUALIZAR O EDITAR</title>
    </head>
    <body>
");

if ($loggedin) {
    $access = Capsule::table('users')->select(['idaccess'])->where('idaccess', '=', 1)->first();
    //$access = Capsule::table('users')->count();
    $sql = Capsule::table('users')->select('nombre', 'iduser', 'idaccess', 'español', 'matematicas','historia')->where('idaccess', '=', 2)->get();
    $w = $sql;
    $idaccess= $access->idaccess;


    //$sql = queryMysql("SELECT * FROM users WHERE idaccess = '2'") or die(mysqli_error($connection));
    if ($idaccess == 1) {
        require_once "header.php";
        foreach ($w as $alum) {
            
    //while ($f = mysqli_fetch_array($sql)) {
        echo '<br> <center> <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">CALIFICACIONES DE '. $alum->nombre . '</h5>
          <h6 class="card-subtitle mb-2 text-muted">MATERIAS: </h6>
          <ol>
            <li>
                <p>ESPAÑOL: ' . $alum->español . '</p>
            </li>
            <form action="actualizar.php"> 
            <input type="int" class="form-control" name="cal_esp" placeholder="INSERTE CALIFICACIONES DE ESPAÑOL"> 
            <button type="submit" class="btn btn-dark" name= "id" value="' . $alum->iduser .' ">ENVIAR</button>
            
            </form>';
                error_reporting(E_ALL ^ E_NOTICE,);
             $calEspa = $_GET["cal_esp"];

             if($calEspa != 0 ){

                if (!empty($_GET['id'])) {
                $id = $_GET['id'];  
                
                Capsule::table('users')->where('iduser', $id)
                ->update(['español' => $calEspa]);
                }     
             }
          echo'  <li>
            <p>MATEMATICAS: '  . $alum->matematicas .'</p>
                </li>
                <form action="actualizar.php"> 
                <input type="int" class="form-control" name="cal_mate" placeholder="INSERTE CALIFICACIONES DE MATEMATICAS"> 
                <button type="submit" class="btn btn-dark" name= "id" value="' . $alum->iduser .' ">ENVIAR</button>
            
                </form>';
    
                 $calMate = $_GET["cal_mate"];
    
                   if($calMate != 0 ){
    
                    if (!empty($_GET['id'])) {
                    $id = $_GET['id'];  
                    
                    Capsule::table('users')->where('iduser', $id)
                    ->update(['matematicas' => $calMate]);
                    }    
                }
          echo'  <li>
                <p>HISTORIA: '  . $alum->historia . '</p>
            </li>
            <form action="actualizar.php"> 
            <input type="int" class="form-control" name="cal_histo" placeholder="INSERTE CALIFICACIONES DE HISTORIA"> 
            <button type="submit" class="btn btn-dark" name= "id" value="' . $alum->iduser .' ">ENVIAR</button>
            

            </form>';

             $calHisto = $_GET["cal_histo"];

             if($calHisto != 0 ){

                if (!empty($_GET['id'])) {
                $id = $_GET['id'];  
                
                Capsule::table('users')->where('iduser', $id)
                ->update(['historia' => $calHisto]);
                }    
            }
         echo' </ol>
         
        </div>
      </div> </center>'; 
        }
    }
}
?>