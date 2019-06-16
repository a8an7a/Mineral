$(document).ready( function () {
    $('.login-form-authorization').submit( function () {

        var text_cell = $('.message-validation');

        text_cell.text('');

        var name      = $("input[name='name']").val();
        var fname     = $("input[name='fname']").val();
        var email     = $("input[name='email']").val();
        var password  = $("input[name='password']").val();

        if( name_validation(name) == true ){

            if( fname_validation(fname) == true ){

                if( email_validation(email) == true ){

                    if( password_validation(password) == true ){

                        return true;

                    }else{
                        text_cell.text(password_validation(password));
                        return false;
                    }

                }else{
                    text_cell.text(email_validation(email));
                    return false; 
                }

            }else{
                text_cell.text(fname_validation(fname));
                return false;
            }

        }else{
            text_cell.text(name_validation(name));
            return false;
        }

        return false;

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

    function name_validation ( name ){

        message_error = '';

        if(name.trim() == '' ){
            message_error = 'Введите ваше имя!';
        }else{
            message_error = true;
        }

        return message_error;

    }

    function fname_validation ( fname ){

        message_error = '';

        if(fname.trim() == '' ){
            message_error = 'Введите вашу Фамилию!';
        }else{
            message_error = true;
        }

        return message_error;

    }
    
})