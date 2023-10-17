<?php $nav_item = basename(__FILE__);?>
<?php require "../../config/config.php" ;?>
<?php require "../h&f/header.php";?>

<?php 
if(isset($_POST['submit'])   ){
 
  if(!empty($_POST['name'])){
    $name = str_replace(' ','-',trim($_POST['name']));
   

    $check = $conn->prepare("SELECT * FROM properties where name ='$name' ");
    $check->execute();
     
    if( $check->rowCount()){
         
      echo "<script> alert('The property is already created . ')</script>";

    }else{

        $insert = $conn->prepare("INSERT into properties(name) values  (:name)");
        $insert->execute([
          ":name" =>$name
         
    ]);
    header("location:show-categories.php");
    exit;

    }

  }else{
    echo "<script> alert('the name is empty . ')</script>";
  }

}



?>


       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Categories</h5>
          <form method="POST" action="" enctype="multipart/form-data">

                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>

      
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

              <?php require "../h&f/footer.php";?>
