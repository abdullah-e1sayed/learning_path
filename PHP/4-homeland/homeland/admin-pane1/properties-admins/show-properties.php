<?php $nav_item = basename(__FILE__);?>
<?php require "../../config/config.php" ;?>
<?php require "../h&f/header.php";?>

<?php 

$props = $conn->query("SELECT * FROM props where admin_name = '{$_SESSION['adminName']}' ;");
$props->execute();
$allProps=$props->fetchAll(PDO::FETCH_OBJ);


?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Properties</h5>
              <a href="create-properties.php" class="btn btn-primary mb-4 text-center float-right">Create Properties</a>

              <table class="table mt-4">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">price</th>
                    <th scope="col">home type</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                        $counter = 0;
                        foreach($allProps as $prop):
                        $counter +=1; 
                  ?> 
                  <tr>
                    <th scope="row"><?php echo $counter; ?></th>
                    <td><?php echo $prop->name;?></td>
                    <td><?php echo number_format($prop->price,2,'.',',');?></td>
                    <td><?php echo $prop->home_type;?></td>
                     <td><a href="delete-posts.php?id=<?php echo $prop->id ;?>" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                  <?php endforeach;?>
                  
                </tbody>
              </table> 
              <?php require "../h&f/footer.php";?>
