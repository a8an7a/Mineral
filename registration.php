<?php
    require 'php/db/db.php';
    session_start();


    if( $_SESSION['logged_in'] ){
        header("location: profile.php");
    }

    if( $_SERVER['REQUEST_METHOD'] == 'POST' )
    {
        if ( isset($_POST['registration']) ) {
            require 'php/assets/registration-hendler.php';
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
        <div class="registration-cover">

            <div class="registration-cover-img">
                <div class="rсi-img" style="background-image: url(http://source.unsplash.com/random/q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=2080&fit=max);">
                    <div class="rci-content">
                        <div class="rciс-logo"><a href="index.php"><img src="./img/logo-img/logo-white2.png" alt=""></a></div>
                        <div class="rcic-text">
                            <span class="rcic-title">Фотографии начинаются здесь</span>
                            <span class="rcic-subtitle">Галерея изображений высокого качества от независимых фотографов</span>
                        </div>
                        <div class="rcic-caption">MINERAL</div>
                    </div>
                </div>
            </div>

            <div class="login-cover">

                <div class="login-header">
                    <div class="login-header-text">
                        <div class="lht-caption">Регистрация в <span class="lht-mineral">MINERAL</span></div>
                        <div class="lht-greeting reg-subtitle">Уже есть аккаунт? <a href="login.php">Войти</a></div>
                    </div>
                </div>

                <div class="login-form">
                    <form action="registration.php" method="post" class="login-form-authorization">
                        <div class="form-group text-fix message">
                            <span class="fg-text message-validation">
                                <?php echo $message; unset($message); ?>
                            </span>
                        </div>
                        <div class="form-group-row">
                            <div class="fgr-cell">
                                <label for="" class="fg-name">Имя</label>
                                <input type="text" class="fg-input" name="name">
                            </div>
                            <div class="fgr-cell">
                                <label for="" class="fg-name">Фамилия</label>
                                <input type="text" class="fg-input" name="fname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="fg-name">E-mail</label>
                            <input type="text" class="fg-input" name="email">
                        </div>
                        <div class="form-group">
                            <label for="" class="fg-name">Пароль</label>
                            <input type="password" class="fg-input" name="password">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Зарегистрироваться" class="fg-submit" name="registration">
                        </div>
                    </form>
                </div>

            </div>

        </div>
    
    <!-- Jquery Librarys -->
    <script src="./js/jquery-3.3.1.min.js"></script>

    <!-- Jquery Options -->
    <script src="./js/main.js"></script>
    <script src="./js/validation-reg.js"></script>

</body>
</html>