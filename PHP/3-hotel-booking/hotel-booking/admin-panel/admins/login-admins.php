<?php $nav_item =basename(__FILE__);
        require "../h&f/header.php"; ?>
<?php  require "../../config/config.php"; ?>
<?php
        if (isset($_SESSION['adminName'])){
          echo "<script>window.location.href='".ADMINURL."'</script>";
        }
        
        if(isset($_POST['submit'])){
            if(empty($_POST['pass'] ) OR empty($_POST['email']) ){
              echo "<script>alert('one or more imput are empty')</script>";
            }else{
              $email=$_POST['email'];
              $pass=$_POST['pass'];
              $login=$conn->query("SELECT * FROM admins where email = '$email' ;");
              $login->execute();
              $fetch = $login->fetch(PDO::FETCH_ASSOC);
              
              if($login->rowCount()){
                
                if(password_verify($pass,$fetch['pass'])){
                  $_SESSION['adminName']=$fetch['adminName'];
                  $_SESSION['id']=$fetch['id'];
                  echo "<script>window.location.href='".ADMINURL."'</script>";
                }else{
                  echo "<script>alert('email or password is wrong')</script>";
                }

              }else{
                echo "<script>alert('email or password is wrong')</script>";
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
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="pass" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                 
                </form>

            </div>
       </div>
       
    <?php  require "../h&f/footer.php"; ?>