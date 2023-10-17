<?php $nav_item = basename(__FILE__);?>
<?php require "../../config/config.php" ;

if(!isset($_SERVER['HTTP_REFERER'])){
    header("location:".ADMINURL);
    exit;

 }elseif(isset($_GET['id']) && $_GET['id'] != "" ){
    $id = $_GET['id'];
    if(filter_var($id, FILTER_VALIDATE_INT)){


        $mNotAnswered = $conn->query("UPDATE users_messages set status = 0 where id = $id ;");
        $mNotAnswered->execute();
         
        header("location:show-messages.php");
        exit;

    }else{
        header("location:".ADMINURL);
        exit; 
    }
}



?>
