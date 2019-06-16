<?php

    require 'php/db/db.php';
    session_start();

    if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
    {
        $email = $link->escape_string($_GET['email']);
        $hash  = $link->escape_string($_GET['hash']);

        $result = $link->query("SELECT * FROM user WHERE email='$email' AND hash='$hash'");

        if ( $result->num_rows == 0 )
        {
            $_SESSION['system_caption'] = 'Ошибка';
            $_SESSION['system_message'] = "Неккоректная ссылка для смены пароля!";
            header("location: message.php");
        }
    }
    else {
        $_SESSION['system_caption'] = 'Ошибка';
        $_SESSION['system_message'] = "Извините, проверка не пройдена, попытайтесь снова!";
        header("location: message.php");
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
                <div class="lht-caption">MINERAL</div>
                <div class="lht-greeting subtitle">Смена пароля</div>
            </div>
        </div>

        <div class="login-form">
            <form action="php/assets/reset-password.php" method="POST" class="login-form-reset">
                <div class="form-group text-fix message">
                    <span class="fg-text message-validation">
                        <?php echo $message; unset($message); ?>
                    </span>
                </div>
                <div class="form-group">
                    <label for="" class="fg-name">Пароль</label>
                    <input type="password" class="fg-input" name="newpassword" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="" class="fg-name">Подтверждение пароля</label>
                    <input type="password" class="fg-input" name="confirmpassword" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="hidden" class="fg-input" name="email" value="<?= $email ?>">
                </div>
                <div class="form-group">
                    <input type="hidden" class="fg-input" name="hash" value="<?= $hash ?>">
                </div>
                <div class="form-group">
                    <input type="submit" value="Сменить пароль" class="fg-submit" name="login">
                </div>
            </form>
        </div>

    </div>
    
    <!-- Jquery Librarys -->
    <script src="./js/jquery-3.3.1.min.js"></script>

    <!-- Jquery Options -->
    <script src="./js/main.js"></script>
    <script src="./js/validation-reset.js"></script>

</body>
</html>