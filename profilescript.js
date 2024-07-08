document.addEventListener('DOMContentLoaded', function(){
    $('#submitbutton').click(function(e) {
        e.preventDefault();
        validateForm();
    });

    function validateForm(){
        var isValid = true;
        var name = $('#exampleFormControlInput2');
        var email = $('#exampleInputEmail1');
        var phone = $('#phone'); 

        $(".error").text("");
        name.removeClass('error-input');
        email.removeClass('error-input');
        phone.removeClass('error-input');

        if(name.val() === ''){
            $('#nameError').text('Name is required');
            name.addClass('error-input');
            isValid = false;
        } else if(!validateName(name.val())){
            $('#nameError').text('Name should contain only characters');
            name.addClass('error-input');
            isValid = false;
        }
        
        if(email.val() === ''){
            $('#emailError').text('Email is required');
            email.addClass('error-input');
            isValid = false;
        } else if(!validateEmail(email.val())){
            $('#emailError').text('Invalid Email');
            email.addClass('error-input');
            isValid = false;
        }

        if(phone.val() === ''){
            $('#phoneError').text('Phone is required');
            phone.addClass('error-input');
            isValid = false;
        }if (phone.val().trim().length != 10) {
            $('#phoneError').text('Phone number must be 10 digits');
            phone.addClass('error-input');
            isValid = false;
        }else if(!validatePhone(phone.val())){ 
            $('#phoneError').text('Invalid Phone number');
            phone.addClass('error-input');
            isValid = false;
        }

        if (isValid) {
            $('form').submit(); 
        }
    }

    function validateName(name){
        var namepattern = /^[A-Z][a-z]+$/;
        return namepattern.test(name);
    }

    function validateEmail(email){
        var emailpattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return emailpattern.test(email); 
    }

    function validatePhone(phone) {
        var phonepattern = /^[0-9]{10}$/;
        return phonepattern.test(phone);
    }    
});
