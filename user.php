<?php
    /* include resources */
    require 'php/db/db.php';
    include 'php/resources/resize_img.php';
    include 'php/resources/strings_merge.php';
    include 'php/resources/strings_breaks.php';

    /* Запрос на выборку фотографий пользователя с id == $id */
    session_start();
    $id = $_GET['id'];

    $query = "SELECT user.UserID, user.Name, user.Fname, user.ProfileImg, img.LinkImg MiniImg, img.LinkImg LinkImg, img.Tags, img.Tags ImgTags FROM user, img WHERE user.UserID = img.UserID AND user.UserID = $id";
    $result  = mysqli_query($link, $query);

    if ($result){
        $user_img = [];
        while($img = mysqli_fetch_assoc($result)){
            $user_img[] = $img;
        }
        mysqli_free_result($result);
    }

    /* Ресайз изображений */
    resize_img($user_img);
    /* Разбиваем строку с тэгами на массив */
    strings_breaks($user_img);
    /* Объединяем все массивы тэгов для подсчета повторяющихся */
    $merge = strings_merge($user_img);
    /* Сортировка по убыванию кол-ва повторений тэгов */
    $sort_mas = array_count_values($merge);
    arsort($sort_mas);

    /* Подсчет фотографий */
    $query  = "SELECT COUNT(*) quantity FROM user, img WHERE user.UserID = img.UserID AND user.UserID = $id";
    $result = mysqli_query($link, $query);
    $count  = mysqli_fetch_assoc($result);
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
    <div class="header position-fix">
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
                    <button>
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

    <div class="user-profile">
        <div class="up-img"><img src="<?php echo $user_img[0]['ProfileImg']; ?>" alt=""></div>

        <div class="up-text">
            <div class="up-username"><?php echo $user_img[0]['Name'].' '.$user_img[0]['Fname']; ?></div>

            <div class="up-img-tag-name">Интересы</div>

            <div class="up-img-tag">
                <?php
                    $i = 0;
                    foreach ($sort_mas as $key => $value) {
                        if($key != '' && $i <= 5){
                            echo '<span class="img-tag"><a href="search.php?tags='.$key.'">'.$key.'</a></span>';
                        }
                        $i++;
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="user-photo-info">
        <div class="upi-text"><?php echo $count['quantity'].' фото'; ?></div>
    </div>

    <div class="grid container">
        <div class="grid-sizer"></div>
        <?php
            foreach($user_img as $img){
                ?>
                    <div class="grid-item post">
                        <img src           = "<?php echo $img['MiniImg']; ?>"
                             data-id       = "<?php echo $img['UserID']; ?>"
                             data-img      = "<?php echo $img['LinkImg']; ?>"
                             data-img-tags = "<?php echo $img['ImgTags']; ?>"
                             data-username = "<?php echo $img['Name'].' '.$img['Fname']; ?>"
                             data-profile  = "<?php echo $img['ProfileImg']; ?>" class="grid-img">
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