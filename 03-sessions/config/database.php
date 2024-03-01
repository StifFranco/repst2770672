<?php

try {
    $conx = new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);

} catch (PDOException $e){
    echo "Error: " . $e->getMessage();
}

//--------------------------//
//Login Users

function loginUser($conx, $email, $pass){
    try{
        $sql = "SELECT * FROM users
          WHERE email = :email
          LIMIT 1";
        $stm = $conx->prepare($sql) ;
        $stm -> execute(['email' => $email]);

        if($stm->rowCount() > 0){
            $user = $stm->fetch();
            if(password_verify($pass, $user['password'])){
                $_SESSION['uid'] = $user['id'];
                $_SESSION['urole'] = $user['role'];
                return true;
            }   else{
                $_SESSION['error'] = "Email or Password incorrect Please try again";
                return false;
            }
        } else {
            $_SESSION['error'] = "Email or Password incorrect Please try again";
            return false;
        }

    } catch  (PDOException $e) {
       echo "Error: " . $e->getMessage();
       }
}

//---------------------//
//Get User
function getUser($conx, $id){
    try{
        $sql = "SELECT * FROM users WHERE id = :id";
       $stm = $conx -> prepare( $sql );
        //$stm -> bindParam(':id', id);
        $stm -> execute(['id'  => $id]);
        return $stm -> fetch();
    } catch  (PDOException $e) {
       echo "Error: " . $e->getMessage();
       }
}


//---------------------//
//Add User
function addUser($conx, $data){
    try {
        $sql = "INSERT INTO users (document, fullname, photo,
                                          phone, email, password)
                VALUES (:document, :fullname, :photo, 
                :phone, :email, :password)";
        $smt = $conx ->prepare($sql);
        
        if($smt->execute($data)){
            $_SESSION['msj'] = 'The user ' . $data['fullname'] . ' was registered succesfully.';
            return true;
        } else{
            return false;
        }
    } catch (PDOException $e) {
        echo "Error : "  . $e->getMessage();
    }
} 

