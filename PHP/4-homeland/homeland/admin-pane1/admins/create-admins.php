<?php $nav_item = basename(__FILE__);?>
<?php require "../../config/config.php" ;?>
<?php require "../h&f/header.php";?>
<?php  

        if(isset($_POST['submit'])   ){

          if(!empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['adminName'])){
            $adminName = $_POST['adminName'];
            $email = $_POST['email'];
            $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);

            $check = $conn->prepare("SELECT * FROM admins where email ='$email' ");
            $check->execute();
             
            if( $check->rowCount()){
                 
              echo "<script> alert('The admin is already registered . ')</script>";

            }else{

                $insert = $conn->prepare("INSERT into admins(adminName,email,pass) values  (:adminName,:email,:pass)");
                $insert->execute([
                  ":adminName" =>$adminName,
                  ":email" =>$email,
                  ":pass" =>$pass
                  
            ]);
            header("location:admins.php");
            exit;

            }

          }else{
            echo "<script> alert('one or more input are empty . ')</script>";
          }
  
        }



?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Admins</h5>

          <form method="POST" action="create-admins.php" enctype="multipart/form-data">

                <div class="form-outline mb-4 mt-4">
                  <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />
                 
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="adminName" id="form2Example1" class="form-control" placeholder="username" />
                </div>
                <div class="form-outline mb-4">
                  <input type="password" name="pass" id="form2Example1" class="form-control" placeholder="password" />
                </div>

                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

              <?php require "../h&f/footer.php";?>
