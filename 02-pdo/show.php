<?php

require "config/app.php";
require "config/database.php";

$pet = getPet($conx, $_GET['id']);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Pets</title>
    <link rel="stylesheet" href="/css/master.css">   
</head>
<body>
    <main>
        <header class="nav level-1">
            <a href="index.php" >
                <img src="/Images/icon-back.svg" alt="back">
            </a>
            <img src="/Images/Pet Logo.svg" alt="logo">
            <a href="" class="mburguer">
                <img src="/Images/Burguer Menu.svg" alt="menu-burguer">
            </a>
        </header>

        <section class="show">
            <h1>Show Pet</h1>
            <img src="<?php  echo URLIMAGES . "/" . $pet['photo'] ?>" class="photo" alt="photo">
            <div class="info">
                <p><?=$pet['name'] ?></p>
                <p><?=$pet['type'] ?></p>
                <p><?=$pet['age']?>Years Old</p>
                <p><?=$pet['weight'] ?> Lbrs</p>
                <p><?=$pet['breed']?></p>
                <p><?=$pet['location']?></p>

            </div>
       
        </section>

    </main>
    
    <script src="/01_UI/Js/sweetalert2.js"></script>
    <script src="/01_UI/Js/jquery-3.7.1.min.js"></script>
 
</body>
</html>