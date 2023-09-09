<?php  require "../h&f/header.php"; ?>
<?php  require "../../config/config.php"; ?>
<?php     
           //admins
      $admins=$conn->query("SELECT * FROM admins");
      $admins->execute();
      $allAdmins=$admins->fetchAll(PDO::FETCH_OBJ);

      //users
      $users=$conn->query("SELECT * FROM users");
      $users->execute();
      $allUsers=$users->fetchAll(PDO::FETCH_OBJ);

?>

   

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php   foreach($allAdmins as $admin) :  ?>
                  <tr>
                    <th scope="row"><?php echo $admin->id;  ?></th>
                    <td><?php echo $admin->adminName;  ?></td>
                    <td><?php echo $admin->email;  ?></td>
                   
                  </tr>
                  <?php endforeach;  ?>
                </tbody>
              </table>
              </div>
        </div>
      </div>
    </div>
  </div> 
              
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Users</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php   foreach($allUsers as $user) :  ?>
                  <tr>
                    <th scope="row"><?php echo $user->id;  ?></th>
                    <td><?php echo $user->username;  ?></td>
                    <td><?php echo $user->email;  ?></td>
                   
                  </tr>
                  <?php endforeach;  ?>
                </tbody>
              </table> 
              <?php  require "../h&f/footer.php"; ?>
