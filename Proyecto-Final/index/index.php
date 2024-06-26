<?php
    include("controller.php");
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Index - Vía Digital</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="script.js"></script>
</head>

<body>
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a>Via Digital</a>
        <span class="badge badge-pill badge-primary">Beta</span>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <!--div class="user-pic">
          <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
            alt="User picture">
        </div-->
        <div class="user-info">
          <span class="user-name"><?php echo $user; ?></span>
          <span class="user-role"><?php echo $email; ?></span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>En linea</span>
          </span>
        </div>
      </div>
      <!-- sidebar-menu  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>Menú Principal</span>
          </li>
          <li>
            <a href="#" onclick="changeForms('../reportTable/reportTable.php')">
              <i class="fa fa-book"></i>
              <span>Mis Reportes</span>
            </a>
          </li>
          <li>
            <a href="#" onclick="changeForms('../reportForm/reportForm.php')">
              <i class="fa fa-calendar"></i>
              <span>Nuevo Reporte</span>
            </a>
          </li>
          <li>
            <a href="#" onclick="changeForms('../account/account.php')">
              <i class="fa fa-folder"></i>
              <span>Cuenta</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="controller.php?logout=true">
        <i class="fa fa-power-off"></i>
        <span>Cerrar Sesión</span>
      </a>
    </div>
  </nav>
  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
    <iframe id="formFrame" src="../reportTable/reportTable.php" width="100%" height="90%" class="frame"></iframe>

      <footer class="text-center">
        <div class="mb-2">
          <small>
            © 2024 | Felipe Pulido - Eduard Talero - Sebastián Suarez - Lorena Zapata
            </a>
          </small>
        </div>
      </footer>
    </div>
  </main>
  <!-- page-content" -->
</div>
<!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    
</body>
<script>
  var savedURL = localStorage.getItem('iframeURL');
  if (savedURL) {
    document.getElementById('formFrame').src = savedURL;
  }

  window.addEventListener('beforeunload', function() {
    localStorage.setItem('iframeURL', document.getElementById('formFrame').src);
  });

  function changeForms(archivo) {
    document.getElementById('formFrame').src = archivo;
  }
</script>
</html>