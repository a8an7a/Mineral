$(document).ready( function () {
    $('.login-form-reset').submit( function () {

        $('.message-validation').text('');

        var new_password      = $("input[name='newpassword']").val();
        var confirm_password  = $("input[name='confirmpassword']").val();

        if( password_validation(new_password) == true ){

            if( password_confirm(new_password, confirm_password) == true ){

                return true; 

            }else{
                $('.message-validation').text( password_confirm(new_password, confirm_password) );
                return false; 
            }

        }else{
            $('.message-validation').text( password_validation(new_password) );
            return false;
        }

    })

    function password_validation( password ){

        message_error = '';

        if( password.trim() == '' ){
            message_error = 'Введите пароль!';
        }else{

            if( password.length < 8 ){
                message_error = 'Пароль должен содержать не менее восьми знаков!';
            }

        }

        if(message_error == ''){
            message_error = true;
        }

        return message_error;
    }

    function password_confirm ( password, confirm_password ){

        message_error = '';

        if( password === confirm_password ){
            message_error = true;
        }else{
            message_error = 'Пароли не совпадают!';
        }

        return message_error;

    }

    
})