<?php
    session_start();

    if ( isset($_SESSION['system_message']) AND !empty($_SESSION['system_message']) ) {

        $system_caption = $_SESSION['system_caption'];
        $system_message = $_SESSION['system_message'];

    }else{
        header( "location: index.php" );
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
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
                <div class="lht-greeting subtitle success"><?= $system_caption; ?></div>
            </div>
        </div>

        <div class="login-form">
            <div class="lf-success">
                <div class="lfs-text">
                    <?= $system_message; ?>
                </div>

                <div class="lfs-link">
                    <a href="index.php" class="a-link">На главную</a>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery Librarys -->
    <script src="./js/jquery-3.3.1.min.js"></script>

    <!-- Jquery Options -->
    <script src="./js/main.js"></script>
    <script src="./js/validation-forgot.js"></script>

</body>
</html>