<?php require "../../config/config.php";
 $nav_item = basename(__FILE__);

session_unset();
session_destroy(); <div class=""></div>
header("location:".APPURL);
?>