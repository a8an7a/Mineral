<?php

    $_SESSION['email'] = $_POST['email'];
    $_SESSION['name']  = $_POST['name'];
    $_SESSION['fname'] = $_POST['fname'];

    $name       = $link->escape_string($_POST['name']);
    $fname      = $link->escape_string($_POST['fname']);
    $email      = $link->escape_string($_POST['email']);
    $password   = $link->escape_string( password_hash($_POST['password'], PASSWORD_BCRYPT) );
    $hash       = $link->escape_string( md5( rand(0,1000) ) );

    $result = $link->query( "SELECT * FROM user WHERE email='$email'" ) or die( $link->error() );

    if ( $result->num_rows > 0 ) {

        $_SESSION['message'] = 'Пользователь с таким E-mail уже зарегистрирован';

    }
    else {

        $sql = "INSERT INTO `user`(`Name`, `Fname`, `email`, `password`, `hash`) 
                VALUES ('$name', '$fname', '$email', '$password', '$hash')";

        if ( $link->query($sql) ){

            $result_id = $link->query( "SELECT `UserID`, `ProfileImg` FROM user WHERE email='$email'" ) or die( $link->error() );
            $user      = $result_id->fetch_assoc();
            
            $_SESSION['UserID']     = $user['UserID'];
            $_SESSION['Name']       = $name;
            $_SESSION['Fname']      = $fname;
            $_SESSION['ProfileImg'] = $user['ProfileImg'];

            $_SESSION['active']     = 0;
            $_SESSION['logged_in']  = true;

            // Для отображения email на profile.php
            $_SESSION['system_message'] = 'Ваш аккаунт не подтвержден. Пожалуйста, перейдите по ссылке, которая была выслана на ваш почтовый ящик <span class="mar-underline">'.$email.'</span> для его подтверждения';

            // Отправка подтверждения сброса пароля (verify.php)
            $to           = $email;
            $subject      = 'MINERAL подтверждение аккаунта';
            $message_body = 'Здравствуйте, '.$name.'! Пожалуйста, перейдите по следующей ссылке для подтверждения аккаунта: http://mineral/php/assets/verify.php?email='.$email.'&hash='.$hash;

            mail( $to, $subject, $message_body );
            header("location: profile.php");
        }
        else {

            $_SESSION['message'] = 'Регистрация не удалась';

        }

    }
?>