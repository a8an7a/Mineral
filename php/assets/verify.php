<?php
    require '../db/db.php';
    session_start();

    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
    {
        $email = $link->escape_string( $_GET['email'] );
        $hash  = $link->escape_string( $_GET['hash']  );

        $result = $link->query( "SELECT * FROM user WHERE email='$email' AND hash='$hash' AND active='0'" );

        if ( $result->num_rows == 0 )
        {

            $_SESSION['system_caption'] = 'Ошибка';
            $_SESSION['system_message'] = 'Аккаунт уже подтвержден!';

            header("location: ../../message.php");

        }
        else {

            $_SESSION['system_caption'] = 'Великолепно';
            $_SESSION['system_message'] = 'Аккаунт успешно подтвержден!';

            $link->query( "UPDATE user SET active='1' WHERE email='$email'" ) or die( $link->error );

            $_SESSION['active'] = 1;

            header("location: ../../message.php");

        }

    }
    else {

        $_SESSION['system_caption'] = 'Ошибка';
        $_SESSION['system_message'] = 'Неккоректные параметры для подтверждения аккаунта!';

        header("location: ../../message.php");

    }
?>