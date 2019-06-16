$(document).ready( function () {
    $('.login-form-authorization').submit( function () {

        $('.message-validation').text('');

        var email     = $("input[name='email']").val();
        var password  = $("input[name='password']").val();

        if ( email_validation(email) == true ){

            if( password_validation(password) == true ){

                return true;

            }else{
                $('.message-validation').text( password_validation(password) );
                return false;
            }

        }else{
            $('.message-validation').text( email_validation(email) );
            return false;
        }

    })

    function email_validation( email ){
    
        message_error = '';
        mail_format = ['gmail.com', 'mail.ru', 'inbox.ru', 'list.ru', 'bk.ru'];
        
        if(email.trim() == ''){
            message_error = 'Заполните поле E-mail!';
        }else{

            if(email.indexOf("@") > 0){

                format_bool = false;

                for(var i = 0; i < mail_format.length; i++){
                    if( email.indexOf(mail_format[i]) > 0 ){
                        format_bool = true;
                        // break;
                    }
                }

                if(!format_bool){
                    message_error = 'Данный E-mail не поддерживается!';
                }

            }else{

                message_error = 'Неверный формат E-mail!';
            }

        }

        if(message_error == ''){
            message_error = true;
        }

        return message_error;
    }

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

    
})