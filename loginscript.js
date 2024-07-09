document.addEventListener('DOMContentLoaded', function() {
    var roleSelect = document.getElementById('role-select');
    var adminMessage = document.getElementById('adminmessage');
    var teacherMessage = document.getElementById('teachermessage');
    var studentMessage = document.getElementById('studentmessage');

    function showMessageBasedOnRole(role) {
        adminMessage.style.display = 'none';
        teacherMessage.style.display = 'none';
        studentMessage.style.display = 'none';

        if (role === 'admin') {
            adminMessage.style.display = 'block';
        } else if (role === 'teacher') {
            teacherMessage.style.display = 'block';
        } else if (role === 'student') {
            studentMessage.style.display = 'block';
        }
    }

    showMessageBasedOnRole(roleSelect.value);

    roleSelect.addEventListener('change', function() {
        showMessageBasedOnRole(this.value);
    });

    document.getElementById('togglepassword').addEventListener('click', function(){
        var passwordField = document.getElementById('exampleInputPassword1');
        var icon = this.querySelector('i');
        if(passwordField.type === 'password'){
            passwordField.type = 'text';
            icon.classList.remove('bi-eye-slash-fill');
            icon.classList.add('bi-eye-fill');
        }
        else{
            passwordField.type = 'password';
            icon.classList.remove('bi-eye-fill');
            icon.classList.add('bi-eye-slash-fill');
        }
    })


    $('#loginbutton').click(function(e) {
        e.preventDefault();
        validateForm();
    });

   
    $('#userid').keyup(function() {
        validateUserIdField($(this));
    });

    $('#exampleInputPassword1').keyup(function() {
        validatePasswordField($(this));
    });

    
});


function validateForm() {
    var userId = $('#userid');
    var password = $('#exampleInputPassword1');
    var isValid = true;

    $(".error").text("");
    userId.removeClass('error-input');
    password.removeClass('error-input');

    if (userId.val() === '') {
        $('#userIdError').text("User ID is required!");
        userId.addClass('error-input');
        isValid = false;
    } else if (!validateUserId(userId.val())) {
        $('#userIdError').text("Invalid. User ID should contain only numeric characters!");
        userId.addClass('error-input');
        isValid = false;
    }

    if (password.val() === '') {
        $('#passwordError').text("Password is required!");
        password.addClass('error-input');
        isValid = false;
    } else if (!validatePassword(password.val())) {
        $('#passwordError').text('Password must contain uppercase, lowercase, numeric, and special characters.')
        password.addClass('error-input');
        isValid = false;
    }

    if (isValid) {
        $('#loginForm').submit();
    }
}

function validateUserIdField(userIdField) {
    var userId = userIdField.val();
    var userIdError = $('#userIdError');

    userIdError.text("");

    if (userId === '') {
        userIdError.text("User ID is required!");
        userIdField.addClass('error-input');
    }else if(userId.length < 3){
        userIdError.text("UserId contains minimum four Numbers!")
        userIdField.addClass('error-input');
    } 
    else if (!validateUserId(userId)) {
        userIdError.text("Invalid. User ID should contain only numeric characters!");
        userIdField.addClass('error-input');
    } else {
        userIdField.removeClass('error-input');
    }
}

function validatePasswordField(passwordField) {
    var password = passwordField.val();
    var passwordError = $('#passwordError');

    passwordError.text("");

    if (password === '') {
        passwordError.text("Password is required!");
        passwordField.addClass('error-input');
    }
    else if(password.length < 8){
        passwordError.text('Password is too short!');
        passwordField.addClass('error-input');
    }
    else if (!validatePassword(password)) {
        passwordError.text('Password must contain uppercase, lowercase, numeric, and special characters.');
        passwordField.addClass('error-input');
    } else {
        passwordField.removeClass('error-input');
    }
}

function validateUserId(userId) {
    var userIdPattern = /^\d+$/;
    return userIdPattern.test(userId);
}

function validatePassword(password) {
    var passwordPattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/;
    return passwordPattern.test(password);
}
