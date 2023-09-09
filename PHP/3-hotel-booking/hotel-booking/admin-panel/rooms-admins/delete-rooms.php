<?php  require "../../config/config.php"; ?>

<?php
        if(isset($_GET['id']) && $_GET['id']!= ""){
            $id=$_GET['id'];

            $getimage = $conn->query("SELECT * FROM rooms where id = $id ");
            $getimage->execute();
            $fetch =  $getimage->fetch(PDO::FETCH_OBJ);

            unlink("room_images/".$fetch->image);

            $delete= $conn->query("DELETE FROM rooms where id = $id ");
            $delete->execute();
            header("location:show-rooms.php");


          }else{
                echo "<script>window.location.href='".ADMINURL."'</script> ";
                exit;
              }


?>

