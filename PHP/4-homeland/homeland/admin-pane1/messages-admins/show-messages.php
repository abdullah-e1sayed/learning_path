<?php $nav_item = basename(__FILE__);?>
<?php require "../../config/config.php" ;?>
<?php require "../h&f/header.php";?>

<?php 

$mNotAnswered = $conn->query("SELECT * FROM users_messages where status = 1 ;");
$mNotAnswered->execute();
$allMNotAnswered=$mNotAnswered->fetchAll(PDO::FETCH_OBJ);


$mAnswered = $conn->query("SELECT * FROM users_messages where status = 0 ;");
$mAnswered->execute();
$allMAnswered=$mAnswered->fetchAll(PDO::FETCH_OBJ);


?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">The message hes not been answered</h5>
            
              <table class="table mt-3">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                    <th scope="col">Messages status</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                        $counter = 0;
                        foreach($allMNotAnswered as $message):
                        $counter +=1; 
                  ?>

                  <tr>
                    <th scope="row"><?php echo $counter; ?></th>
                    <td><?php echo $message->username;?></td>
                    <td><?php echo $message->email;?></td>
                    <td><?php echo $message->subject;?></td>
                    <td><?php echo $message->message;?></td>
                     <td><a href="mStatus.php?id=<?php echo $message->id;?>" class="btn btn-success  text-center ">Answered</a></td>
                  </tr>
                  <?php endforeach;?> 
                  
  
                  </tbody>
              </table> 

                  <h5 class="card-title mb-4 d-inline">The message hes  been answered</h5>
                  <table class="table mt-3">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                        $counter = 0;
                        foreach($allMAnswered as $message):
                        $counter +=1; 
                  ?>

                  <tr>
                    <th scope="row"><?php echo $counter; ?></th>
                    <td><?php echo $message->username;?></td>
                    <td><?php echo $message->email;?></td>
                    <td><?php echo $message->subject;?></td>
                    <td><?php echo $message->message;?></td>
                  </tr>
                  <?php endforeach;?>

                  
                </tbody>
              </table> 




              <?php require "../h&f/footer.php";?>
