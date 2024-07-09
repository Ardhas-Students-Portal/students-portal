$(document).ready(function(){
    $('#name-valid').css("font-size","13px");
    $('#email-valid').css("font-size","13px");
    $('#password-valid').css("font-size","13px");
    $('#confirm-password-valid').css("font-size","13px");
    $('#gender-valid').css("font-size","13px");
    $('#qualification-error').css("font-size","13px");
    $('#dob-valid').css("font-size","13px");
    $('#phone-valid').css("font-size","13px");
    $('#address-valid').css("font-size","13px");
    $('#subject-error').css("font-size","13px");
    
    // validate name 
    function validateName() {
        var name = $('#name').val().trim();
        var nameRegex = /^[a-zA-Z ]{2,30}$/; 
       if (!nameRegex.test(name)) {
            $('#name-valid').text('Name must contain at least 2 letters and only letters,space');
            $('#name-valid').css("color","red");
            return false;
        } else {
            $('#name-valid').text('valid name');
            $('#name-valid').css("color","green");
            return true;
        }
    }
    // Validate on input change
    $('#name').on('input', function () {
        validateName();
    });
    $('#name').on('blur', function () {
        if(validateName()){
            $('#name-valid').text('');
        }
    });
    
    // validate email 
    $('#email-error').css("font-size","13px");
    function validateEmail() {
        var email = $('#email').val().trim();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            $('#email-valid').text('Please enter valid email address');
            $('#email-valid').css("color","red");
            return false;
        } else {
            $('#email-valid').text('valid Email');
            $('#email-valid').css("color","green");
            return true;
        }
    }
    // Validate on input change
    $('#email').on('input', function () {
        validateEmail();
    });
    $('#email').on('blur', function () {
        if(validateEmail()){
            $('#email-valid').text('');
        }
    });

    // validate password 
    $('#password-error').css("font-size","13px");
    function validatePassword() {
        var password = $('#password').val().trim();
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if (!passwordRegex.test(password)) {
            $('#password-valid').text('Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character');
            $('#password-valid').css("color","red");
            return false;
        } else {
            $('#password-valid').text('valid Password');
            $('#password-valid').css("color","green");
            return true;
        }
    }
    // Validate on input change
    $('#password').on('input', function () {
        validatePassword();
    });
    $('#password').on('blur', function () {
        if(validatePassword()){
            $('#password-valid').text('');
        } 
    });

    //phone number validation
    $('#phone-error').css("font-size","13px");
    function validatePhone() {
        var phone = $('#phone').val().trim();
        var phoneNumberRegex = /^(\+\d{1,3})?[6-9]\d{9}$/;
        if (!phoneNumberRegex.test(phone)) {
            $('#phone-valid').text('Please enter valid phone number');
            $('#phone-valid').css("color","red");
            return false;
        } else {
            $('#phone-valid').text('valid Phone number');
            $('#phone-valid').css("color","green");
            return true;
        }
    }
    // Validate on input change
    $('#phone').on('input', function () {
        validatePhone();
    });
    $('#phone').on('blur', function () {
        if(validatePhone()){
            $('#phone-valid').text('');
        }
        
    });
    
    //validate city
    $('#address-error').css("font-size","13px");
    function validateCity() {
        var city = $('#city').val().trim();
        
        var cityRegex = /^[a-zA-Z ]{2,}$/;
        if (!cityRegex.test(city)) {
            $('#address-valid').text('Invalid City Name');
            $('#address-valid').css("color","red");
            return false;
        } else {
            $('#address-valid').text('valid City');
            $('#address-valid').css("color","green");
            return true;
        }
    }
    // Validate on input change
    $('#city').on('input', function () {
        validateCity();
    });
    $('#city').on('blur', function () {
        if(validateCity()){
            $('#address-valid').text('');
        }
        
    });

    //validate confirm password
    
    function validateConfirmPassword() {
        var password = $('#password').val().trim();
        var confirmPassword = $('#cnfpwd').val().trim();
        // Reset error message

        // Validate confirm password presence
        if(password !== confirmPassword) {
            $('#confirm-password-valid').text('Passwords do not match');
            $('#confirm-password-valid').css("color","red");
            return false;
        }else{
            $('#confirm-password-valid').text('Password Matched');
            $('#confirm-password-valid').css("color","green");
            return true;
        }   
    }
    $('#cnfpwd').on('input', function () {
        validateConfirmPassword();
    });
    $('#cnfpwd').on('blur', function () {
        if(validateConfirmPassword()){
            $('#confirm-password-valid').text('');
        }
    });

    /* dob */
    function validateDate() {
        var inputDate = $('#dob').val();

        // Check if a date is selected
        if(inputDate){
            var currentDate = new Date();
            var selectedDate = new Date(inputDate);
    
            // Check if the selected date is in the future
            if (selectedDate > currentDate) {
                $('#dob-valid').text('Please select a date not in the future');
                $('#dob-valid').css('color','red');
                return false;
            }else{
                $('#dob-valid').text('');
                return true;
            }
        } 
    }
    // Validate on input change
    $('#dob').on('change', function () {
        validateDate();
    });
  

    
    $('form').on('submit',function(){
        // event.preventDefault();
        var validation = true;
        // name validation
        var name = $('#name').val().trim();
        if(name == ''){
            $('#name-valid').text('Please enter full name');
            $('#name-valid').css("color","red");
        }
        else if(!validateName()){
            validation = false;
            $('#name-valid').text('Name must contain at least 2 letters and only letters,space'); 

        }else{
            $('#name-valid').text(''); 
            // validation = true;
        }

        //email validation
        var email = $('#email').val().trim();
        if(email == ''){
            $('#email-valid').text('Please enter email address');
            $('#email-valid').css("color","red");
        }
        else if(!validateEmail()){
            validation = false;
            $('#email-valid').text('Please enter valid email address'); 
        }else{
            $('#email-valid').text(''); 
        }

        //password validation
        var password = $('#password').val().trim();
        if(password == ''){
            $('#password-valid').text('Please create password');
            $('#password-valid').css("color","red");
        }
        else if(!validatePassword()){
            validation = false;
            $('#password-valid').text('please create valid password'); 
            $('#password-valid').css("color","red");
        }else{
            $('#password-valid').text(' '); 
        }

        //confirm password validate
        var cnfpwd = $('#cnfpwd').val().trim();
        if(cnfpwd == ''){
            $('#confirm-password-valid').text('Please Re-enter password');
            $('#confirm-password-valid').css("color","red");
        }
        else if(!validateConfirmPassword()){
            validation = false;
            $('#confirm-password-valid').text('Please enter correct password'); 
        }else{
            $('#confirm-password-valid').text('');
        }

        // validate dob
        var dob = $('#dob').val().trim();
        if(dob == ''){
            $('#dob-valid').text('Please enter date of birth');
            $('#dob-valid').css("color","red");
        }
        else if(!validateDate()){
            validation = false;
            $('#dob-valid').text('Please enter valid date of birth'); 
        }else{
            $('#dob-valid').text('');
        }

        //phone number validate
        var phone = $('#phone').val().trim();
        if(phone == ''){
            $('#phone-valid').text('Please enter phone number');
            $('#phone-valid').css("color","red");
        }
        else if(!validatePhone()){
            validation = false;
            $('#phone-valid').text('Please enter valid phone number'); 
        }else{
            $('#phone-valid').text(''); 
        }

        //validate city
        var city = $('#city').val().trim();
        if(city == ''){
            $('#address-valid').text('Please enter city');
            $('#address-valid').css("color","red");
        }
        else if(!validateCity()){
            validation = false;
            $('#address-valid').text('Please enter valid city'); 
        }else{
            $('#address-valid').text(''); 
        }

        //gender validate
        var maleChecked = $('#Male').prop('checked');
        var femaleChecked = $('#Female').prop('checked');
        if (!maleChecked && !femaleChecked) {
            validation = false;
            $('#gender-error').css("font-size","13px");
            $('#gender-error').text('Please select gender');
            $('#gender-error').css('color',"red");
        }else{
            $('#gender-error').text('');
        }

        //qualification validate
        var qualification = $('#qualification').val().trim();
        if(qualification === ''){
            validation = false;
            $('#qualification-error').text('Please enter qualification');
            $('#qualification-error').css('color',"red");
        }else{
            $('#qualification-error').text('');
        }

        //subject validate
        var subject = $('#subject').val().trim();
        if(subject === ''){
            validation = false;
            $('#subject-error').text('Please select subject');
            $('#subject-error').css('color',"red");
        }else{
            $('#subject-error').text('');
        }
        if(validation == true){
            alert("Teacher Registration Completed");
        }
    });
});

