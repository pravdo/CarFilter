<?php
//get_header();
ob_start();
session_start();
?>

<?
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
?>

<html lang = "en">

<head>
    <title>Tutorialspoint.com</title>
    <link href = "css/bootstrap.min.css" rel = "stylesheet">

    <style>
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color :#485461 ;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #017572;
        }

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }

        .form-signin .checkbox {
            font-weight: normal;
        }

        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 20;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
        }

        h2{
            text-align: center;
            color: #9fa4c4;
            margin : 5px;
            padding: 3px;
        }
        
        .form-control{
            margin: 3px;
        }
        
        a.one{
            color: red;
        }
    </style>

</head>

<body>
<a class = "one" href="http://www.carfilter.rivkomers.com/">Начало</a>
<h2>Enter Username and Password</h2>
<div class = "container form-signin">

    <?php
    $msg = '';

    if (isset($_POST['login']) && !empty($_POST['username'])
        && !empty($_POST['password'])) {
            

        if ($_POST['username'] == 'admin' &&
            $_POST['password'] == 'chTa!}nLG.{gj9+YP!?t4=*n/{9zP+') {
                
            $_SESSION['valid'] = true;
            $_SESSION['username'] = 'admin';

            echo 'You have entered valid use name and password';
        }else {
            $msg = 'Wrong username or password';
        }
    }
    ?>
</div> <!-- /container -->

<div class = "container">

    <form class = "form-signin" role = "form"
          action = " " method = "post">
        <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
        <input type = "text" class = "form-control"
               name = "username" placeholder = "username"
                autofocus></br>
        <input type = "password" class = "form-control"
               name = "password" placeholder = "password" >
               <div>
        <button class = "btn btn-lg btn-primary btn-block" type = "submit"
                name = "login">Login</button>

                </div>
    </form>

    Click here to clean <a class = "two" href = "/wp-content/themes/online-shop/logout.php" title = "Logout">Session.

</div>

</body>
</html>