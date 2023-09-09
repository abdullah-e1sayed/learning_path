<?php  require "../../config/config.php"; ?>

<?php
        if(isset($_GET['id']) && $_GET['id']!= ""){
            $id=$_GET['id'];

            $getimage = $conn->query("SELECT * FROM hotels where id = $id ");
            $getimage->execute();
            $fetch =  $getimage->fetch(PDO::FETCH_OBJ);

            unlink("hotel_images/".$fetch->image);

            $delete= $conn->query("DELETE FROM hotels where id = $id ");
            $delete->execute();
            header("location:show-hotels.php");


          }else{
                echo "<script>window.location.href='".ADMINURL."'</script> ";
                exit;
              }


?>

