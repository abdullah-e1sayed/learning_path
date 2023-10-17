<?php $nav_item = basename(__FILE__);
 require "../../config/config.php" ;
 require "../h&f/header.php";

 if(!isset($_SERVER['HTTP_REFERER'])){
    header("location:".ADMINURL); 
    exit;

 }elseif(isset($_GET['id']) && $_GET['id'] != "" ){
    $id = $_GET['id'];
    if(filter_var($id, FILTER_VALIDATE_INT)){
        $delete = $conn->query("DELETE  FROM properties where id = '$id'");
        $delete->execute();
        header("location:show-categories.php");

    }else{
    header("location:".ADMINURL);
    exit;

 }


 }else{
    header("location:".ADMINURL);
    exit;

 }
















?>
