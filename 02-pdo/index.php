<?php

require "config/app.php";
require "config/database.php";

$pets = getAllPets($conx);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets</title>
   <link rel="stylesheet" href="/css/master.css">
</head>
<body>
    <main>
        <header class="nav level-0">
            <a href="/01_UI/html/dashboard.html">
                <img src="/Images/icon-back.svg" alt="back">
            </a>
            <img src="/Images/Pet Logo.svg" alt="logo">
            <a href="" class="mburguer">
                <img src="/Images/Burguer Menu.svg" alt="menu-burguer">
            </a>
        </header>

        <section class="module">
            <h1>Module Pets</h1>
            <a class="add" href="add.php">
              <img src="/Images/add-icon.svg" width="30px" alt="add">
              Add Pet
            </a>

           <table>
                <tbody>
                    <?php foreach($pets as $pet):  ?>
                    <tr>
                        <td><img src="<?php echo URLIMAGES ."/" . $pet['photo'] ?>" alt="Pet"></td>
                        <td>
                            <span><?php echo $pet['name'] ?></span>
                            <span><?php echo $pet['type'] ?></span>
                        </td>
                          <td>
                            <a href="show.php?id=<?=$pet['id']?>" class="show">
                                <img src="/Images/Icon-Search.svg" alt="">
                            </a>
                            <a href="edit.php?id=<?=$pet['id']?>" class="edit">
                                <img src="/Images/Icon -Edit.svg" alt="">
                            </a>
                            <a href="javascript:;" class="delete" data-id= "<?=$pet['id']?>">
                                <img src="/Images/Icon-Delete.svg" alt="">
                            </a>
                          </td>
                    </tr>
                    <?php endforeach ?>   
                </tbody>
           </table>
        </section>

    </main>
    <script src="/01_UI/Js/sweetalert2.js"></script>
    <script src="/01_UI/Js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
      
          <?php if(isset($_SESSION['msj'])): ?>
      
            Swal.fire({
            position: "top-end",
            title: "Congratulations!",
            text: "<?php echo $_SESSION['msj'] ?>",
            confirmButtonColor: false,
            timer: 5000
            })

          <?php unset($_SESSION['msg']) ?> 
          <?php endif ?>

          $('body').on('click', '.delete', function () {
          $id = $ (this).attr('data-id')
            Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "error",
            showCancelButton: true,
            confirmButtonColor: "#22799e",
            cancelButtonColor: "#2ec4b6",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.replace('delete.php?id=' + $id)
            }
            });
            
          })
        })
    </script>
    
</body>
</html>