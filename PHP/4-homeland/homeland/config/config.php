<?php 
require "user_info.php";

 session_start(); 


define("HOSTNAME","localhost");
define("DBNAME","homeland1");
define("USER","falcon");
define("PASS","falcon006");



define("APPURL","http://localhost/homeland/");
define("ADMINURL","http://localhost/homeland/admin-pane1/");




try{

$conn = NEW PDO("mysql:host=".HOSTNAME.";dbname=".DBNAME.";",USER,PASS);

$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT);

}catch(PDOException $e){
    die("database connection failed: ". $e->getMessage());
}


$properties = $conn->prepare("SELECT * FROM Properties ");
$properties->execute();
$allProperties=$properties->fetchAll(PDO::FETCH_OBJ);

$searchOffer = $conn->prepare("SELECT * FROM offers_type ");
$searchOffer->execute();
$allSearchOffer=$searchOffer->fetchAll(PDO::FETCH_OBJ);

$searchCity = $conn->prepare("SELECT * FROM city ");
$searchCity->execute();
$allSearchCity=$searchCity->fetchAll(PDO::FETCH_OBJ);

if (isset($_SESSION['username'])){

    $user_info = NEW UserInfo;
    
    $ip_addr=$user_info->get_ip();        
    $os=$user_info->get_os();
    $browser=$user_info->get_browser();
    $device=$user_info->get_device();

    $insert_info=$conn->prepare("INSERT INTO users_info(user_email,ip_addr,os,browser,device,tracking_users) 
    values (:user_email,:ip_addr,:os,:browser,:device,:tracking_users)");
    $insert_info->execute([
        ":user_email"=>$_SESSION['email'],
        ":ip_addr"=>$ip_addr,
        ":os"=>$os,
        ":browser"=>$browser,
        ":device"=>$device,
        ":tracking_users"=>$nav_item
    ]);

}elseif(isset($_SESSION['adminName'])){
        $admin_info = NEW UserInfo;
    
    $ip_addr=$admin_info->get_ip();        
    $os=$admin_info->get_os();
    $browser=$admin_info->get_browser();
    $device=$admin_info->get_device();

    $insert_info=$conn->prepare("INSERT INTO admins_info(admins_email,ip_addr,os,browser,device,tracking_admins) 
    values (:admins_email,:ip_addr,:os,:browser,:device,:tracking_admins)");
    $insert_info->execute([
        ":admins_email"=>$_SESSION['adminName'],
        ":ip_addr"=>$ip_addr,
        ":os"=>$os,
        ":browser"=>$browser,
        ":device"=>$device,
        ":tracking_admins"=>$nav_item
    ]);

    }else{
        $visitors_info = NEW UserInfo;
    
    $ip_addr=$visitors_info->get_ip();
    $os=$visitors_info->get_os();
    $browser=$visitors_info->get_browser();
    $device=$visitors_info->get_device();

    $insert_info=$conn->prepare("INSERT INTO visitors_info(ip_addr,os,browser,device,tracking_visitors) 
    values (:ip_addr,:os,:browser,:device,:tracking_visitors)");
    $insert_info->execute([
        ":ip_addr"=>$ip_addr,
        ":os"=>$os,
        ":browser"=>$browser,
        ":device"=>$device,
        ":tracking_visitors"=>$nav_item
    ]);


    }

    









//header("location:".APPURL);

?>