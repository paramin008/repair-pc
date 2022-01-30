<?php
require_once(realpath(dirname(__FILE__) ."/db_function/connection.php"));
require_once(realpath(dirname(__FILE__) ."/db_function/function.php"));
require_once("route.php");
define("APPS", "system");

// echo password_hash(123456, PASSWORD_DEFAULT);

if(isset($_SESSION["LOGIN"]) === FALSE){
  include("apps/login/login.php");
  exit();
}

if(empty($_GET["page"])){
  $page = "dashboard";
}else{
  $page = $_GET["page"];
}

if($_SESSION["POSITION"] != 1 && $_SESSION["POSITION"] != 2 && $_SESSION["POSITION"] != 3 && $_SESSION["POSITION"] != 4){
  if($page == "system" || 
  $page == "category" || 
  $page == "category/delete" ||
  $page == "type" || 
  $page == "type/delete" ||
  $page == "brand" || 
  $page == "brand/delete" ||
  $page == "problem" || 
  $page == "problem/delete" ||
  $page == "inventory" || 
  $page == "inventory/add" ||
  $page == "inventory/edit" ||
  $page == "inventory/delete" ||
  $page == "status" || 
  $page == "status/delete" ||
  $page == "language" ||
  $page == "sendmail" ||
  $page == "users" ||
  $page == "users/add" ||
  $page == "users/edit" ||
  $page == "users/delete"
  ){
    echo "404 Page not found !";
    die();
  }
}

if($_SESSION["POSITION"] == 2){
  if($page == "repair" ||  $page == "repair/edit"){
    header("location:./");
    die();
  }
  
}


if(!empty($app_route[$page])){
  if(!file_exists($app_route[$page])){
    echo "404 Page not found !";
    die();
  }
}else{
  echo "404 Page not found !";
  die();
}

$fields = "*";
$table = "system";
$req = array(
  "system_id" => 1
);
$value = " WHERE `id` = :system_id ";
$system = fetch_all($fields,$table,$value,$req);
if(!empty($system)){
  $system = $system[0];
}else{
  header("location:./");
  exit();
}

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?php echo $system["title"];?> | <?php echo $page;?></title>

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <style>
   .picture-show {
    width: 70px;
    height: auto;
}
/*
.picture-show:hover {
    transition: all 0.3s;
    transform: scale(2);
} */
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include("include/navbar.php");?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
   <?php include("include/sidebar.php");?>

    <!-- Content Wrapper. Contains page content -->
    <?php include($app_route[$page]);?>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <?php include("include/footer.php");?>
  </div>
  <!-- ./wrapper -->

  <!-- logoutModal -->
  <?php include("include/logoutModal.php");?>

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="plugins/bs-custom-file-input/bs-custom-file-input.js"></script>
  <!-- SweetAlert2 -->
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="plugins/toastr/toastr.min.js"></script>
  <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="plugins/jquery-validation/additional-methods.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="dist/js/demo.js"></script>
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- Select2 -->
  <script src="plugins/select2/js/select2.full.min.js"></script>
  <?php
  if(!empty($app_route_js[$page]) && file_exists($app_route_js[$page])){
    echo "<script src='$app_route_js[$page]'></script>";
  }
  ?>
  <script>
  $(function () {
    // Summernote
    // $('.textarea').summernote()
    $('.textarea').summernote({
        placeholder: 'ใส่รายละเอียดอีเว้นท์ ที่นี่.',
        tabsize: 2,
        height: 400
      });
  })
</script>

</body>

</html>