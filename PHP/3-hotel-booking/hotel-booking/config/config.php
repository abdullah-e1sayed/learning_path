<?php

define("host","localhost");
define("dbname","hotel-booking");
define("username","falcon");
define("pass","falcon006");

try{

    $conn = new PDO("mysql:host=".host.";dbname=".dbname,username,pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);  //  defult => ERRMODE ESCEPTION , ERRMODE_SILENT


} catch (PDOExeption $e){
    echo $e->getMessage();
}

        

        //$utilities
        $utilities = $conn->query("SELECT * FROM utilities"  );
        $utilities ->execute();
        $allUtilities = $utilities->fetchAll(PDO::FETCH_OBJ);






?>