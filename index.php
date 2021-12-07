<?php 
  
  session_start();
  
  if(!empty($_SESSION['active'])){
    header('location: Vista/FRM_principal.php');
  }
  else{

  $alert='';
  if (!empty($_POST)){
    if(empty($_POST['txt_usuario']) || empty($_POST['txt_pass'])){
      $alert='Ingrese su usuario y contraseña';
    }
    else{
      require_once "AccesoDatos/Conexion/Conexion.php";

      $canomusu=$_POST['txt_usuario'];
      $caconusu=sha1($_POST['txt_pass']);

      $consulta = "SELECT caconusu, 
                          catipusu, 
                          canomusu, 
                          pacodusu, 
                          facodmie, 
                          caestusu,
                          canommie,
                          capatmie,
                          camatmie,
                          caurlfot
                    FROM  ausurio usu, 
                          amiebro mbr 
                    WHERE 
                          pacodmie=facodmie
                    and   caestusu=TRUE
                    and   caconusu='{$caconusu}'      
                    and   canomusu='{$canomusu}'";
      
      $resultado = mysqli_query($conexion, $consulta);

      if( mysqli_num_rows($resultado) > 0 ){
        $data=mysqli_fetch_array($resultado);
        
        $_SESSION['active']=true;
        $_SESSION['pacodusu']=$data['pacodusu'];
        $_SESSION['canommie']=$data['canommie'];
        $_SESSION['capatmie']=$data['capatmie'];
        $_SESSION['camatmie']=$data['camatmie'];
        $_SESSION['catipusu']=$data['catipusu'];
        $_SESSION['canomusu']=$data['canomusu'];
        $_SESSION['caurlfot']=$data['caurlfot'];
        if($_SESSION['catipusu']=='ADMINISTRADOR'){
          header('location: Vista/FRM_principal');
        }
        if($_SESSION['catipusu']=='SECRETARIO'){
          header('location: Vista/FRM_EscLideres.php');
        }
        if($_SESSION['catipusu']=='TESORERO'){
          header('location: Vista/FRM_Finanzas.php');
        }
        
      }
      else{
        $alert='usuario y/o contraseña incorrectos';
        session_destroy();
      }

    }
  }
}
?>

<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MRFSistem - Login</title>
    <link rel="shortcut icon" href="img/iglesia.png">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/EstilosPersonalisados.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <?php include "Vista/Cargando.php" ?>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Ingresar al Sistema</h1>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="txt_usuario"
                                                placeholder="Usuario">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="txt_pass" placeholder="Contraseña">
                                        </div>
                                        <div id="mensaje">
                                            <strong class="text-danger"><?php echo isset($alert) ? $alert:'' ?></strong>
                                        </div>
                                        <hr>
                                        <div>
                                            <input type="submit" value="Ingresar" class="btn btn-primary btn-block
                                                    text-center">
                                        </div>
                                        <hr>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="Script/App.js"></script>

</body>

</html>