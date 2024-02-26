<?php

require "config/app.php";
require "config/database.php";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pet</title>
    <link rel="stylesheet" href="/css/master.css">   
</head>
<body>
    <main>
        <header class="nav level-1">
            <a href="index.php">
                <img src="/Images/icon-back.svg" alt="back">
            </a>
            <img src="/Images/Pet Logo.svg" alt="logo">
            <a href="" class="mburguer">
                <img src="/Images/Burguer Menu.svg" alt="menu-burguer">
            </a>
        </header>

        <section class="create">
            <h1>Add Pet</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <img src="/Images/Pet-upload.svg" id="upload" alt="upload-photo" required>
                <input type="file" name="photo" id="photo" accept="image/*">
                <input type="name" name="Name" placeholder="Name" required>
                <input type="text" name="Type" placeholder="Type" required>
                <input type="number" name="Weight" placeholder="Weight" required>
                <input type="number" name="Age" placeholder="Age" required>
                <input type="text" name="Breed" placeholder="Breed" required>
                <input type="text" name="Location" placeholder="Location" required>
                <button type="submit" class="sub">ADD</button>
            </form>
            <?php
                if ($_POST){

                    $photo =  time() . "." . pathinfo($_FILES['photo']
                    ['name'], PATHINFO_EXTENSION);
                    $data = [
                        'name'     => $_POST['Name'],
                        'photo'    => $photo,
                        'type'     => $_POST['Type'],
                        'weight'   => $_POST['Weight'], 
                        'age'      => $_POST['Age'],
                        'breed'    => $_POST['Breed'],
                        'location' => $_POST['Location']
                    ];

                    // echo var_dump($data);
 
                    if (addPet($conx, $data)) {
                        move_uploaded_file(($_FILES['photo']
                        ['tmp_name']) , "../Images/" . $photo);
                            header('Location: index.php');
                     } else{
                        
                     } 
                }            
            
            
            ?>

        </section>

    </main>
    
    <script src="/01_UI/Js/sweetalert2.js"></script>
    <script src="/01_UI/Js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#upload').click(function (e) { 
                e.preventDefault();
                $('#photo').click()
            })

            $('#photo').change(function (e) { 
                e.preventDefault();
                let reader = new FileReader()
                reader.onload = function(event){
                    $('#upload').attr('src',event.target.result)
                }
                reader.readAsDataURL(this.files[0])
            });
        })
    </script>
 
</body>
</html>