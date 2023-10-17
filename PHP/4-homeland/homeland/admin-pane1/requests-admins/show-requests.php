<?php $nav_item = basename(__FILE__);?>
<?php require "../../config/config.php" ;?>
<?php require "../h&f/header.php";?>

<?php 

$requests = $conn->query("SELECT * FROM contact where admin_name = '{$_SESSION['adminName']}' ;");
$requests->execute();
$allRequests=$requests->fetchAll(PDO::FETCH_OBJ);


?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Requests</h5>
            
              <table class="table mt-3">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col">go to this property</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                        $counter = 0;
                        foreach($allRequests as $request):
                        $counter +=1; 
                  ?>

                  <tr>
                    <th scope="row"><?php echo $counter; ?></th>
                    <td><?php echo $request->user_name;?></td>
                    <td><?php echo $request->email;?></td>
                    <td><?php echo $request->phone;?></td>
                     <td><a href="<?php echo APPURL."property-details.php?id=".$request->id;?>" class="btn btn-success  text-center ">go</a></td>
                  </tr>
                  <?php endforeach;?>
                  
                </tbody>
              </table> 
              <?php require "../h&f/footer.php";?>
