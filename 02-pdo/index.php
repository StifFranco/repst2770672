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
        <header class="nav level-1">
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
           <table>
                <tbody>
                    <?php foreach($pets as $pet):  ?>
                    <tr>
                        <td><img src="/Images/Pet-icon.svg" alt=""></td>
                        <td>
                            <span><?php echo $pet['name'] ?></span>
                            <span><?php echo $pet['type'] ?></span>
                        </td>
                          <td>
                            <a href="./show.html" class="show">
                                <img src="/Images/Icon-Search.svg" alt="">
                            </a>
                            <a href="./edit.html" class="edit">
                                <img src="/Images/Icon -Edit.svg" alt="">
                            </a>
                            <a href="javascript:;" class="delete">
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
          $('body').on('click', '.delete', function () {
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
    Swal.fire({
      title: "Deleted!",
      text: "The user deleted.",
      icon: "success",
      confirmButtonColor: "#22799e"
    });
  }
});
            
          })
        })
    </script>
    
</body>
</html>