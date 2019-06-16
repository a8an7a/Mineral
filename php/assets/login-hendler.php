<?php

    $email  = $link->escape_string($_POST['email']);
    $result = $link->query("SELECT * FROM user WHERE email='$email'");

    if ( $result->num_rows == 0 ){

        $_SESSION['message'] = "Такого пользователя не существует!";

    }
    else {

        $user = $result->fetch_assoc();

        if ( password_verify($_POST['password'], $user['password']) ) {

            $_SESSION['UserID']     = $user['UserID'];
            $_SESSION['Name']       = $user['Name'];
            $_SESSION['Fname']      = $user['Fname'];
            $_SESSION['ProfileImg'] = $user['ProfileImg'];
            $_SESSION['active']     = $user['active'];
            $_SESSION['logged_in']  = true;

            $_SESSION['system_message'] = 'Ваш аккаунт не подтвержден. Пожалуйста, перейдите по ссылке, которая была выслана на ваш почтовый ящик <span class="mar-underline">'.$email.'</span> для его подтверждения';

            header("location: ../../profile.php");
        }
        else {
            $_SESSION['message'] = "Вы ввели неверный пароль, попробуйте снова!";
        }
    }
?>