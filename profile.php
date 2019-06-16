<?php
    /* include resources */
    require 'php/db/db.php';
    include 'php/resources/resize_img.php';
    include 'php/resources/strings_merge.php';
    include 'php/resources/strings_breaks.php';

    session_start();

    if( isset($_SESSION['logged_in']) AND !empty($_SESSION['logged_in']) AND $_SESSION['logged_in'] == true ){

        $id          = $_SESSION['UserID'];
        $name        = $_SESSION['Name'];
        $fname       = $_SESSION['Fname'];
        $ProfileImg  = $_SESSION['ProfileImg'];
        $sys_message = $_SESSION['system_message'];


        $query = "SELECT user.UserID, user.Name, user.Fname, user.ProfileImg, img.ImgID, img.LinkImg MiniImg, img.LinkImg LinkImg, img.Tags, img.Tags ImgTags 
                  FROM user, img 
                  WHERE user.UserID = img.UserID AND user.UserID = $id";
                  
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

    }
    else{
        header("location: index.php");
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
                            <a href="profile.php"><?= $name.' '.$fname; ?></a>
                        </div>

                        <div class="auth-name">
                            <a href="php/assets/logout.php">Выход</a>
                        </div>
                        
                        <div class="auth-img">
                            <img src="<?= $ProfileImg; ?>" alt="">
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
    
    <?php
        if( isset($_SESSION['active']) AND $_SESSION['active'] == 0 ){
            ?>
                <div class="message-about-registration">
                    <div class="mar-text">
                        <?= $sys_message; ?>
                    </div>
                </div>
            <?php
        }
    ?>

    <div class="user-profile">
        <div class="up-group">
            <div class="for-img"><img src="<?= $ProfileImg; ?>" alt=""></div>
            <div class="up-group-item edit-photo-profile" data-id="<?= $id; ?>">Изменить фото</div>
        </div>

        <div class="up-text">
            <div class="up-username"><?= $name.' '.$fname; ?></div>

            <div class="up-img-tag-name">
                <?php
                    if( $count['quantity'] == 0 ){
                        echo 'Загрузите фотографии и добавьте к ним тэги, <br>чтобы другие пользователи могли увидеть <br>чем вы интересуетесь';
                    }
                    else{
                        echo 'Интересы';
                    }
                ?>
                
            </div>

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
        <div class="upi-text"><?= $count['quantity'].' фото'; ?></div>
        <div class="upi-text mpa-button">Добавить изображение</div>
    </div>

    <?php
        if( $count['quantity'] == 0 ){
            ?>
                <div class="image-not-found">
                    <div class="inf-content">
                        <div class="infc-img"><img src="./img/social-img/picture2.png" alt=""></div>
                        <div class="infc-text">У вас нет изображений, но вы можете их добавить</div>
                    </div>
                </div>
            <?php
        }
    ?>

    <div class="grid container">
        <div class="grid-sizer"></div>
        <?php
            foreach($user_img as $img){
                ?>
                    <div class="grid-item post">
                        <img src           = "<?php echo $img['MiniImg']; ?>"
                             data-id       = "<?php echo $img['UserID']; ?>"
                             data-img      = "<?php echo $img['LinkImg']; ?>"
                             data-img-id   = "<?php echo $img['ImgID']; ?>"
                             data-img-tags = "<?php echo $img['ImgTags']; ?>"
                             data-username = "<?php echo $img['Name'].' '.$img['Fname']; ?>"
                             data-profile  = "<?php echo $img['ProfileImg']; ?>" class="grid-img">
                    </div>
                <?php
            }
        ?>
    </div>

    <div class="modal">
        <div class="m-close edit-close close-cover">
            <img src="../img/social-img/close.png" alt="">
        </div>

        <div class="modal-content">

            <div class="modal-top-content">
                <div class="modal-left-cont">
                    <div class="box-img"><a href=""><img src="" alt=""></a></div>
                    <div class="left-text"><a href=""></a></div>
                </div>
                <div class="modal-right-cont">
                    <div class="mei-button open option-button" data-img-id="">Редактировать</div>
                    <div class="mdc-button option-button" data-img-id="">Удалить</div>
                    <a href="" download>Скачать фото</a>
                </div>
            </div>

            <div class="modal-full-img">
                <div class="img-cover">
                    <img src="" alt="" class="resize-img">
                </div>
            </div>

            <div class="modal-bottom-content"></div>

            <div class="modal-edit-image">
                <div class="subtitle-input">Нажмите, чтобы удалить</div>
                <div class="input-group">
                    <input type="text" class="profile-input mei-tags" placeholder="Тэг для изображения">
                    <span class="mei-tags-add tags-add">Добавить Тэг</span>
                </div>
                <div class="input-group">
                    <button class="mei-submit profile-submit">Редактировать</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal-profile-add" data-id="<?= $id; ?>">

        <div class="mpa-close close-cover">
            <img src="../img/social-img/close.png" alt="">
        </div>

        <div class="mpa-content">

            <div class="m-header">
                <div class="mh-img"><img src="../img/logo-img/logo2.png" alt=""></div>
                <div class="mh-text">Добавление изображения</div>
            </div>

            <div class="mpac-middle">
                <img src="" alt="" class="mpacmi test">
            </div>

            <div class="mpac-tags"></div>

            <div class="mpac-bottom">
                <div class="mpacb-input-cover">
                    <div class="input-group">
                        <input type="text" class="profile-input url" placeholder="URL изображения">
                    </div>
                    <div class="input-group">
                        <input type="text" class="profile-input tags" placeholder="Тэг для изображения">
                        <span class="mpac-tags-btn tags-add">Добавить Тэг</span>
                    </div>
                    <div class="input-group">
                        <button class="mpac-add profile-submit">Добавить</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal-answ-f-add" data-name="<?= $name; ?>">
        <div class="mafa-close close-cover">
            <img src="../img/social-img/close.png" alt="">
        </div>

        <div class="mafa-content">
            <div class="mafac-text"></div>
        </div>
    </div>

    <div class="modal-delete-confirmation" data-name="<?= $name; ?>">
        <div class="mdc-close close-cover">
            <img src="../img/social-img/close.png" alt="">
        </div>


        <div class="mdc-content">
            <div class="mdcc-text"></div>
            <div class="mdcc-button">
                <button class="mdcb-item mdc-yes">Да</button>
                <button class="mdcb-item mdc-no">Нет</button>
            </div>
        </div>
    </div>

    <div class="modal-edit-photo-profile">
        <div class="mepp-close close-cover">
            <img src="../img/social-img/close.png" alt="">
        </div>

        <div class="mepp-content">

            <div class="m-header">
                <div class="mh-img"><img src="../img/logo-img/logo2.png" alt=""></div>
                <div class="mh-text">Изменить аватар</div>
            </div>

            <div class="mepp-img">
                <div class="meppi-cover for-img">
                    <img src="<?= $ProfileImg; ?>" alt="" class="profile-photo">
                </div>
            </div>

            <div class="input-group">
                <input type="text" class="profile-input mepp-url" placeholder="URL изображения">
            </div>
            
            <div class="input-group">
                <button class="mepp-add profile-submit">Изменить</button>
            </div>
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
    <script src="./js/modal-add.js"></script>
    <script src="./js/modal-del.js"></script>
    <script src="./js/modal-edit.js"></script>
    <script src="./js/modal-photo-profile.js"></script>

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