
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Homeland </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="<?php echo APPURL ?>fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo APPURL ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo APPURL ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo APPURL ?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo APPURL ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo APPURL ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo APPURL ?>css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo APPURL ?>css/mediaelementplayer.css">
    <link rel="stylesheet" href="<?php echo APPURL ?>css/animate.css">
    <link rel="stylesheet" href="<?php echo APPURL ?>fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="<?php echo APPURL ?>css/fl-bigmug-line.css">
    
  
    <link rel="stylesheet" href="<?php echo APPURL ?>css/aos.css">

    <link rel="stylesheet" href="<?php echo APPURL ?>css/style.css">
    
  </head>
  <body>
  
  <div class="site-loader"></div>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu --> 

    <div class="site-navbar mt-4">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
              <h1 class="mb-0"><a href="<?php echo APPURL?>" class="text-white h2 mb-0"><strong>Homeland<span class="text-danger">.</span></strong></a></h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-right text-md-right" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li  class= <?php  ($nav_item =="index.php" AND !isset($_GET['home_type']) )? print "active":print''?>>
                    <a href="<?php echo APPURL?>">Home</a>
                  </li>
                 
                  <li class="has-children <?php  (isset($_GET['home_type']) )? print "active":print''?>">
                    <a >Properties</a>
                    <ul class="dropdown arrow-top">
                      <?php foreach($allProperties as $property):?>
                      <li><a href="<?php echo APPURL."index.php?home_type=$property->name";?> "><?php echo str_replace('-',' ',$property->name);?></a></li>
                      <?php endforeach ;?>
                     
                    </ul>
                  </li>
                  <li><a href="<?php echo APPURL ?>about.php">About</a></li>
                  <li><a href="<?php echo APPURL ?>contact.php">Contact</a></li>
                  
                  <?php if(isset($_SESSION['username'])): ?>
                  <li class="has-children">
                    <a ><?php echo $_SESSION['username']?></a>
                    <ul class="dropdown arrow-top">
                      <li><a href="<?php echo APPURL ;?>users/favorites.php">Favorites</a></li>
                      <li><a href="<?php echo APPURL; ?>users/requests.php">Requests</a></li>
                      <li><a href="<?php echo APPURL ;?>auth/logout.php">Logout</a></li>
                     
                     
                    </ul>
                  </li>
                  <?php else: ?>
                      <li class= <?php  ($nav_item =="login.php" )? print "active":print'' ?>>
                        <a href="<?php echo APPURL?>auth/login.php">Login</a>
                      </li>
                      <li class= <?php ($nav_item =="register.php" )? print "active":print'' ?> >
                      <a href="<?php echo APPURL;?>auth/register.php">Register</a>
                    </li>
                  <?php endif ; ?>
                  
                </ul>
              </nav>
            </div>
           

          </div>
        </div>
      </div>
    </div>
    
