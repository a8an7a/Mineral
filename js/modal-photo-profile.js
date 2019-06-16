$(document).ready( function () {

    var user_id      = null;
    var profile_url  = null;
    var image_loaded = false;
    var profile_img  = $('.profile-photo').attr('src');

    //Открытие модального окна изменения фотографии пользователя
    $('.up-group-item').click( function () {

        user_id  = $(this).attr('data-id');
        
        var mepp = $('.modal-edit-photo-profile');
        $('.profile-photo').attr('src', profile_img);

        $('body').css('overflow', 'hidden');

        mepp.css('display', 'flex');
        mepp.animate({
            opacity: 1
        }, 100, "swing");

    })

    // Закрытие модального окна изменения фотографии пользователя
    $('.mepp-close').click(function () {
        var main       = $('body');
        var mepp = $('.modal-edit-photo-profile');

        mepp.animate({
            opacity: 0
        }, 100, function(){
            mepp.css('display', 'none');
            main.css('overflow', 'overlay');

            $('.mepp-url').val('');
            $('.profile-photo').attr('src', profile_img);
        })
    })

    // Изменение изображения
    $('.mepp-url').blur( function(){
        
        var url = $(this).val();

        if(url){
            profile_url = url;
            $('.profile-photo').attr('src', url);
        }

    })

    // Проверка загрузки фото
    $('.profile-photo').on({
        load: function(){
            image_loaded = true;
        },
        error: function(){
            image_loaded = false;
        }
    })
    
    // Отправка данных в БД
    $('.mepp-add').click( function () {

        if(image_loaded && profile_url){
            $.ajax({
                url:  './php/resources/img_profile_edit.php',
                type: 'POST',
                data: { 
                    profile_img: profile_url,
                    user_id: user_id 
                }
            }).then( function( data ) {
    
                var response = JSON.parse(data);
                location.reload( true );
            })
        }

    })

})