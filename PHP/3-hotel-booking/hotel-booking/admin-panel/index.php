<?php  require "./h&f/header.php"; ?>
<?php  require "../config/config.php"; ?>
<?php


                // hotels
     $hotels=$conn->query("SELECT count(*)  as num from hotels ");
     $hotels->execute();
     $hotel=$hotels->fetch(PDO::FETCH_OBJ);

     
                // rooms
     $rooms=$conn->query("SELECT count(*)  as num from rooms ");
     $rooms->execute();
     $room=$rooms->fetch(PDO::FETCH_OBJ);


                
                // admins
     $admins=$conn->query("SELECT count(*)  as num from admins ");
     $admins->execute();
     $admin=$admins->fetch(PDO::FETCH_OBJ);


                // bookings
     $bookings=$conn->query("SELECT count(*)  as num from bookings ");
     $bookings->execute();
     $booking=$bookings->fetch(PDO::FETCH_OBJ);
           


?>

   
            
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <a  href="<?php echo ADMINURL ?>/hotels-admins/show-hotels.php" ><h5 class="card-title">Hotels</h5></a>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of hotels: <?php echo $hotel->num; ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
            <a  href="<?php echo ADMINURL ?>/rooms-admins/show-rooms.php" ><h5 class="card-title">Rooms</h5></a>
              
              <p class="card-text">number of rooms: <?php echo $room->num; ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
            <a  href="<?php echo ADMINURL ?>/admins/admins.php" ><h5 class="card-title">Admins</h5></a>
              
              <p class="card-text">number of admins: <?php echo $admin->num; ?></p>
              
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <a  href="<?php echo ADMINURL ?>/bookings-admins/show-bookings.php" ><h5 class="card-title">Bookings</h5></a>
              <p class="card-text">number of bookings: <?php echo $booking->num; ?></p>
             
            </div>
          </div>
        </div>
   
     <?php  require "./h&f/footer.php"; ?>