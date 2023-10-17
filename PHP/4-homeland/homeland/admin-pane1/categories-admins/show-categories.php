<?php $nav_item = basename(__FILE__);?>
<?php require "../../config/config.php" ;?>
<?php require "../h&f/header.php";?>

<?php 
 
$properties = $conn->query("SELECT * FROM properties ;");
$properties->execute();
$allProperties=$properties->fetchAll(PDO::FETCH_OBJ);


?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Categories</h5>
              <a href="create-category.php" class="btn btn-primary mb-4 text-center float-right">Create Categories</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $counter = 0;
                  foreach($allProperties as $property):
                    $counter +=1;
                    ?>
                  <tr>
                    <th scope="row"><?php echo $counter; ?></th>
                    <td><?php echo $property->name;?></td>
                    <td><a  href="update-category.php?id=<?php echo $property->id;?>" class="btn btn-warning text-white text-center ">Update </a></td>
                    <td><a href="delete-category.php?id=<?php echo $property->id;?>" class="btn btn-danger  text-center ">Delete </a></td>
                  </tr>
                  <?php endforeach ;?>
 
                </tbody>
              </table>

              <?php require "../h&f/footer.php";?>

              