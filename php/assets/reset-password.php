<?php
    require '../db/db.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);

        $email = $link->escape_string($_POST['email']);
        $hash  = $link->escape_string($_POST['hash']);

        $sql = "UPDATE user SET password='$new_password', hash='$hash' WHERE email='$email'";

        if ( $link->query($sql) ) {

            $_SESSION['system_caption'] = "Великолепно";
            $_SESSION['system_message'] = "Ваш пароль успешно изменен!";
            header("location: ../../message.php");

        }

    }

?>