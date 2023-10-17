<?php $nav_item = basename(__FILE__);
 require "../../config/config.php" ;
 require "../h&f/header.php";

 if(!isset($_SERVER['HTTP_REFERER'])){
    header("location:".ADMINURL);
    exit;
 
 }elseif(isset($_GET['id']) && $_GET['id'] != "" ){
    $id = $_GET['id'];

    $properties = $conn->query("SELECT * FROM properties where id = '$id';");
    $properties->execute();
    $property=$properties->fetch(PDO::FETCH_OBJ);




    if(filter_var($id, FILTER_VALIDATE_INT)){
      if(isset($_POST['submit'])){
        if (!empty($_POST['name'])){
          $name = str_replace(' ','-',trim($_POST['name']));

        $update = $conn->query("UPDATE properties SET name = '$name' where id = '$id'");
        $update->execute();
        header("location:show-categories.php");
      }else{
        echo "<script> alert('the name is empty . ')</script>";

      }
    }

    }else{
    header("location:".ADMINURL);
    exit;

 }


 }else{
    header("location:".ADMINURL);
    exit;

 }



?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Categories</h5>
          <form method="POST" action="update-category.php?id=<?php echo $id?>" enctype="multipart/form-data">

                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" value="<?php echo $property->name;?>" id="form2Example1" class="form-control" placeholder="name" />
                 
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