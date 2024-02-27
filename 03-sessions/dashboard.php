<?php

require "config/app.php";
require "config/database.php";

    if(!isset($_SESSION['uid'])){
        $_SESSION['error'] = "Please login first to access dashboard";
        header("location: index.php");     
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
   <link rel="stylesheet" href="/css/master.css">
   <style>
        div.menu{
            background-color: var(--color-tre);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem;
            position: absolute;
            top: -1000px;
            opacity: 0;
            left: 0;
            z-index: 999;
            justify-content: center;
            min-height: 100vh;
            width: 100%;

            a:is(:link,:visited){
                border: 1px solid #ffff;
                border-radius: 50px;
                color: #ffff;
                font-size: 2rem;
                padding: 10px 20px;
                text-decoration: none;
            }
        }
        div.menu.open{
            animation: openMenu 0.5s ease-in 1 forwards;
        }
        div.menu.close{
            animation: closeMenu 0.5s ease-in 1 forwards;
        }
        @keyframes openMenu {
            0%{
                top: -1010px;
                opacity: 0;
            }
            100%{
                top: 0;
                opacity: 1;
            }
            
        }
        @keyframes closeMenu {
            0%{
                top: 0;
                opacity: 1;
            }
            100%{
                top: -1010px;
                opacity: 0;
            }
        }    
   </style>
</head>
<body>
    <div class="menu">
    <a href="javascript:;" class="closem">X</a>
    <nav>
        <a href="close.php">Close Sesion</a>
    </nav>
    </div>


<main>
        <header class="nav level-0">
            <a href="">
                <img src="/Images/icon-back.svg" alt="back">
            </a>
            <img src="/Images/Pet Logo.svg" alt="logo">
            <a href="javascript:;" class="mburguer">
                <img src="/Images/Burguer Menu.svg" alt="menu-burguer">
            </a>
        </header>

        <section class="dashboard">
            <h1>Dashboard</h1>
            <menu>
                <ul>
                    <li>
                        <a href="#">
                            <img src="/Images/ico-user.svg" alt="icon-user">
                            <span>Module User</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="/Images/icon-pet.svg" alt="icon-pet">
                            <span>Module Pets</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="/Images/icon-adopt.svg" alt="icon-adoption">
                            <span>Module Adoptions</span>
                        </a>
                    </li>
                </ul>
            </menu>
        </section>

    </main>
    
    <script src="/01_UI/Js/sweetalert2.js"></script>
    <script src="/01_UI/Js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {


        $('body').on('click', '.mburguer', function () {
            $('.menu').addClass('open')
        })
        $('body').on('click', '.closem', function () {
            $('.menu').addClass('close')
            setTimeout(() => {
                $('.menu').removeClass('open')
                $('.menu').removeClass('close')
            }, 500)
        });

          <?php if(isset($_SESSION['msg'])): ?>
      
            Swal.fire({
            title: "Congratulations!",
            text: "<?php echo $_SESSION['msj'] ?>",
            confirmButtonColor: false,
            })

          <?php unset($_SESSION['msg']) ?> 
          <?php endif ?>

        })
    </script>
    
</body>
</html>