<?php $nav_item = basename(__FILE__);
 require "../../config/config.php" ;
 require "../h&f/header.php";

 if(!isset($_SERVER['HTTP_REFERER'])){
    header("location:".ADMINURL);
    exit;

 }elseif(isset($_GET['id']) && $_GET['id'] != "" ){
    $id = $_GET['id'];
    if(filter_var($id, FILTER_VALIDATE_INT)){

      $image = $conn->query("SELECT * FROM props where id = '$id'");
      $image->execute();
      $fetch_image=$image->fetch(PDO::FETCH_OBJ);

      unlink("../../images/thumbnail/".$fetch_image->image);

      $gallery = $conn->query("SELECT * FROM home_images where prop_id = '$id'");
      $gallery->execute();
      $fetch_gallery=$gallery->fetchAll(PDO::FETCH_OBJ);

      foreach($fetch_gallery as $gallery){
         unlink("../../images/gallery/".$gallery->image);
      }

        $delete = $conn->query("DELETE  FROM props where id = '$id'");
        $delete->execute();

        $delete = $conn->query("DELETE  FROM home_images where prop_id = '$id'");
        $delete->execute();

        header("location:show-properties.php");

    }else{
    header("location:".ADMINURL);
    exit;

 }


 }else{
    header("location:".ADMINURL);
    exit;

 }
















?>
