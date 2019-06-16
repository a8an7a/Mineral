$(document).ready( function () {

    var img_id = null; // id изображения
    var boolean = true;

    var mas = [];

    // Откртытие блока редактирования 
    $('.open').click( function () {

        var view_img   = $('.resize-img');
        var edit_block = $('.modal-edit-image');
        var tags_block = $('.modal-bottom-content');

        img_id = $(this).attr('data-img-id');

        // В зависисмости от boolean открывает или закрывает
        if(boolean){
            imgResize( view_img, true );

            setTimeout( function () {
                edit_block.css('display', 'flex');
                edit_block.animate({ opacity: 1 }, 300, "swing");
            }, 300); 

            tags_block.find('.img-tag a').each(function () {
                $(this).removeAttr('href');
            })

            boolean = false;

        }else{
            imgResize( view_img, false );

            edit_block.css('display', 'none');
            edit_block.animate({ opacity: 0 }, 300, "swing");

            tags_block.find('.img-tag a').each(function () {
                tags_name = $(this).text();
                $(this).attr('href', 'search.php?tags=' + tags_name);
            })

            boolean = true;
        }
        
    });

    // Закрытие блока редактирования
    $('.modal').on('click', '.edit-close', function () {

        if(!boolean){
            var view_img   = $('.resize-img');
            var edit_block = $('.modal-edit-image');
            var tags_block = $('.modal-bottom-content');

            setTimeout( function () {
                edit_block.css('display', 'none');
                edit_block.animate({ opacity: 0 }, 300, "swing");
            }, 400);

            imgResize( view_img, false );

            tags_block.find('.img-tag a').each(function () {
                tags_name = $(this).text();
                $(this).attr('href', 'search.php?tags=' + tags_name);
            })

            boolean = true;
        }

    })

    // Добавление тэгов
    $('.mei-tags-add').click( function () {
        
        var tag = $('.mei-tags').val();
        
        if(tag){
            var tags_block = $('.modal-bottom-content');

            tags_block.css('display', 'flex');
            tags_block.append('<span class="img-tag"><a>' + tag + '</a></span>');
            $('.mei-tags').val('');

        }
    })

    // Удаление тэгов
    $('.modal-bottom-content').on('click', '.img-tag', function () {
        if(!boolean){
            $(this).addClass('del-tag');
            $('.del-tag').remove('');
        }
    })

    $('.mei-submit').click( function () {
        
        var tags = [];
        var string_tags = '';
        var tags_block = $('.modal-bottom-content');

        tags_block.find('.img-tag a').each(function () {
            tags.push( $(this).text() );
        })

        string_tags = tags.join(', ');

        var new_tags = new NewTags( img_id, string_tags );
        console.log( new_tags );

        $.ajax({
            url:  './php/resources/img_edit.php',
            type: 'POST',
            data: new_tags
        }).then( function ( data ) {

            var response = JSON.parse(data);
            location.reload( true );
            
        })

    })

    // Функция изменения размера изображения для редактирования
    function imgResize ( img, bool ){

        if(bool){
            size = ['600px', '380px', '800px'];
        }else{
            size = ['600px', '480px', '950px'];
        }
        
        var dataImg = new Image();
        dataImg.src = img.attr('src');

        dataImg.onload = function () {

            if(this.width == this.height){
                img.animate({ width: size[0] }, 300, "swing");
            }else{
                if(this.width <= 1000){
                    img.animate({ width: size[1] }, 300, "swing");
                }else{
                    img.animate({ width: size[2] }, 300, "swing");
                }
            }
        }

    }

    class NewTags {
        constructor(imgID, tags) {
            this.imgID = imgID;
            this.tags  = tags;
        }
    }


})