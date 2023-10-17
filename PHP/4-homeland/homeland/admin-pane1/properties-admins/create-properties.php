<?php $nav_item = basename(__FILE__);?>
<?php require "../../config/config.php" ;?>
<?php require "../h&f/header.php";?>

<?php  

        $s_home_type=$conn->query("SELECT * from properties");
        $s_home_type->execute();
        $all_homes=$s_home_type->fetchAll(PDO::FETCH_OBJ);


        $s_offers_type=$conn->query("SELECT * from offers_type");
        $s_offers_type->execute();
        $all_offers=$s_offers_type->fetchAll(PDO::FETCH_OBJ);



        if(isset($_POST['submit'])){

          if(empty($_POST['name']) OR empty($_POST['location']) OR empty($_POST['price']) OR empty($_POST['beds']) OR 
          empty($_POST['baths']) OR empty($_POST['sq_ft']) OR empty($_POST['year_built']) OR empty($_POST['price_sqft']) 
          OR empty($_POST['home_type']) OR  empty($_POST['type']) OR empty($_POST['description'])  ){

            echo "<script> alert('One or more input are empty .')</script>";
            // echo $_POST['name'];
            // echo $_POST['location'];
            // echo $_POST['price'];
            // echo $_POST['beds'];
            // echo $_POST['baths'];
            // echo $_POST['sq_ft'];
            // echo $_POST['year_built'];
            // echo $_POST['price_sqft'];
            // echo $_POST['home_type'];
            // echo $_POST['type'];
            // echo $_POST['description'];
            // echo basename($_FILES['thumbnail']['name']);

          }else{
            
            $admin_name = $_SESSION['adminName'];
            $name =$_POST['name'];
            $location =$_POST['location'];
            $price =$_POST['price'];
            $beds =$_POST['beds'];
            $baths =$_POST['baths'];
            $sq_ft =$_POST['sq_ft'];
            $year_built =$_POST['year_built'];
            $price_sqft =$_POST['price_sqft'];
            $home_type =$_POST['home_type'];
            $type =$_POST['type'];
            $description =$_POST['description'];
            $thumbnail=str_replace(' ','-',$name) . basename($_FILES['thumbnail']['name']);

            $dir ="../../images/thumbnail/" .$thumbnail ;





            $insert = $conn->prepare("INSERT INTO props(admin_name,name,location,price,beds,baths,sq_ft,year_built,
            price_sqft,home_type,offers,description,image	) values (:admin_name,:name,:location,:price,:beds,:baths,:sq_ft,:year_built,
            :price_sqft,:home_type,:offers,:description,:image	)");

            $insert->execute([
              ":admin_name"=>$admin_name,
              ":name"=>$name,
              ":location"=>$location,
              ":price"=>$price,
              ":beds"=>$beds,
              ":baths"=>$baths,
              ":sq_ft"=>$sq_ft,
              ":year_built"=>$year_built,
              ":price_sqft"=>$price_sqft,
              ":home_type"=>$home_type,
              ":offers"=>$type,
              ":description"=>$description,
              ":image"=>$thumbnail
            ]);

            move_uploaded_file($_FILES['thumbnail']['tmp_name'],$dir);

            

            $id = $conn->lastInsertId();


            foreach( $_FILES['image']['tmp_name'] as $key => $tmp_name ){

                $image_name=str_replace(' ','-',$name).$_FILES['image']['name'][$key];
                $image_err =$_FILES['image']['error'][$key];

                if($image_err ===UPLOAD_ERR_OK){

                    $gallery_dir = "../../images/gallery/".$image_name;

                    move_uploaded_file($tmp_name,$gallery_dir);

                    $gallery_insert=$conn->prepare("INSERT INTO home_images(image,prop_id) values (:image,:prop_id)");
                    $gallery_insert->execute([
                        ":image"=>$image_name,
                        ":prop_id"=>$id
                    ]);




                }


            }
            header("location: show-properties.php");


            

            
          }

        }








?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Properties</h5>
                    <form method="POST" action="create-properties.php" enctype="multipart/form-data">

                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                        </div>    
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="location" id="form2Example1" class="form-control" placeholder="location" />
                        </div> 
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                        </div> 
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="beds" id="form2Example1" class="form-control" placeholder="beds" />
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="baths" id="form2Example1" class="form-control" placeholder="baths" />
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="sq_ft" id="form2Example1" class="form-control" placeholder="SQ/FT" />
                        </div>   
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="year_built" id="form2Example1" class="form-control" placeholder="Year Build" />
                        </div> 
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="price_sqft" id="form2Example1" class="form-control" placeholder="Price Per SQ FT" />
                        </div> 
                        
                        <select name="home_type" class="form-control form-select" aria-label="Default select example">
                            <option selected>Select Home Type</option>
                            <?php  foreach($all_homes as $home):?>
                            <option value="<?php echo $home->name;?>"><?php echo $home->name;?></option>
                            <?php endforeach;?>
                        </select>   
                        <select name="type" class="form-control mt-3 mb-4 form-select" aria-label="Default select example">
                            <option selected>Select Type</option>
                            <?php foreach($all_offers as $offer):?>
                            <option value="<?php echo $offer->name;?>"><?php echo $offer->name;?></option>
                            <?php endforeach;?>
                        </select>  
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea placeholder="Description" name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Property Thumbnail</label>
                            <input name="thumbnail" class="form-control" type="file" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Gallery Images</label>
                            <input name="image[]" class="form-control" type="file" id="formFileMultiple" multiple>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
                
                    </form>



<?php require "../h&f/footer.php";?>
<?php $nav_item = basename(__FILE__);?>
<?php require "../../config/config.php" ;?>
<?php require "../h&f/header.php";?>

<?php  

        $s_home_type=$conn->query("SELECT * from properties");
        $s_home_type->execute();
        $all_homes=$s_home_type->fetchAll(PDO::FETCH_OBJ);


        $s_offers_type=$conn->query("SELECT * from offers_type");
        $s_offers_type->execute();
        $all_offers=$s_offers_type->fetchAll(PDO::FETCH_OBJ);



        if(isset($_POST['submit'])){

          if(empty($_POST['name']) OR empty($_POST['location']) OR empty($_POST['price']) OR empty($_POST['beds']) OR 
          empty($_POST['baths']) OR empty($_POST['sq_ft']) OR empty($_POST['year_built']) OR empty($_POST['price_sqft']) 
          OR empty($_POST['home_type']) OR  empty($_POST['type']) OR empty($_POST['description'])  ){

            echo "<script> alert('One or more input are empty .')</script>";
            // echo $_POST['name'];
            // echo $_POST['location'];
            // echo $_POST['price'];
            // echo $_POST['beds'];
            // echo $_POST['baths'];
            // echo $_POST['sq_ft'];
            // echo $_POST['year_built'];
            // echo $_POST['price_sqft'];
            // echo $_POST['home_type'];
            // echo $_POST['type'];
            // echo $_POST['description'];
            // echo basename($_FILES['thumbnail']['name']);

          }else{
            
            $admin_name = $_SESSION['adminName'];
            $name =$_POST['name'];
            $location =$_POST['location'];
            $price =$_POST['price'];
            $beds =$_POST['beds'];
            $baths =$_POST['baths'];
            $sq_ft =$_POST['sq_ft'];
            $year_built =$_POST['year_built'];
            $price_sqft =$_POST['price_sqft'];
            $home_type =$_POST['home_type'];
            $type =$_POST['type'];
            $description =$_POST['description'];
            $thumbnail=str_replace(' ','-',$name) . basename($_FILES['thumbnail']['name']);

            $dir ="../../images/thumbnail/" .$thumbnail ;





            $insert = $conn->prepare("INSERT INTO props(admin_name,name,location,price,beds,baths,sq_ft,year_built,
            price_sqft,home_type,offers,description,image	) values (:admin_name,:name,:location,:price,:beds,:baths,:sq_ft,:year_built,
            :price_sqft,:home_type,:offers,:description,:image	)");

            $insert->execute([
              ":admin_name"=>$admin_name,
              ":name"=>$name,
              ":location"=>$location,
              ":price"=>$price,
              ":beds"=>$beds,
              ":baths"=>$baths,
              ":sq_ft"=>$sq_ft,
              ":year_built"=>$year_built,
              ":price_sqft"=>$price_sqft,
              ":home_type"=>$home_type,
              ":offers"=>$type,
              ":description"=>$description,
              ":image"=>$thumbnail
            ]);

            move_uploaded_file($_FILES['thumbnail']['tmp_name'],$dir);

            

            $id = $conn->lastInsertId();


            foreach( $_FILES['image']['tmp_name'] as $key => $tmp_name ){

                $image_name=str_replace(' ','-',$name).$_FILES['image']['name'][$key];
                $image_err =$_FILES['image']['error'][$key];

                if($image_err ===UPLOAD_ERR_OK){

                    $gallery_dir = "../../images/gallery/".$image_name;

                    move_uploaded_file($tmp_name,$gallery_dir);

                    $gallery_insert=$conn->prepare("INSERT INTO home_images(image,prop_id) values (:image,:prop_id)");
                    $gallery_insert->execute([
                        ":image"=>$image_name,
                        ":prop_id"=>$id
                    ]);




                }


            }
            header("location: show-properties.php");


            

            
          }

        }








?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Properties</h5>
                    <form method="POST" action="create-properties.php" enctype="multipart/form-data">

                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                        </div>    
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="location" id="form2Example1" class="form-control" placeholder="location" />
                        </div> 
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                        </div> 
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="beds" id="form2Example1" class="form-control" placeholder="beds" />
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="baths" id="form2Example1" class="form-control" placeholder="baths" />
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="sq_ft" id="form2Example1" class="form-control" placeholder="SQ/FT" />
                        </div>   
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="year_built" id="form2Example1" class="form-control" placeholder="Year Build" />
                        </div> 
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="price_sqft" id="form2Example1" class="form-control" placeholder="Price Per SQ FT" />
                        </div> 
                        
                        <select name="home_type" class="form-control form-select" aria-label="Default select example">
                            <option selected>Select Home Type</option>
                            <?php  foreach($all_homes as $home):?>
                            <option value="<?php echo $home->name;?>"><?php echo $home->name;?></option>
                            <?php endforeach;?>
                        </select>   
                        <select name="type" class="form-control mt-3 mb-4 form-select" aria-label="Default select example">
                            <option selected>Select Type</option>
                            <?php foreach($all_offers as $offer):?>
                            <option value="<?php echo $offer->name;?>"><?php echo $offer->name;?></option>
                            <?php endforeach;?>
                        </select>  
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea placeholder="Description" name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Property Thumbnail</label>
                            <input name="thumbnail" class="form-control" type="file" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Gallery Images</label>
                            <input name="image[]" class="form-control" type="file" id="formFileMultiple" multiple>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
                
                    </form>



<?php require "../h&f/footer.php";?>
<?php $nav_item = basename(__FILE__);?>
<?php require "../../config/config.php" ;?>
<?php require "../h&f/header.php";?>

<?php  

        $s_home_type=$conn->query("SELECT * from properties");
        $s_home_type->execute();
        $all_homes=$s_home_type->fetchAll(PDO::FETCH_OBJ);


        $s_offers_type=$conn->query("SELECT * from offers_type");
        $s_offers_type->execute();
        $all_offers=$s_offers_type->fetchAll(PDO::FETCH_OBJ);



        if(isset($_POST['submit'])){

          if(empty($_POST['name']) OR empty($_POST['location']) OR empty($_POST['price']) OR empty($_POST['beds']) OR 
          empty($_POST['baths']) OR empty($_POST['sq_ft']) OR empty($_POST['year_built']) OR empty($_POST['price_sqft']) 
          OR empty($_POST['home_type']) OR  empty($_POST['type']) OR empty($_POST['description'])  ){

            echo "<script> alert('One or more input are empty .')</script>";
            // echo $_POST['name'];
            // echo $_POST['location'];
            // echo $_POST['price'];
            // echo $_POST['beds'];
            // echo $_POST['baths'];
            // echo $_POST['sq_ft'];
            // echo $_POST['year_built'];
            // echo $_POST['price_sqft'];
            // echo $_POST['home_type'];
            // echo $_POST['type'];
            // echo $_POST['description'];
            // echo basename($_FILES['thumbnail']['name']);

          }else{
            
            $admin_name = $_SESSION['adminName'];
            $name =$_POST['name'];
            $location =$_POST['location'];
            $price =$_POST['price'];
            $beds =$_POST['beds'];
            $baths =$_POST['baths'];
            $sq_ft =$_POST['sq_ft'];
            $year_built =$_POST['year_built'];
            $price_sqft =$_POST['price_sqft'];
            $home_type =$_POST['home_type'];
            $type =$_POST['type'];
            $description =$_POST['description'];
            $thumbnail=str_replace(' ','-',$name) . basename($_FILES['thumbnail']['name']);

            $dir ="../../images/thumbnail/" .$thumbnail ;





            $insert = $conn->prepare("INSERT INTO props(admin_name,name,location,price,beds,baths,sq_ft,year_built,
            price_sqft,home_type,offers,description,image	) values (:admin_name,:name,:location,:price,:beds,:baths,:sq_ft,:year_built,
            :price_sqft,:home_type,:offers,:description,:image	)");

            $insert->execute([
              ":admin_name"=>$admin_name,
              ":name"=>$name,
              ":location"=>$location,
              ":price"=>$price,
              ":beds"=>$beds,
              ":baths"=>$baths,
              ":sq_ft"=>$sq_ft,
              ":year_built"=>$year_built,
              ":price_sqft"=>$price_sqft,
              ":home_type"=>$home_type,
              ":offers"=>$type,
              ":description"=>$description,
              ":image"=>$thumbnail
            ]);

            move_uploaded_file($_FILES['thumbnail']['tmp_name'],$dir);

            

            $id = $conn->lastInsertId();


            foreach( $_FILES['image']['tmp_name'] as $key => $tmp_name ){

                $image_name=str_replace(' ','-',$name).$_FILES['image']['name'][$key];
                $image_err =$_FILES['image']['error'][$key];

                if($image_err ===UPLOAD_ERR_OK){

                    $gallery_dir = "../../images/gallery/".$image_name;

                    move_uploaded_file($tmp_name,$gallery_dir);

                    $gallery_insert=$conn->prepare("INSERT INTO home_images(image,prop_id) values (:image,:prop_id)");
                    $gallery_insert->execute([
                        ":image"=>$image_name,
                        ":prop_id"=>$id
                    ]);




                }


            }
            header("location: show-properties.php");


            

            
          }

        }








?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Properties</h5>
                    <form method="POST" action="create-properties.php" enctype="multipart/form-data">

                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                        </div>    
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="location" id="form2Example1" class="form-control" placeholder="location" />
                        </div> 
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                        </div> 
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="beds" id="form2Example1" class="form-control" placeholder="beds" />
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="baths" id="form2Example1" class="form-control" placeholder="baths" />
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="sq_ft" id="form2Example1" class="form-control" placeholder="SQ/FT" />
                        </div>   
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="year_built" id="form2Example1" class="form-control" placeholder="Year Build" />
                        </div> 
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="price_sqft" id="form2Example1" class="form-control" placeholder="Price Per SQ FT" />
                        </div> 
                        
                        <select name="home_type" class="form-control form-select" aria-label="Default select example">
                            <option selected>Select Home Type</option>
                            <?php  foreach($all_homes as $home):?>
                            <option value="<?php echo $home->name;?>"><?php echo $home->name;?></option>
                            <?php endforeach;?>
                        </select>   
                        <select name="type" class="form-control mt-3 mb-4 form-select" aria-label="Default select example">
                            <option selected>Select Type</option>
                            <?php foreach($all_offers as $offer):?>
                            <option value="<?php echo $offer->name;?>"><?php echo $offer->name;?></option>
                            <?php endforeach;?>
                        </select>  
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea placeholder="Description" name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Property Thumbnail</label>
                            <input name="thumbnail" class="form-control" type="file" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Gallery Images</label>
                            <input name="image[]" class="form-control" type="file" id="formFileMultiple" multiple>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
                
                    </form>



<?php require "../h&f/footer.php";?>
