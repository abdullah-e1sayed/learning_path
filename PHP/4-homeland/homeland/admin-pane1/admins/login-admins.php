<?php $nav_item = basename(__FILE__);?>
<?php require "../../config/config.php" ;?>
<?php require "../h&f/header.php";?>

  <?php    


          if(isset($_SESSION['adminName'])){
            header("location:".ADMINURL);
          }else{
           
           if(isset($_POST['submit'])){
            if(empty($_POST['email'] ) or empty($_POST['pass']  )){
              echo "<script> alert('one or more input are empty ')</script>";
      
            }else {
              $email = $_POST['email'];
              $pass = $_POST['pass'];
      
              $login= $conn->prepare("SELECT * from admins where email = '$email'");
              $login->execute();
      
              if($login->rowCount()){
                $fetch= $login->fetch(PDO::FETCH_ASSOC);
                if(password_verify($pass,$fetch['pass'])){
                  $_SESSION['adminName']=$fetch['adminName'];
                  $_SESSION['email']=$fetch['email'];
                  $_SESSION['id']=$fetch['id'];
                  header("location:".ADMINURL);
                }else{
                  echo "<script> alert('email or password are wrong. ')</script>";

                }
              }else{
                echo "<script> alert('email or password are wrong. ')</script>";

              }
            }
           }
          }
          
  ?>


          <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mt-5">Login</h5>
                  <form method="POST" class="p-auto" action="login-admins.php">
                      <div class="form-outline mb-4">
                        <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                      
                      </div>

                      
                      <div class="form-outline mb-4">
                        <input type="password" name="pass" id="form2Example2" placeholder="Password" class="form-control" />
                        
                      </div>



                      <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                    
                    </form>
<?php require "../h&f/footer.php";?>