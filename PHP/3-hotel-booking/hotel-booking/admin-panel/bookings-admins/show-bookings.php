<?php  require "../../config/config.php"; ?>
<?php  require "../h&f/header.php"; ?>

<?php
           

        $bookings=$conn->query("SELECT * FROM bookings");
        $bookings->execute();
        $allBookings=$bookings->fetchAll(PDO::FETCH_OBJ);
        
?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Bookings</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">full name</th>
                    <th scope="col">email</th>
                    <th scope="col">phone number</th>
                    <th scope="col">hotel name</th>
                    <th scope="col">room name</th>
                    <th scope="col">check in</th>
                    <th scope="col">check out</th>
                    <th scope="col">status</th>
                    <th scope="col">payment</th>
                    <th scope="col">created at</th>
                    <th scope="col">status</th>
                  </tr>
                </thead>
                <tbody>
                    <?php  foreach(   $allBookings as  $allBooking ) :?>
                  <tr>
                    <th scope="row"><?php echo $allBooking->id; ?></th>
                    <td><?php echo $allBooking->full_name; ?></td>
                    <td><?php echo $allBooking->email; ?></td>
                    <td><?php echo $allBooking->phone_number; ?></td>
                    <td><?php echo $allBooking->hotel_name; ?></td>
                    <td><?php echo $allBooking->room_name; ?></td>
                    <td><?php echo $allBooking->check_in; ?></td>
                    <td><?php echo $allBooking->check_out; ?></td>
                    <td><?php echo $allBooking->status; ?></td>
                    <td><?php echo $allBooking->payment; ?></td>
                    <td><?php echo $allBooking->created_at; ?></td>

                    
                     <td><a href="status-bookings.php?id=<?php echo $allBooking->id; ?>" class="btn btn-warning text-white  text-center ">Status</a></td>
                  </tr>
                  <?php endforeach;  ?>
                  
                  
                </tbody>
              </table> 
              <?php  require "../h&f/footer.php"; ?>
