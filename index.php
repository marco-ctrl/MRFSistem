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
      $caconusu=$_POST['txt_pass'];

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
        //print_r($data);
        //session_start();
        $_SESSION['active']=true;
        $_SESSION['pacodusu']=$data['pacodusu'];
        $_SESSION['canommie']=$data['canommie'];
        $_SESSION['capatmie']=$data['capatmie'];
        $_SESSION['camatmie']=$data['camatmie'];
        $_SESSION['catipusu']=$data['catipusu'];
        $_SESSION['canomusu']=$data['canomusu'];
        $_SESSION['caurlfot']=$data['caurlfot'];
        if($_SESSION['catipusu']=='ADMINISTRADOR'){
          header('location: Vista/FRM_principal.php');
        }
        if($_SESSION['catipusu']=='SECRETARIO'){
          header('location: Vista/FRM_EscLideres.php');
        }
        if($_SESSION['catipusu']=='TESORERO'){
          header('location: Vista/FRM_Aportes.php');
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

<html>
<head>
    <title>MRFIglesiaBermejo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/MRFSistem/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="/MRFSistem/CSS/all.min.css">
    <link rel="stylesheet" href="/MRFSistem/CSS/EstilosPersonalisados.css">
    
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a href="#" class="navbar-brand">Ingresar al Sistema</a>
    </nav>
    <br>
    <div class="container p-4 h-100">
        <div class="row justify-content-center h-100">
            <div class="col-md-6">
                <div class="card border-primary mb-3 p-1">
                    <div class="card-header">
                        <h2 class="card-title text-center"><i class="fas fa-sign-in-alt"></i> Iniciar Sesion</h2>
                    </div>
                    <div class="card-body">

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><i class="fas fa-user"></i> Usuario</label>
                                <input type="text" class="form-control" name="txt_usuario" placeholder="Usuario">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"><i class="fas fa-key"></i> Contraseña</label>
                                <input type="password" class="form-control" name="txt_pass" placeholder="Contraseña">
                            </div>
                            <div id="mensaje">
                                <strong class="text-danger"><?php echo isset($alert) ? $alert:'' ?></strong>
                            </div>
                            <br>
                            <div>
                                <input type="submit" value="Ingresar" class="btn btn-primary btn-block
                                text-center">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="/MRFIglesiaBermejo/Script/jquery-3.5.1.min.js"></script>
    <script src="/MRFIglesiaBermejo/js/popper.min.js"></script>
    <script src="/MRFIglesiaBermejo/Script/bootstrap.min.js"></script>
    
</body>

</html>