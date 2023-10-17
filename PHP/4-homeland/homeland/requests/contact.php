<?php $nav_item = basename(__FILE__);?>
<?php require "../config/config.php" ;?>
<?php 
         
         if(!empty($_POST['submit']) AND  !empty($_POST['admin_name']) AND !empty($_POST['id']) AND !empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['phone'])){
            if(filter_var($_POST['id'],FILTER_VALIDATE_INT)  ){
               // echo "<script>alert('true id :{$_POST['id']}')</script>";
               $home_id = $_POST['id'];
               $phone = $_POST['phone'];
               $user_name = $_POST['name'];
               $user_id = $_SESSION['id'] ;
               $email = $_POST['email'];
               $admin_name = $_POST['admin_name'];

               $insert = $conn->prepare("INSERT INTO contact(user_name,email,phone,home_id,user_id,admin_name) values  (:user_name,:email,:phone,:home_id,:user_id,:admin_name)");

               $insert->execute([
                  ":user_name"=> $user_name,
                  ":email"=> $email,
                  ":phone"=> $phone,
                  ":home_id"=> $home_id,
                  ":user_id"=> $user_id,
                  ":admin_name"=> $admin_name
                ]);


 
               

               header("location:". APPURL ."property-details.php?id=$home_id");
               exit;
            }else{
               echo "<script>alert('one or more input are infalid . ')</script>";
               echo "<script>window.location.href='".APPURL."404.php'</script>";
               exit;

            }

         }else{
            header("location:".APPURL."404.php");
            exit;
         }


?><?php $nav_item = basename(__FILE__);?>
<?php require "../config/config.php" ;?>
<?php 
         
         if(!empty($_POST['submit']) AND  !empty($_POST['admin_name']) AND !empty($_POST['id']) AND !empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['phone'])){
            if(filter_var($_POST['id'],FILTER_VALIDATE_INT)  ){
               // echo "<script>alert('true id :{$_POST['id']}')</script>";
               $home_id = $_POST['id'];
               $phone = $_POST['phone'];
               $user_name = $_POST['name'];
               $user_id = $_SESSION['id'] ;
               $email = $_POST['email'];
               $admin_name = $_POST['admin_name'];

               $insert = $conn->prepare("INSERT INTO contact(user_name,email,phone,home_id,user_id,admin_name) values  (:user_name,:email,:phone,:home_id,:user_id,:admin_name)");

               $insert->execute([
                  ":user_name"=> $user_name,
                  ":email"=> $email,
                  ":phone"=> $phone,
                  ":home_id"=> $home_id,
                  ":user_id"=> $user_id,
                  ":admin_name"=> $admin_name
                ]);


 
               

               header("location:". APPURL ."property-details.php?id=$home_id");
               exit;
            }else{
               echo "<script>alert('one or more input are infalid . ')</script>";
               echo "<script>window.location.href='".APPURL."404.php'</script>";
               exit;

            }

         }else{
            header("location:".APPURL."404.php");
            exit;
         }


?>