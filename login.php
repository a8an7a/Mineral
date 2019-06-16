<?php
    require 'php/db/db.php';
    session_start();


    if( $_SESSION['logged_in'] ){
        header("location: profile.php");
    }

    if( $_SERVER['REQUEST_METHOD'] == 'POST' )
    {
        if (isset($_POST['login'])) {
            require 'php/assets/login-hendler.php';
        }
    }

    if( isset($_SESSION['message']) ) {

        $message = $_SESSION['message'];
        unset($_SESSION['message']);
        
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS & Jquery -->
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/animate.css">

    <title>Document</title>
</head>
<body>

    <div class="login-cover">
        <div class="login-header">
            <div class="login-header-img">
                <a href="index.php"><img src="./img/logo-img/logo.png" alt=""></a>
            </div>
            <div class="login-header-text">
                <div class="lht-caption">Авторизация</div>
                <div class="lht-greeting subtitle">Добро пожаловать в MINERAL</div>
            </div>
        </div>

        <div class="login-form">
            <form action="login.php" method="post" class="login-form-authorization">
                <div class="form-group text-fix message">
                    <span class="fg-text message-validation">
                        <?php echo $message; unset($message); ?>
                    </span>
                </div>
                <div class="form-group">
                    <label for="" class="fg-name">E-mail</label>
                    <input type="text" class="fg-input" name="email">
                </div>
                <div class="form-group">
                    <label for="" class="fg-name">Пароль</label>
                    <label for="" class="fg-link"><a href="forgot.php">Забыли?</a></label>
                    <input type="password" class="fg-input" name="password">
                </div>
                <div class="form-group">
                    <input type="submit" value="Войти" class="fg-submit" name="login">
                </div>
                <div class="form-group text-fix">
                    <span class="fg-text">Вы еще не зарегестрированы?</span>
                    <span class="fg-text"><a href="registration.php">Зарегестрироваться</a></span>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Jquery Librarys -->
    <script src="./js/jquery-3.3.1.min.js"></script>

    <!-- Jquery Options -->
    <script src="./js/main.js"></script>
    <script src="./js/validation-login.js"></script>

</body>
</html>