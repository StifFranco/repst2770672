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
function getPet($conx, $id){
    try{
        $sql = "SELECT * FROM pets WHERE id = :id";
       $stm = $conx -> prepare( $sql );
        //$stm -> bindParam(':id', id);
        $stm -> execute(['id'  => $id]);
        return $stm -> fetch();
    } catch  (PDOException $e) {
       echo "Error: " . $e->getMessage();
       }
}


//--------------------//
// Update Pet

function updatePet($conx, $data){
    try {
        if(count($data) == 7){
        $sql = "UPDATE pets SET name=:name, type=:type, weight=:weight,
                        age=:age, breed=:breed, location=:location WHERE id = :id";
        } else {
            $sql = "UPDATE pets SET name=:name, photo=:photo, type=:type, weight=:weight,
            age=:age, breed=:breed, location=:location WHERE id = :id";
        }
        $smt = $conx ->prepare($sql);
        
        if($smt->execute($data)){
            $_SESSION['msj'] = 'The ' . $data['name'] . ' was update succesfully.';
            return true;
        } else{
            return false;
        }
    } catch (PDOException $e) {
        echo "Error : "  . $e->getMessage();
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

//---------------------//
//Delete Pet

function deletePet($conx, $id){
    try{
        $sql = "DELETE FROM pets WHERE id = :id";
       $stm = $conx -> prepare( $sql );
        $stm -> execute(['id'  => $id]);
        $_SESSION['msj'] = 'The Pet was deleted succesfully.';
        return true;
    } catch  (PDOException $e) {
       echo "Error: " . $e->getMessage();
       }
}
