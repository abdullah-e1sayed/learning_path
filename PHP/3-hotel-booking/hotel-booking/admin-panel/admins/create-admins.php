<?php  require "../h&f/header.php"; ?>
<?php  require "../../config/config.php"; ?>
<?php
        if (isset($_POST['submit'])){
          if(empty($_POST['email']) OR empty($_POST['adminName']) OR empty($_POST['pass'])){
            echo "<script>alert('one or more imput are empty')</script>";
          }else {
            
            $adminName=$_POST['adminName'];
            $email=$_POST['email'];
            $password=password_hash($_POST['pass'], PASSWORD_DEFAULT) ;  //password_hash($_POST['pass'], PASSWORD_DEFAULT)
          
             $insert=$conn->prepare("INSERT INTO admins ( adminName,email,pass) VALUES (:adminName,:email,:pass);");
                  
            $insert->execute([
              ":adminName" => $adminName,
              ":email"=> $email,
              ":pass"=> $password,
            ]);
            echo "<script>window.location.href='".ADMINURL."/admins/admins.php'</script> "; 
            
          }
        }
      

?>

   
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="" enctype="multipart/form-data">

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

              <?php  require "../h&f/footer.php"; ?>
            