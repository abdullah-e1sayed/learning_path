<?php

$nav_item =basename(__FILE__);

require "../config/config.php" ;

session_unset();
session_destroy();

header("location:".APPURL); 
?>