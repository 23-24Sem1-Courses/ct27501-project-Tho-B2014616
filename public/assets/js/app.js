const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener('click', () =>{
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener('click', () =>{
    container.classList.remove("sign-up-mode");
});
document.addEventListener('DOMContentLoaded', function () {
    const signUpForm = document.querySelector('.sign-up-form');
    signUpForm.addEventListener('submit', function (event) {
        // Ngăn chặn việc gửi biểu mẫu mặc định
        event.preventDefault();

        // Kiểm tra xem mật khẩu và mật khẩu lặp lại có giống nhau hay không
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        if (password !== confirmPassword) {
            alert('Mật khẩu và mật khẩu lặp lại không khớp. Vui lòng thử lại.');
        } else {
            // Nếu mật khẩu và mật khẩu lặp lại giống nhau, có thể gửi biểu mẫu
            signUpForm.submit();
        }
    });
});