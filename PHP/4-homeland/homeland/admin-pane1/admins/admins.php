<?php $nav_item = basename(__FILE__);?>
<?php require "../../config/config.php" ;?>
<?php require "../h&f/header.php";?>

<?php 

$admins = $conn->query("SELECT * FROM admins ;");
$admins->execute();
$allAdmins=$admins->fetchAll(PDO::FETCH_OBJ);

$users = $conn->query("SELECT * FROM users ;");
$users->execute();
$allUsers=$users->fetchAll(PDO::FETCH_OBJ);
 
?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="<?php echo ADMINURL?>admins/create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Admin Name</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                          $counter = 0;
                          foreach($allAdmins as $admin):
                            $counter +=1;
                  ?>
                  <tr>
                    <th scope="row"><?php echo $counter;?></th>
                    <td><?php echo $admin->adminName ;?></td>
                    <td><?php echo $admin->email ;?></td>
                   
                  </tr>
                  <?php endforeach ;?>
                </tbody>
              </table>


              <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Users</h5> 
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                          $counter = 0;
                          foreach($allUsers as $user):
                            $counter +=1;
                  ?>
                  <tr>
                    <th scope="row"><?php echo $counter;?></th>
                    <td><?php echo $user->username ;?></td>
                    <td><?php echo $user->email ;?></td>
                   
                  </tr>
                  <?php endforeach ;?>
                </tbody>
              </table> 
              <?php require "../h&f/footer.php";?>
