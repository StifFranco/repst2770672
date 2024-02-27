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
                return true;
            }   else{
                $_SESSION['error'] = "Email or Password incorrect Please try again";
                return false;
            }
        } else {
            $_SESSION['error'] = "Email or Password incorrect Please try again";
            return false;
        }


        //return $stm -> fetchAll();
    } catch  (PDOException $e) {
       echo "Error: " . $e->getMessage();
       }
}





