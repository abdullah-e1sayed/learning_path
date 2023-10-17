<?php $nav_item = basename(__FILE__);?>
<?php require "../config/config.php" ;?>
<?php
         
         if(isset($_POST['submit']) AND isset($_POST['id'])){

            if(filter_var($_POST['id'],FILTER_VALIDATE_INT)){
                //echo "<script>alert('true id :{$_POST['id']}')</script>";
                $home_id = $_POST['id'];

                $check = $conn->query("SELECT * from fav where home_id= $home_id AND client_id = {$_SESSION['id']} ");
                $check->execute();
                if($check->rowCount()){
                    $fetch=$check->fetch(PDO::FETCH_OBJ);
                    if($fetch->status){
                        
                        $fav=$conn->query(" UPDATE fav set status = 0 where home_id= $home_id AND client_id = {$_SESSION['id']}");
                        header("location:". APPURL ."property-details.php?id=$home_id");                
                        exit;

                    }else{
                        $fav=$conn->query(" UPDATE fav set status = 1 where home_id= $home_id AND client_id = {$_SESSION['id']}");
                        header("location:". APPURL ."property-details.php?id=$home_id");
                
                        exit;
                    } 

               
                }else{
                    $fav=$conn->prepare("INSERT INTO fav(home_id,client_id,client_email) values (:home_id,:client_id,:client_email)");
                    $fav->execute([
                        ":home_id"=>$home_id,
                        ":client_id"=>$_SESSION['id'],
                        ":client_email"=>$_SESSION['email']
                    ]);
                    header("location:". APPURL ."property-details.php?id=$home_id");
                    exit;
                }


            }else{
                echo "<script>alert('infalid id ')</script>";
                echo "<script>window.location.href='".APPURL."property-details.php?id=$home_id '</script>";
                exit;

            }

            
            
        }else{
            header("location:".APPURL."404.php");
            exit;
        }


?>