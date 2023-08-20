<?php  require "../include/header.php" ;?>
<?php  require "../config/config.php" ;?>

<?php

      $money_fund=$conn->query("SELECT * from money_fund ");
      $money_fund->execute();
      $money=$money_fund->fetchAll(PDO::FETCH_OBJ);

      if(isset($_POST['submit'])){
            if($_POST['type']  ){
                  if(isset($_POST['money'])  && $_POST['money']!=""  ){
                    $altred_money=0;

                      if($_POST['type']==1){

                        $altred_money= $_POST['money'] * (-1);
                        $note="قام {$_SESSION['username']} بخصم مبلغ ";

                      }elseif($_POST['type']==2){
                        $altred_money= $_POST['money'];
                        $note="قام {$_SESSION['username']} بإضافة مبلغ ";

                      }
                      

                        $alter_money=$conn->prepare("INSERT INTO money_fund(money,note,status)values(:money,:note,:status)");
                        $alter_money->execute([
                          ':money'=>$altred_money,
                          ':note'=>$note,
                          ':status'=>"fund"


                        ]);
                        header("location:".APPURL."/fund/money_fund.php");
                  }else{
                          echo "<script>alert('لم تدخل المبلغ  ')</script>";
                  }
            
            
            }else{
                    echo "<script>alert('لم تحدد نوع العملية')</script>";
            }

      }

?>


          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">المبلغ بالصندوق </h5>
            
              <table class="table">
               
                 <tbody>
                  <tr>
                    <?php 
                        $counter = 0 ; 

                        foreach($money as $money_in_fund){
                          $counter += $money_in_fund->money ;
                        }

                        ?>
                    <th scope="row"  style="margin-top: 15px;background-color:yellow;color:red;"class="  mb-4 text-center" ><?php echo $counter?>$</th>
                  </tr>
                  </tbody>
              </table> 
                    <form method="POST" class="p-auto" action="">

                          <select name = "type"style="margin-top: 15px;" class="form-control">
                                <option value = "0" >تعديل المبلغ</option>
                                <option style = "color:red;" value = "1">خصم من الصندوق </option>
                                <option style = "color:green;" value = "2">اضافةالى الصندوق </option>
                          </select>
                                <br>

                                <input type ="number" name = "money" min="0">
                                <br>
                                <br>

                          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">تعديل</button>

                    </form>                   
                        
               

              <?php  require "../include/footer.php" ;?>
