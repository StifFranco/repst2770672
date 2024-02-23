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
    } catch  (PDOException $e) {
       echo "Error: " . $e->getMessage();
       }
}

//---------------------//
//Get Pet
function getlPet($conx){
    try{
        $sql = "SELECT * FROM pets WHERE id = :id";
        $stm = $conx -> prepare( $sql );
        $stm -> execute();
        return $stm -> fetch();
    } catch  (PDOException $e) {
       echo "Error: " . $e->getMessage();
       }
}



//--------------------
// Add Pet

function addPet($conx, $data){
    try {
        $sql = "INSERT INTO pets (name, photo, type, weight,
                                          age, breed, location)
                VALUES (:name, :photo, :type, :weight,
                :age, :breed, :location)";
        $smt = $conx ->prepare($sql);
        
        if($smt->execute($data)){
            $_SESSION['msj'] = 'The ' . $data['name'] . ' was added succesfully.';
            return true;
        } else{
            return false;
        }
    } catch (PDOException $e) {
        echo "Error : "  . $e->getMessage();
    }
} 
