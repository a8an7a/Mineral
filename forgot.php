<?php
    require 'php/db/db.php';
    session_start();

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
    {
        $email  = $link->escape_string($_POST['email']);
        $result = $link->query("SELECT * FROM user WHERE email='$email'");

        if ( $result->num_rows == 0 )
        {

            $_SESSION['message'] = "Пользователь с таким E-mail не найден!";

        }
        else {

            $user = $result->fetch_assoc();

            $name       = $user['Name'];
            $hash       = $user['hash'];
            $email      = $user['email'];

            // Для отображения email на message.php
            $_SESSION['system_caption']     = 'Великолепно';
            $_SESSION['system_message']     = 'Пожалуйста, проверьте свой почтовый ящик <span class="lfs-underline">'.$email.'</span> и следуйте дальнейшим указаниям по смене пароля';
            $_SESSION['link_confirmation']  = 'http://mineral/reset.php?email='.$email.'&hash='.$hash;

            // Отправка подтверждения сброса пароля (reset.php)
            $to           = $email;
            $subject      = 'MINERAL восстановление пароля';
            $message_body = 'Здравствуйте, '.$name.'! Пожалуйста, перейдите по следующей ссылке для выполнения сброса пароля: http://mineral/reset.php?email='.$email.'&hash='.$hash;

            mail($to, $subject, $message_body);
            header("location: message.php");
        }
    }

    if ( isset($_SESSION['message']) ) {

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
                <div class="lht-caption">MINERAL</div>
                <div class="lht-greeting subtitle">Восстановление пароля</div>
            </div>
        </div>

        <div class="login-form">
            <form action="forgot.php" method="post" class="login-form-forgot">
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
                    <input type="submit" value="Восстановить" class="fg-submit" name="login">
                </div>
            </form>
        </div>

    </div>

    
    <!-- Jquery Librarys -->
    <script src="./js/jquery-3.3.1.min.js"></script>

    <!-- Jquery Options -->
    <script src="./js/main.js"></script>
    <script src="./js/validation-forgot.js"></script>

</body>
</html>