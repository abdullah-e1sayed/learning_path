<?php require "../include/header.php"; ?>
<?php require "../config/config.php" ;?>

<?php

      if(isset($_GET['id'])&& $_GET['id'] != ""){
        $id = $_GET['id'];

      $categories = $conn->query("SELECT * FROM categories where id = '$id'");
      $categories->execute();
      $category = $categories->fetch(PDO::FETCH_OBJ);
      }else{
        header("location:".APPURL."/categories/show-categories.php");
      }

      


if(isset($_POST['submit'])){
  
    $name=$_POST['name'];
    

    $insert=$conn->prepare("UPDATE categories set name =:name   where id = '$id'");
    $insert->execute([
      ':name'=>$name
      
    ]);

    header("location:".APPURL."/categories/show-categories.php");

}


?>
     
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">تعديل الصنف</h5>
          <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="<?php echo $category->name;?> " />
                 
                </div>              
     
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">تعديل</button>

          
              </form>

              <?php require "../include/footer.php"; ?>
