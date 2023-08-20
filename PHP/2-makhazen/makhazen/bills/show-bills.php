<?php  require "../include/header.php" ;?>
<?php  require "../config/config.php" ;?>



<?php
      $products = $conn->query("SELECT * FROM products");
      $products->execute();
      $allProducts = $products->fetchAll(PDO::FETCH_OBJ);

      $money_fund=$conn->query("SELECT * from money_fund where status='sales'");
      $money_fund->execute();
      $allMoney=$money_fund->fetchAll(PDO::FETCH_OBJ);

      

?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline" >المبيعات  	</h5>
             <a  href="create-bill.php" class="btn btn-primary mb-4 text-center float-right"><h2>+</h2></a>


            

              <table class="table">
              <thead>
                  <tr>
                    <th scope="col">#</th>
                    
                    <th scope="col">الفاتورة</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $counter =1 ;foreach($allMoney as $money ):?>
                  <tr>
                    <th scope="row"><?php echo $counter;  $counter++;?></th>

                    <td><?php echo $money->note;?></td>
                    
                  </tr>
                 <?php  endforeach;?>
                </tbody>

              
              </table> 
<?php  require "../include/footer.php" ;?>

