<?php define("APPURL","http://localhost/Makhazen"); 

session_start();

if(!isset($_SESSION['username']) && $nav_item!="login.php"){
  header("location:".APPURL."/auth/login.php");

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Makhazen</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
     <link href="<?php  echo APPURL?>/styles/style.css" rel="stylesheet"> 
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" href="<?php echo APPURL?>">Makhazen</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">
        <?php  if(isset($_SESSION['username'])):?>
        <ul class="navbar-nav side-nav" >
          <li class="nav-item">
            <a class="nav-link" style="margin-left: 20px;" href="<?php  echo APPURL?>">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php  echo APPURL?>/purchases/show-purchases.php" style="margin-left: 20px;">المشتريات</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php  echo APPURL?>/categories/show-categories.php" style="margin-left: 20px;">الأصناف</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php  echo APPURL?>/products/show-products.php" style="margin-left: 20px;">المنتجات</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo APPURL?>/products/deleted-products.php" style="margin-left: 20px;">المنتجات المحذوفه</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">
         

          <li class="nav-item dropdown">
            <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php ECHO $_SESSION['username'];?>
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo APPURL?>/auth/logout.php">Logout</a>
              
          </li>
          <?php  else:?>
            <ul class="navbar-nav ml-md-auto d-md-flex">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo APPURL?>/auth/login.php">login
            </a>
          </li>
          <?php  endif;?>            
          
        </ul>
       
      </div>
    </div>
    </nav>
    <div class="container-fluid">