<?php require "../include/header.php"; ?>
<?php require "../config/config.php" ;?>

<?php

      $money_fund=$conn->query("SELECT * from money_fund ");
      $money_fund->execute();
      $money=$money_fund->fetchAll(PDO::FETCH_OBJ);

      if(isset($_GET['id'])&& $_GET['id'] != ""){
        $id = $_GET['id'];

      $products = $conn->query("SELECT * FROM products where id = '$id'");
      $products->execute();
      $product = $products->fetch(PDO::FETCH_OBJ);
      }else{
        header("location:".APPURL."/bills/create-bill.php");
      }

      


if(isset($_POST['submit'])){
  
  
    
    $quantity=(($product->quantity) - $_POST['quantity']);
    if($quantity > 0){

    $sales_by=$_SESSION['username'];

    $insert=$conn->prepare("UPDATE products 
    set quantity=:quantity where id = '$id'");
    $insert->execute([
      ':quantity'=>$quantity,     
      

    ]);

    
    $altred_money=  $_POST['quantity'] * $product->price ;
    $note="قام $sales_by ببيع {$_POST['quantity']} من $product->name";
    $alter_money=$conn->prepare("INSERT INTO money_fund(money,note,status)values(:money,:note,:status)");
                        $alter_money->execute([
                          ':money'=>$altred_money,
                          ':note'=>$note,
                          ':status'=>"sales"
                         ]);

    header("location:".APPURL."/bills/create-bill.php");
  
                        }else{

                          echo "<script>alert('الكمية لا تكفى ')";
                        }
}


?>
            
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">اضافة منتج  </h5>
          <form method="POST" action="" enctype="multipart/form-data">

                

                <div class="form-outline mb-4 mt-4">
                <label for="purchasing_price">المنتج</label>

                  <label  id="" class="form-control"  ><?php echo $product->name;?></label>
                 
                </div>

                <div class="form-outline mb-4 mt-4">
                <label for="quan"> الكمية المتاحة</label>
                <label  id="quan" class="form-control"  ><?php echo $product->quantity;?></label>
                 
                </div> 
                  
                <div class="form-outline mb-4 mt-4">
                <label for="purchasing_price"> سعر الشراء </label>
                <label  id="purchasing_price" class="form-control"  ><?php echo $product->purchasing_price;?></label>

                 
                </div> 
                <div class="form-outline mb-4 mt-4">
                <label for="price"> سعر البيع </label>
                <label  id="price" class="form-control"  ><?php echo $product->price;?></label>

                 
                </div> 
                 <div class="form-outline mb-4 mt-4">
                 <label for="quantity">الكمية</label>

                  <input type="text" name="quantity" id="quantity" class="form-control" placeholder="" />
                 
                </div> 

                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">اضافة</button>

          
              </form>
              <?php require "../include/footer.php"; ?>
