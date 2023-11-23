$(document).ready(function(){
    const signUpForm = $('.sign-up-form');

    $('#sign-up-btn').on('click', function(){
        $('.container').addClass('sign-up-mode');
    });

    $('#sign-in-btn').on('click', function(){
        $('.container').removeClass('sign-up-mode');
    });

    signUpForm.on('submit', function(event){
        event.preventDefault();

        const password = $('#password').val();
        const confirmPassword = $('#confirmPassword').val();

        if (password !== confirmPassword) {
            alert('Mật khẩu và mật khẩu lặp lại không khớp. Vui lòng thử lại.');
        } else {
            // Nếu mật khẩu và mật khẩu lặp lại giống nhau, có thể gửi biểu mẫu
            signUpForm.submit();
        }
    });
});