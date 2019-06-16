$(document).ready(function(){

    $('.grid').on('click', '.grid-img', function() {
        var img          = $(this),
            modal        = $('.modal'),
            resize_img   = $('.resize-img'),
            user_id      = $(this).attr('data-id'),
            img_src      = $(this).attr('data-img'),
            img_id       = $(this).attr('data-img-id'),
            profile_img  = $(this).attr('data-profile'),
            username     = $(this).attr('data-username');

            tags         = $(this).attr('data-img-tags');
            tags         = tags.split(', ');
            
        $('.left-text a').attr('href', 'user.php?id=' + user_id);
        $('.box-img a').attr('href', 'user.php?id=' + user_id);
        $('.modal-right-cont a').attr('href', img_src);
        $('.mdc-button').attr('data-img-id', img_id);
        $('.mei-button').attr('data-img-id', img_id);
        $('.box-img img').attr('src', profile_img);
        $('.resize-img').attr('src', img_src);
        $('.left-text a').html(username);


        tags.forEach(element => {
            if(element != ''){
                $('.modal-bottom-content').append('<span class="img-tag"><a href="search.php?tags=' + element + '">' + element + '</a></span>');
            }
        });

        var test_image = new Image();
        test_image.src = img_src;

        test_image.onload = function() {

            if(this.width == this.height){

                resize_img.css('width', '600px');

            }else{

                if(this.width <= 1000){
                    resize_img.css('width', '480px');
                }else{
                    resize_img.css('width', '950px');
                }

            }

        }

        modal.css('display', 'flex');
        $('body').css('overflow', 'hidden');

        modal.animate({
            opacity: 1
        }, 100, "swing", function(){

            $('.header').animate({
                opacity: 0
            }, 100, 'swing')

        })

    })
    
    // $('.modal').click(function(){
    //     var modal       = $(this),
    //         main        = $('body'),
    //         content     = $('.modal-content');

    //     main.on('click', function(event){
            
    //         if($(event.target).closest(content).length){
    //             return;
    //         }

    //         modal.animate({
    //             opacity: 0
    //         }, 100, "swing", function(){

    //             $('.header').animate({
    //                 opacity: 1
    //             }, 100, "swing", function(){
    //                 modal.css('display', 'none');

    //                 $('body').css('overflow', 'overlay');
    //                 main.unbind('click');

    //                 _clean();

    //             })
    //         })

    //     })

    // })

    $('.m-close').click(function () {
        var main  = $('body');
        var modal = $('.modal');

        modal.animate({
            opacity: 0
        }, 100, "swing", function(){

            $('.header').animate({
                opacity: 1
            }, 100, "swing", function(){
                modal.css('display', 'none');

                $('body').css('overflow', 'overlay');
                main.unbind('click');

                _clean();

            })
        })
    })

    // $('body').keyup(function(e){
    //     var modal = $('.modal');

    //     if(e.keyCode === 27){

    //         if(modal.css('display') == 'flex'){
    //             modal.animate({
    //                 opacity: 0
    //             }, 100, 'swing', function(){
                    
    //                 $('.header').animate({
    //                     opacity: 1
    //                 }, 100, 'swing', function(){
    
    //                     modal.css('display', 'none');
    //                     $('body').css('overflow', 'overlay');
    
    //                     _clean();
    //                 })
    //             })
    //         }

    //     }

    // })

    function _clean() {
        $('.modal-right-cont a').attr('href', "");
        $('.mdc-button').attr('data-img-id', "");
        $('.mei-button').attr('data-img-id', "");
        $('.resize-img').css('width', '0px');
        $('.modal-bottom-content').html('');
        $('.left-text a').attr('href', "");
        $('.box-img img').attr('src', "");
        $('.box-img a').attr('href', "");
        $('.resize-img').attr('src', "");
        $('.left-text a').html("");
    }  
    
});