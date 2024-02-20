<?php

try {
    $conx = new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);

    //if ($conx)
    // echo "<h4>COnnection DB Success</h4>"
    //}



} catch (PDOException $e){
    echo "Error: " . $e->getMessage();
}

//--------------------------//
//Get All Records (mostrar valores)

function getAllPets($conx){
    try{
        $sql = "SELECT * FROM pets";
        $stm = $conx -> prepare( $sql );
        $stm -> execute();
        return $stm -> fetchAll();
    } catch  (PDOException $exc) {
       echo $exc->getMessage();
       }
}