$(document).ready( function() {

    var string_tags = [];     // массив с тэгами
    var image_loaded = false; // статус изображения

    // Кнопка открытия модального окна
    $('.mpa-button').click( function () {
        
        $('body').css('overflow', 'hidden');
        $('.modal-profile-add').css('display', 'flex');

        $('.modal-profile-add').animate({
            opacity: 1
        }, 100, "swing");

    })

    // Поле для вставки изображения
    $('.url').blur( function () {
        var path     = $(this).val();
        var view_img = $('.mpacmi');

        view_img.toggleClass('more1000 less1000 equal', false);

        if(path){

            var image = new Image();
            image.src = path;
            
            view_img.attr('src', image.src);

            image.onload = function() {

                if(this.width == this.height){

                    view_img.css('width', '600px');
    
                }else{

                    if(this.width <= 1000){
                        view_img.css('width', '380px');
                    }else{
                        view_img.css('width', '800px');
                    }

                }
            }

        }

    })

    // Добавление тэгов
    $('.mpac-tags-btn').click( function () {
        
        var tag = $('.tags').val();
        
        if(tag){

            string_tags.push(tag);

            $('.mpac-tags').css('display', 'flex');

            $('.mpac-tags').append('<span class="img-tag mpac-padding-fix"><a>' + tag + '</a></span>');
            $('.tags').val('');

        }
    })

    // Удаление тэгов
    $('.mpac-tags').on('click', '.img-tag', function () {

        var ind = string_tags.indexOf( $(this).text() );
        string_tags.splice(ind, 1);

        $(this).addClass('del-tag');
        $('.del-tag').remove('');

    })

    // Закрытие модального окна
    $('.mpa-close').click(function () {
        var main       = $('body');
        var modal     = $('.modal-profile-add');

        modal.animate({
            opacity: 0
        }, 100, "swing", function(){
            modal.css('display', 'none');
            main.css('overflow', 'overlay');
        })
    })

    // Закрытие диалогового окна
    $('.mafa-close').click(function () {
        var main       = $('body');
        var modal     = $('.modal-answ-f-add');

        modal.animate({
            opacity: 0
        }, 100, "swing", function(){
            modal.css('display', 'none');
            main.css('overflow', 'overlay');
        })

        location.reload( true );
    })

    // Закрытие модального окна при нажатии на ESC
    // $('body').keyup(function(e){
    //     var modal_add = $('.modal-profile-add');
    //     var modal_afa = $('.modal-answ-f-add');

    //     if(e.keyCode === 27){

    //         if(modal_add.css('display') == 'flex'){
    //             modal_add.animate({
    //                 opacity: 0
    //             }, 100, "swing", function(){
    
    //                 modal_add.css('display', 'none');
    //                 $('body').css('overflow', 'overlay');
    
    //             })  
    //         }

    //         if(modal_afa.css('display') == 'flex'){
    //             modal_afa.animate({
    //                 opacity: 0
    //             }, 100, "swing", function(){
    
    //                 modal_afa.css('display', 'none');
    //                 $('body').css('overflow', 'overlay');
                    
    //                 location.reload( true );
    //             })
    //         }
            
    //     }
    // })

    // Проверка загрузки фото
    $('.mpacmi').on({
        load: function(){
            image_loaded = true;
        },
        error: function(){
            image_loaded = false;
            $('.mpacmi').toggleClass('less1000 more1000', false);
        }
    })

    // Добавление изображения с последующим ответом
    $('.modal-profile-add').on('click', '.mpac-add', function() {

        if(string_tags.length != 0 && image_loaded){

            var tags  =  '';
            var url   =  $('.mpacmi').attr('src');
            var id    =  $('.modal-profile-add').attr('data-id');

            // for(var i = 0; i < string_tags.length; i++){
            //     if(i != string_tags.length - 1){
            //         tags += string_tags[i] + ', ';
            //     }else{
            //         tags += string_tags[i];
            //     }
            // }

            tags = string_tags.join(', ');

            var new_image = new NewImage( id, url, tags );

            $.ajax({
                url:  './php/resources/img_add.php',
                type: 'POST',
                data: new_image
            }).then( function ( data ) {
                var response = JSON.parse(data);

                modal_clean();
                answ_f_add( response );

            })
        }

    })

    // Функция открытия диалогового окна
    function answ_f_add( bool ) {

        var main    = $('body'), 
            mafa    = $('.modal-answ-f-add'),
            mafa_text      = $('.mafac-text'),
            mafa_content   = $('.mafa-content'),
            name_user      = $('.modal-answ-f-add').attr('data-name');
        
        if(bool){
            mafa_content.css('background-color', '#3cb46e');
            mafa_text.text(name_user + ', вы успешно добавили фотографию');
        }else{
            mafa_content.css('background-color', '#ca4546');
            mafa_text.text('Ошибка, изображение не добавлено');
        }

        main.css('overflow', 'hidden');
        mafa.css('display', 'flex');

        mafa.animate({
            opacity: 1
        }, 100, "swing")

    } 

    // Очистка и закрытие модального окна
    function modal_clean() {
        var path     = $('.url'),
            view_img = $('.mpacmi'),
            tags     = $('.mpac-tags');

        path.val('');
        tags.html('');
        view_img.attr('src', '');

        var main      = $('body'),
            modal_add = $('.modal-profile-add');
        
        modal_add.css('opacity', '0');
        modal_add.css('display', 'none');
        main.css('overflow', 'overlay');
    }

    class NewImage {
        constructor(id, url, tags) {
            this.id   = id;
            this.url  = url;
            this.tags = tags;
        }
    }

    // $('.mpac-tags').find('.img-tag').each(function () {
    //     console.log($(this).text());
    // })

})