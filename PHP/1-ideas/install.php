<?php require_once ('config.php')?>

<?php

$connection= new PDO($dsn,$username,$pass,$option);

//PHP DataBase Object (PDO)
$sql = "CREATE TABLE IF not EXISTS ideas (
    id int UNSIGNED primary AUTO_INCREMENT,
    title varchar(20),
    idea text
    
    );";
if($connection->exec($sql)){
    echo "You are connected to the database successfully";
}

 ?>