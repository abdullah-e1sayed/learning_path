<?php  require "../h&f/header.php"; ?>
<?php  require "../../config/config.php"; ?>

<?php 
        if(isset($_GET['id']) && $_GET['id']!= ""){
          $id=$_GET['id'];
        }else{
              echo "<script>window.location.href='".ADMINURL."'</script> ";
              exit;
            }
        
      if(isset($_POST['submit'])){
        if(empty($_POST['name']) OR empty($_POST['description']) OR empty($_POST['location'])){

          echo "<script>alert('one or more imput are empty')</script>";

        }else{
          $name=$_POST['name'];
          $description=$_POST['description'];
          $location=$_POST['location'];

          $hotels=$conn->prepare("UPDATE hotels set name=:name ,description =:description  , location = :location where id =$id");
          $hotels->execute([
            
            ':name'=>$name,
            ':description'=>$description,
            ':location'=>  $location
          
          ]);
          echo "<script>window.location.href='".ADMINURL."/hotels-admins/show-hotels.php'</script> "; 


        }
      }




?>

   
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Hotel</h5>
          <form method="POST" action="" enctype="multipart/form-data">
                
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-outline mb-4 mt-4">
                  <label for="exampleFormControlTextarea1">Location</label>

                  <input type="text" name="location" id="form2Example1" class="form-control"/>
                 
                </div>

      
                
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
  </div>
<script type="text/javascript">

</script>
</body>
</html>