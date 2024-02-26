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
    <title>Edit Pet</title>
    <link rel="stylesheet" href="/css/master.css">
</head>
<body>
    <main>
        <header class="nav level-1">
            <a href="index.php  " >
                <img src="/Images/icon-back.svg" alt="back">
            </a>
            <img src="/Images/Pet Logo.svg" alt="logo">
            <a href="" class="mburguer">
                <img src="/Images/Burguer Menu.svg" alt="menu-burguer">
            </a>
        </header>

        <section class="update">
            <h1>Edit Pet</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$pet['id']?>">
                <img src="<?php  echo URLIMAGES . "/" . $pet['photo'] ?>" id="upload" alt="upload-photo">
                <input type="file" name="photo" id="photo" accept="image/*">
                <input type="name" name="Name" value="<?=$pet['name'] ?>" placeholder="Name" required>
                <input type="text" name="Type" value="<?=$pet['type'] ?>" placeholder="Type" required>
                <input type="number" name="Age" value="<?=$pet['age'] ?>" placeholder="Age" required>
                <input type="number" name="Weight" value="<?=$pet['weight'] ?>" placeholder="Weight" required>
                <input type="text" name="Breed" value="<?=$pet['breed'] ?>" placeholder="Breed" required>
                <input type="text" name="Location" value="<?=$pet['location'] ?>" placeholder="Location" required>
                <button type="submit" class="sub">UPDATE</button>
            </form>
            <?php
                if ($_POST){

                    if(!empty($_FILES['photo']['name'])) {
                        $photo =  time() . "." . pathinfo($_FILES['photo']
                        ['name'], PATHINFO_EXTENSION);
                        $data = [
                            'id'     => $_POST['id'],
                            'name'     => $_POST['Name'],
                            'photo'    => $photo,
                            'type'     => $_POST['Type'],
                            'age'      => $_POST['Age'],
                            'weight'   => $_POST['Weight'],
                            'breed'    => $_POST['Breed'],
                            'location' => $_POST['Location']
                        ];


                    } else{
                        $data = [
                        'id'       => $_POST['id'],    
                        'name'     => $_POST['Name'],
                        'type'     => $_POST['Type'],
                        'age'      => $_POST['Age'],
                        'weight'   => $_POST['Weight'],
                        'breed'    => $_POST['Breed'],
                        'location' => $_POST['Location']
                    ];

                    }


                 if (updatePet($conx,  $data)){
                     if (!empty($_FILES['photo']['name'])) {
                        move_uploaded_file(($_FILES['photo']
                        ['tmp_name']) , "../Images/" . $photo);
                    } else{
                        
                    }
                    header('Location: index.php');

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