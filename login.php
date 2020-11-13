<?php
    use Illuminate\Database\Capsule\Manager as Capsule;
    require_once 'data.php';
    require_once "header.php";
  
    $error = $nombre = $pass = "";
    echo'

    <title>Iniciar sesión</title>

</head>

<body>
    <!-- project start -->
    <div class="container-fluid">
    ';

if(!$loggedin)
{

    if (isset($_POST['user']))
    {
        $nombre =  ($_POST['user']);
        $pass = ($_POST['pass']);

        if($nombre == "" || $pass == "")
            $error = 'No se ingresaron todos los campos';
        else
        {
         $user = Capsule::table('users')->select(['nombre', 'contra'])->where('nombre', $nombre)->where('contra', $pass)->first();

          //$result = queryMySQL("SELECT nombre, contra from users
          //WHERE nombre = '$nombre' AND contra = '$pass'");

            if (!$user)
            {
                $error = "Cuenta o contraseña no válida";
            }
            else
            {
                $_SESSION['user'] = $nombre;
                $_SESSION['pass'] = $pass;
                die("
                <div class='check'>
                    <meta http-equiv='Refresh' content='3;url=index.php'>
                    <h1>A iniciado sesión correctamente. Será redirigido en unos segundos.<h1>
                    <h1>De otra manera <a href='index.php' class='linkL'>click aqui</a></h1>
                </div>
                </div></body></html>");
            }
            //mysqli_free_result($result);
        }
    }

    echo <<<_END
    <div class="row">
    <div class="col-10 offset 1 col-md-10 offset-md-1 mt-2 login shadow animate__animated animate__fadeIn animate__slow">
        <form method='post' action='login.php'>
            <label></label>
            <h3>Ingrese sus datos para iniciar sesión.</h3>
            <br>
            <span class='error'><h4>$error</h4></span>
            <div class="form-group">
                <label for="user">Nombre de usuario</label>
                <input type="user" name="user" class="form-control" placeholder="Ingrese usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>
            </div>
            <input class="mt-3 btn btn-primary" type='submit' onclick="cifrar()" value='Iniciar sesión'>
            <br>
            <p style="color:'white';"></p>
        </form>
    </div>
</div>
</div>
<!-- project end-->
</body>

</html>
_END;
}
else
{
    echo'
    <meta http-equiv="Refresh" content="0;url=index.php">
    </div></body></html>
    ';
}
//mysqli_close($connection);
?>