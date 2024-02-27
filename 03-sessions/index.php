<?php

require "config/app.php";
require "config/database.php";

if (isset($_SESSION['uid'])){
    header("location:  dashboard.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Users</title>
   <link rel="stylesheet" href="/css/master.css">
</head>
<body>
<main>
        <header>
            <img src="/Images/Pet Logo.svg" alt="">
        </header>
 
    <section class="login">
       <menu>
        <a href="javascript:;">Login</a>
        <a href="register.php">Register</a>
        </menu>
        <form action="login.php" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
   </section>
</main>
    
    <script src="/01_UI/Js/sweetalert2.js"></script>
    <script src="/01_UI/Js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
      
          <?php if(isset($_SESSION['error'])): ?>
      
            Swal.fire({
            title: "Error!",
            text: "<?php echo $_SESSION['error'] ?>",
            confirmButtonColor: false,
            icon: "error",
            })

          <?php unset($_SESSION['error']) ?> 
          <?php endif ?>

        })
    </script>
    
</body>
</html>