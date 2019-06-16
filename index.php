<?php
    session_start();
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

    <!-- PHP -->
    <?php 
        include "php/db/db.php";
        include "php/resources/all_img.php";
        include "php/resources/main_img.php"; 
    ?>

    <title>Document</title>
</head>

<body>

    <div class="header max-width">
        <div class="header-cover">
            <div class="header-logo-img">
                <a href="index.php"><img src="./img/logo-img/logo.png" alt=""></a>
            </div>

            <div class="header-caption">
                <a href="index.php">
                    <div class="hc-top">MINERAL</div>
                    <div class="hc-bottom">Арт-галерея</div>
                </a>
            </div>

            <div class="header-search">
                <form class="search-form" action="search.php" method="GET">
                    <button type="submit">
                        <img src="./img/social-img/search.png" alt="">
                    </button>
                    <input type="search" name="tags" id="search-img" placeholder="Поиск изображений" required>
                </form>
            </div>
        </div>

        <div class="authorization">
            
            <?php
                if( $_SESSION['logged_in'] ){
                    ?>

                        <div class="auth-name">
                            <a href="profile.php"><?php echo $_SESSION['Name'].' '.$_SESSION['Fname']; ?></a>
                        </div>

                        <div class="auth-name">
                            <a href="php/assets/logout.php">Выход</a>
                        </div>
                        
                        <div class="auth-img">
                            <img src="<?php echo $_SESSION['ProfileImg']; ?>" alt="">
                        </div>

                    <?php
                }else{
                    ?>

                        <a href="login.php" class="btn auth-a">Войти</a>
                        <a href="registration.php" class="btn violet reg-a">Регистрация</a>

                    <?php
                }
            ?>

        </div>
    </div>

    <div class="main-header">
        <div class="main-header-img">
            <img src="<?php echo $mainImg[0]['LinkImg']; ?>" alt="" class="header-img" >
            <div class="img-opacity"></div>
        </div>
        <div class="cover-main-search">
            <div class="main-search">
                <p class="main-serach-caption">MINERAL</p>
                <p class="main-serach-text">
                    Красивые, бесплатные фото.<br> Работы от самого щедрого в мире сообщества фотографов.
                </p>
                <div class="main-header-search-form">
                    <form class="header-search-form" action="search.php" method="GET">
                        <button>
                            <img src="./img/social-img/search.png" alt="">
                        </button>
                        <input type="search" name="tags" id="header-search-img" placeholder="Поиск бесплатных фотографий в высоком разрешении" required>
                    </form>
                </div>
                <p class="main-serach-underText">
                    <span>Тренды:</span>
                    <?php
                        $i = 0;
                        foreach ($sort_mas as $key => $value) {
                            if($key != '' && $i <= 5){
                                if($i != 5){
                                    echo '<a href="search.php?tags='.$key.'">'.$key.',</a>';
                                }else{
                                    echo '<a href="search.php?tags='.$key.'">'.$key.'</a>';
                                }
                            }
                            $i++;
                        }
                    ?>
                </p>
            </div>
        </div>
        <div class="author">
            <div class="author-photo">
                <span>Фото:</span>
                <a href="user.php?id=<?php echo $mainImg[0]['UserID']; ?>"><?php echo $mainImg[0]['Name'].' '.$mainImg[0]['Fname']; ?></a>
            </div>
            <div class="me">
                <a href="https://vk.com/sdrqww">Na1s</a>
            </div>
            <div class="you">
                <a href="https://vk.com/mozg_meduzy">Кристина <span>❤</span></a>
            </div>
        </div>
    </div>

    <div class="grid container">
        <div class="grid-sizer"></div>
        <?php
            foreach($allImg as $img){
                ?>
                    <div class="grid-item post">
                        <img src="<?php echo $img['MiniImg']; ?>"
                             data-id = "<?php echo $img['UserID']; ?>"
                             data-img = "<?php echo $img['LinkImg']; ?>"
                             data-img-tags = "<?php echo $img['ImgTags']; ?>"
                             data-username = "<?php echo $img['Name'].' '.$img['Fname']; ?>"
                             data-profile = "<?php echo $img['ProfileImg']; ?>" class="grid-img">
                    </div>
                <?php
            }
        ?>
    </div>

    <div class="modal">
        <div class="m-close close-cover">
            <img src="../img/social-img/close.png" alt="">
        </div>
        
        <div class="modal-content">

            <div class="modal-top-content">
                <div class="modal-left-cont">
                    <div class="box-img"><a href=""><img src="" alt=""></a></div>
                    <div class="left-text"><a href=""></a></div>
                </div>
                <div class="modal-right-cont">
                    <a href="" download>Скачать фото</a>
                </div>
            </div>

            <div class="modal-full-img">
                <div class="img-cover">
                    <img src="" alt="" class="resize-img">
                </div>
            </div>

            <div class="modal-bottom-content"></div>

        </div>
    </div>

    <!-- Jquery Librarys -->
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/jquery.min.js"></script>

    <!-- Jquery Plugins -->
    <script src="./js/dist/masonry.pkgd.min.js"></script>
    <script src="./js/dist/imagesloaded.pkgd.min.js"></script>
    <script src="./js/dist/jquery.viewportchecker.min.js"></script>

    <!-- Jquery Options -->
    <script src="./js/main.js"></script>
    <script src="./js/modal.js"></script>

    <script>
        $(document).ready(function() {

            $('.post').addClass("hidden").viewportChecker({
                classToAdd: 'visible animated slideInUp',
                offset: 100
            })

            var $grid = $('.grid').imagesLoaded( function() {
                $grid.masonry({
                    itemSelector: '.grid-item',
                    percentPosition: true,
                    columnWidth: '.grid-sizer'
                })
            })

        })
    </script>
</body>

</html>