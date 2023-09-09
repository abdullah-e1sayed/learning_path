
<?php require "../includes/header.php";?>
<?php require "../config/config.php"?>
<?php   
    if(!isset($_SESSION['id'])){
        echo "<script>window.location.href='".APPURL."auth/login.php'</script> ";
        exit;
    } 
     if(isset($_GET['id']) && $_GET['id']!= ""){
            $id=$_GET['id'];
    }else{
        echo "<script>window.location.href='".APPURL."404.php'</script> ";
        exit;
    }
    if($id!=$_SESSION['id']){
        echo "<script>window.location.href='".APPURL."404.php'</script> ";
        exit;
    }
    $bookings=$conn->query("SELECT * FROM bookings WHERE user_id = '$id'");
    $bookings->execute();
    $allBookings = $bookings->fetchAll(PDO::FETCH_OBJ);
    if (count($allBookings)>0):
?>
<div class = "container">
    <table class="table mt-5">
        <thead> 
            <tr>
                <th scope ="col">full name</th>
                <th scope ="col">email</th>
                <th scope ="col">phone number</th>
                <th scope ="col">hotel name</th>
                <th scope ="col">room name</th>
                <th scope ="col">status</th>
                <th scope ="col">payment</th>
                <th scope ="col">check in</th>
                <th scope ="col">check out</th>
                <th scope ="col">created at</th>

               
            </tr>
        </thead>
        <tbody>
            <?php  foreach($allBookings as $booking) : ?>
        <tr>
                <th scope ="row"><?php echo $booking->full_name;  ?></th>
                <td><?php echo $booking->email;  ?></td>            
                <td><?php echo $booking->phone_number;  ?></td>            
                <td><?php echo $booking->hotel_name;  ?></td>            
                <td><?php echo $booking->room_name;  ?></td>            
                <td><?php echo $booking->status;  ?></td>            
                <td><?php echo $booking->payment;  ?></td>            
                <td><?php echo $booking->check_in;  ?></td>            
                <td><?php echo $booking->check_out;  ?></td>            
                <td><?php echo $booking->created_at;  ?></td>            
               

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <div class="hero-wrap js-fullheight" style="background-image: url('../images/image_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div style ="margin-left: 254px" class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate">
          	<h2 class="subheading" style = "font-size: 63px; margin-bottom: 55px;"> you don't have booking yet.  </h2>
               <?php endif; ?>
        </div>
    </div>
        </div>
      </div>
             

</div>

<?php require "../includes/footer.php";?>

