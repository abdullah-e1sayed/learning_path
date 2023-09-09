<?php  require "../../config/config.php"; ?>
<?php  require "../h&f/header.php"; ?>
<?php 
        
      if(isset($_GET['id']) && $_GET['id']!= ""){
          $id=$_GET['id'];
        }else{
              echo "<script>window.location.href='".ADMINURL."'</script> ";
              exit;
            }
        
      if(isset($_POST['submit'])){
        if(isset($_POST['status'])){

          $status=$conn->prepare("UPDATE hotels set status =:status where id =$id");
          $status->execute([':status'=>$_POST['status']]);
          echo "<script>window.location.href='".ADMINURL."/hotels-admins/show-hotels.php'</script> "; 


        }
      }



?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline" >Update Status</h5>
          <form method="POST" action="" enctype="multipart/form-data">

                <select name = "status"style="margin-top: 15px;" class="form-control">
                    <option>Choose Status</option>
                    <option>1</option>
                    <option>0</option>
                </select>

      
                <button style="margin-top: 10px;" type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

              <?php  require "../h&f/footer.php"; ?>
