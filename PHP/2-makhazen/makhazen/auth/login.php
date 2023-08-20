<?php  $nav_item= basename(__FILE__);?>
<?php  require "../include/header.php" ;?>
<?php  require "../config/config.php" ;?>



<?php

      if (isset($_SESSION['username'])){
        // echo "<script>window.location.href='".APPURL."'</script> ";
        header("location: ".APPURL."");

      }
      if(isset($_POST['submit'])){
          if(empty($_POST['email']) or empty($_POST['pass'])){

            echo "<script> alert (' one or more input are empty ')</script>";          
          
          }else{
            $email=$_POST['email'];
            $pass=$_POST['pass'];

            $login=$conn->query("SELECT * FROM users where email = '$email'");
            $login->execute();

            $fetch = $login->fetch(PDO::FETCH_ASSOC);
            if($login->rowCount()){
              if( $pass == $fetch['pass']){
                
                $_SESSION['username']=$fetch['username'];
                $_SESSION['email']=$fetch['email'];
                $_SESSION['id']=$fetch['id'];

                header("location:".APPURL);

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
              <form method="POST" class="p-auto" action="login.php">
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
     </div>
    </div>
</div>