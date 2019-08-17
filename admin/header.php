<?php
    session_start();
    if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
        header('location:../index.php');
        exit;
    }
    
  if(!isset($_SESSION['userSession'])){
    // header('location:../index.php');
  }else{
    $_SESSION['isLoged'] = true;
  }
  if($_SESSION['helloTitle']==1){
      echo '<script type="text/javascript">';
      echo "
      setTimeout(function () { 
        Swal.fire({
          type: 'success',
          title: 'Chào mừng ADMIN !',
          showConfirmButton: false,
          timer: 1000
        });";
      echo '}, 500);</script>';
  }
  $_SESSION['helloTitle'] = 0;
?>
<!-- query insert -->
<?php include("Query/admin_insert.php"); ?>

<!-- query delete -->
<?php include("Query/admin_delete.php"); ?>

<!-- query update -->
<?php include("Query/admin_update.php") ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./../assets/css/style.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./../assets/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./../assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="./../assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="./../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="./../assets/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="./../assets/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="./../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="./../assets/plugins/css/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- fix -->
  <link rel="stylesheet" type="text/css" href="./../assets/css/fixcss.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">