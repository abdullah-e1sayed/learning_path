<?php $nav_item = basename(__FILE__);?>
<?php require "../config/config.php" ;?>
<?php require "../include/header.php" ;?>

<?php 
    
    if(isset($_SESSION['username'])){
      // header("location:".APPURL);
      echo "<script>window.location.href='".APPURL."'</script> ";

      exit;
    }else{
     
     if(isset($_POST['submit'])){
      if(empty($_POST['email'] ) or empty($_POST['pass']  )){
        echo "<script> alert('one or more input are empty ')</script>";

      }else {
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $login= $conn->prepare("SELECT * from users where email = '$email'");
        $login->execute();

        if($login->rowCount()){
          $fetch= $login->fetch(PDO::FETCH_ASSOC);
          if(password_verify($pass,$fetch['pass'])){
            $_SESSION['username']=$fetch['username'];
            $_SESSION['email']=$fetch['email'];
            $_SESSION['id']=$fetch['id'];
            echo "<script>window.location.href='".APPURL."'</script> ";
            // header("location:".APPURL);
            exit;
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
<div class ="site-wrap">
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo APPURL?>images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Log In</h1>
          </div>
        </div>
      </div>
    </div>
    

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mt-5" data-aos="fade-up" data-aos-delay="100">
            <h3 class="h4 text-black widget-title mb-3">Login</h3>
            <form action="login.php" method = "post" class="form-contact-agent">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="pass" id="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" id="phone" class="btn btn-primary" value="Login">
            </div>
            </form>
          </div>
         
        </div>
      </div>
    </div>

  </div>

    <?php require "../include/footer.php" ;?>