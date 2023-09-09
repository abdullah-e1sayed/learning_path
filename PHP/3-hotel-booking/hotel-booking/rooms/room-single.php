
<?php  $nav_item= basename(__FILE__);?>
<?php require "../includes/header.php";?>
<?php require "../config/config.php"?>
<?php 
		if(isset($_GET['id']) && $_GET['id']!= ""){
				$id=$_GET['id'];
		}else{
			echo "<script>window.location.href='".APPURL."404.php'</script> ";
			exit;
		}
		$utilities=$conn->query(" SELECT * from utilities where room_id = $id ");
		$utilities->execute();
		$allUtilites=$utilities->fetchAll(PDO::FETCH_OBJ);

		$room=$conn->query("SELECT * from rooms where id = $id and status = 1 ;");
		$room->execute();
		$singleRoom=$room->fetch(PDO::FETCH_OBJ);

		if(isset( $_POST['submit'])){
			if(empty($_POST['email'])OR empty($_POST['full_name'] )OR empty($_POST['phone_number'])OR empty($_POST['check_in'])OR empty($_POST['check_out']) ){
				echo "<script>alert('one or more imput are empty')</script>";
			}else{
				$check_in=date_create($_POST['check_in']);
				$check_out=date_create($_POST['check_out']);
				$email=$_POST['email'];
				$phone_number=$_POST['phone_number'];
				$full_name=$_POST['full_name'];
				$hotel_name=$singleRoom->hotel_name;
				$room_name=$singleRoom->name;
				$days=date_diff($check_in,$check_out);
				$num_days=intval($days->format('%R%a'));

				if(isset($_SESSION['id'])){

				$user_id=$_SESSION['id'];
				$payment = (($singleRoom->price) * $num_days);
				$status = "pending";

				/******************************** */
				$_SESSION['price']= $payment;

				}else{
					echo "<script>window.location.href='".APPURL."/auth/login.php'</script> ";       
				}


				if(date("Y/m/d") > $check_in OR date("Y/m/d") > $check_out   ){
					echo "<script>alert('pick a date that is not in the past , pick starting from today . ')</script>";
				}elseif ($check_in > $check_out){
					echo "<script>alert('how dare you , choose day of check out after check in day . ')</script>";
				}else{
					$booking=$conn->prepare("INSERT INTO bookings(check_in,check_out,email ,phone_number,full_name,hotel_name,room_name,status,payment,user_id)
					values(:check_in,:check_out,:email ,:phone_number,:full_name,:hotel_name,:room_name,:status,:payment,:user_id);");
					$booking->execute([
						":check_in"=>$_POST['check_in'],
						":check_out"=>$_POST['check_out'],
						":email"=>$email,
						":phone_number"=>$phone_number,
						":full_name"=>$full_name,
						":hotel_name"=>$hotel_name,
						":room_name"=>$room_name,
						":user_id"=>$user_id,
						":status"=>$status,
						":payment"=> $payment

	
	
					]);
					//header("location: pay.php");
					
					 echo "<script>window.location.href='".APPURL."rooms/pay.php?price=$payment  '</script> ";

				}

			}
		}
			



?>

    <div class="hero-wrap js-fullheight" style="background-image: url('<?PHP echo IMAGEROOMS;?>/<?php echo $singleRoom->image;?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate">
          	<h2 class="subheading">Welcome to Vacation Rental</h2>
          	<h1 class="mb-4"><?php echo $singleRoom->name;?></h1>
            <!-- <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p> -->
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    	<div class="container">
	    	<div class="row justify-content-end">
	    		<div class="col-lg-4">
					<!-- **************************************-->
					<form action="room-single.php?id=<?php  echo $singleRoom->id;?>" method= "POST" class="appointment-form" style="margin-top: -568px;">
						<h3 class="mb-3">Book this room</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Email">
								</div>
							</div>
						   
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="full_name" class="form-control" placeholder="Full Name">
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="phone_number"class="form-control" placeholder="Phone Number">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
								<div class="input-wrap">
									<div class="icon"><span class="ion-md-calendar"></span></div>
										<input type="text" name="check_in" class="form-control appointment_date-check-in" placeholder="Check-In">
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
									<div class="form-group">
										<div class="icon"><span class="ion-md-calendar"></span></div>
										<input type="text"  name="check_out" class="form-control appointment_date-check-out" placeholder="Check-Out">
									</div>
							</div>
							
						
						
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" name ="submit" value="Book and Pay Now" class="btn btn-primary py-3 px-4">
								</div>
							</div>
						</div>
						
				</form>
	    		</div>
	    	</div>
	    </div>
    </section>
   


  


    <section class="ftco-section bg-light">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 wrap-about">
						<div class="img img-2 mb-4" style="background-image: url(<?PHP echo APPURL;?>images/image_2.jpg);">
						</div>
						<h2>The most recommended vacation rental</h2>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section">
	          	<div class="pl-md-5">
		            <h2 class="mb-2">What we offer</h2>
	            </div>
	          </div>
	          <div class="pl-md-5">
							<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
							<div class="row">

							<!--******************************************-->
							<?php foreach($allUtilites as $utilty): ?>
		            <div class="services-2 col-lg-6 d-flex w-100">
		              <div class="icon d-flex justify-content-center align-items-center">
		            		<span class="<?php echo $utilty->icon  ;?>"></span>
		              </div>
		              <div class="media-body pl-3">
		                <h3 class="heading"><?php echo $utilty->name  ;?></h3>
		                <p><?php echo $utilty->description;  ?></p>
		              </div>
		            </div> 
					<?php  endforeach;?>
							<!-- *************************************************-->


		          </div>  
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="ftco-intro" style="background-image: url(<?PHP echo APPURL;?>images/image_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-9 text-center">
						<h2>Ready to get started</h2>
						<p class="mb-4">It’s safe to book online with us! Get your dream stay in clicks or drop us a line with your questions.</p>
						<p class="mb-0"><a href="<?PHP echo APPURL;?>about.php" class="btn btn-primary px-4 py-3">Learn More</a> <a href="<?PHP echo APPURL;?>contact.php" class="btn btn-white px-4 py-3">Contact us</a></p>
					</div>
				</div>
			</div>
		</section>


		<?php require "../includes/footer.php";?>