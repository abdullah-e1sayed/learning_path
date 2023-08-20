<?php   require "../config/config.php";?>
<?php   require "../include/header.php";?>
<?php 

       if(isset($_POST['submit'])){
        if(empty($_POST['name'])){

          echo "<script> alert (' one or more input are empty ')</script>";          
        
        }else{
          $name=$_POST['name'];
          

          $insert=$conn->prepare("INSERT INTO categories (name)
          values(:name)");
          $insert->execute([
            ':name'=>$name
            
          ]);
      }
      }
?>


       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">اضافة صنف </h5>
          <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="الاسم" />
                 
                </div>         

      
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">اضافة</button>

          
              </form>

<?php   require "../include/footer.php";?>
