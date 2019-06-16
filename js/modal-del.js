$(document).ready( function () {

    var img_id = null;

    // Кнопка открытия модального окна
    $('.mdc-button').click( function () {
        var modal_del = $('.modal-delete-confirmation');
        var username  =  modal_del.attr('data-name');

        img_id = $(this).attr('data-img-id');

        modal_del.css('display', 'flex');

        modal_del.animate({
            opacity: 1
        }, 100, "swing", function () {
            $('.mdcc-text').text(username + ', вы действительно хотите удалить фото?');
        });

    })

    // Закрытие модального окна
    $('.modal-delete-confirmation').on('click', '.mdc-no, .mdc-close', function () {
        var modal_del  = $('.modal-delete-confirmation');

        modal_del.animate({
            opacity: 0
        }, 100, "swing", function(){
            modal_del.css('display', 'none');
        })
    })

    // Кнопка открытия модального окна
    $('.mdc-yes').click( function () {
        $.ajax({
            url:  './php/resources/img_del.php',
            type: 'POST',
            data: {ImgID: img_id}
        }).then( function ( data ) {
            // var response = JSON.parse(data);
            location.reload( true );
        })
    })

})