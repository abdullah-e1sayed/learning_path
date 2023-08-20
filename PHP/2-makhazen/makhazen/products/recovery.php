<?php  require "../config/config.php"; ?>
<?php 
        
      if(isset($_GET['id']) && $_GET['id']!= ""){
          $id=$_GET['id'];

          $status=$conn->prepare("UPDATE products set status =:status where id =$id");
          $status->execute([':status'=>$_POST['status']]);

          header("location:deleted-products.php");

        }else{
            header("location:../index.php");
              exit;
            }
        
    
          


       


?>