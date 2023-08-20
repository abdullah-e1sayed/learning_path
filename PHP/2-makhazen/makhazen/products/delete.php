<?php  require "../config/config.php"; ?>
 <?php if(isset($_GET['id'])&&$_GET['id']!=""){
            $id =$_GET['id'];

            $delet = $conn->query("UPDATE products set status = '0' where id = $id ;");
            
            $delet->execute();
            header("location:show-products.php");
        }else{
             header("location:show-products.php");

        }

  ?>




