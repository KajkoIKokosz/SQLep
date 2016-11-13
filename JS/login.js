$(document).ready(function(){
    
    var registr = $('#register');
    registr.on('click', function() {
        if ( !registr.hasClass('stopPrevDefault') ) {
            event.preventDefault();
        }
    
        var registrForm = $('<input type="text" name="userName" class="register_element" placeholder="imie">'+
               '<br class="register_element">'+
               '<input type="text" name="surName" class="register_element" placeholder="nazwisko">'+
               '<br class="register_element">'+
               '<input type="text" name="shipping_address" class="register_element" placeholder="adres / przesyłka">'+
               '<br class="register_element">');
       
        var repetPasswd = $('<input type="password" name="passwd_repeat" class="register_element" placeholder="repeat password"><br class="register_element">');
        
        var backToLog = $('<div id="backToLog" class="register_element"><br class="register_element"> &#x21a9;</div>');
        
        $('#loging_form').prepend(registrForm);
        $('#beforeRepeatPasswd').after(repetPasswd);
        $('#register').after(backToLog);
        
        $('.removeWhileRegister').slideUp(10);
        
        registr.addClass('stopPrevDefault');
        
        var backToLog = $('#backToLog');
        backToLog.on('click', function() {
            $('.removeWhileRegister').slideDown(50);
            $('.register_element').remove();
            registr.removeClass('stopPrevDefault');
        })
       
    });
    

})
