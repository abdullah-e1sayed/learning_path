<?php 

    define("host","localhost");
    define("dbname","makhazen");
    define("username","falcon");
    define("pass","falcon006");  //Falcon006@
try{

    $conn=new PDO("mysql:host=".host.";dbname=".dbname,username,pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOExeption $error){
    echo $error->getMessage();
}






?>