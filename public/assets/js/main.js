/* Base js*/
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

/* Header__mobile-selection */
const barBtn = $('.js-barBtn');
const headerSlWrap = $('.header__mobile-selection-wrap');
const mobileOverlay = $('.header__mobile-selection-overlay');
const closeBtn = $('.js-closeBtn');
const mobileSelecItems = $$('.header__mobile-selection-item');


barBtn.onclick = function() {
    headerSlWrap.classList.add('open');
    mobileOverlay.classList.add('open');
}

function removeOpen() {
    mobileOverlay.classList.remove('open');
    headerSlWrap.classList.remove('open');
}
mobileOverlay.onclick = removeOpen;

closeBtn.onclick = removeOpen;

for (var i = 0; i < mobileSelecItems.length; i++) {
    var mobileSelecItem = mobileSelecItems[i];
    mobileSelecItem.onclick = function(event) {
        removeOpen();
    }
}


/* Form resgister / Login */
const modal = $('.modal');
const regisBtn = $('.js-register-btn');
const loginBtn = $('.js-login-btn');
const authFormRegis = $('.auth-form-register');
const authoFormLogin = $('.auth-form-login');
const modalOverlay = $('.modal__overlay');
const backAuthoForms = $$('.auth-form__controls-back');
const closeAuthForms = $$('.auth-form__close-btn');


function regisClick() {
    regisBtn.onclick = function() {

        authFormRegis.classList.add('open');
        modalOverlay.classList.add('open');
        authoFormLogin.classList.remove('open');
        modal.classList.add('fixed');

    }
}


function loginClick() {
    loginBtn.onclick = function() {

        authoFormLogin.classList.add('open');
        modalOverlay.classList.add('open');
        authFormRegis.classList.remove('open');
        modal.classList.add('fixed');
    }
}

function removeOpenFromModal() {
    authFormRegis.classList.remove('open');
    modalOverlay.classList.remove('open');
    authoFormLogin.classList.remove('open');
    modal.classList.remove('fixed');

}


regisClick();
loginClick();
modalOverlay.onclick = removeOpenFromModal;


for (let i = 0; i < backAuthoForms.length; i++) {
    let backAuthoForm = backAuthoForms[i];
    backAuthoForm.onclick = function() {
        removeOpenFromModal();
    }
}
for (let i = 0; i < closeAuthForms.length; i++) {
    let closeAuthForm = closeAuthForms[i];
    closeAuthForm.onclick = function() {
        removeOpenFromModal();
    }
}


// Hangle "Enter" in regis/login
const submitLoginForm = document.getElementById('login-form');
console.log(submitLoginForm)
document.getElementById('login-form').addEventListener('keydown', function(event) {
    if (event.keyCode === 13) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của phím "Enter" (ví dụ: ngăn chặn việc thêm dòng mới trong textarea)
        document.getElementById("login-form").submit(); // Submit form
    }
});








// Caterogy
// caterory-item--active
var cateroryItems = $$('.caterory-item');

for (let i = 0; i < cateroryItems.length; i++) {

    cateroryItems[i].addEventListener('click', function() {
        this.classList.add('caterory-item--active');
    })
}






/* Cart add*/

// Xử lý sự kiện nút giảm

//

var products = document.querySelectorAll('.cart__table-thead-tr');













function showNotify() {
    alert('Đã thêm vào giỏ hàng');
}



/* Regis form */
$(".auth-form-register").addEventListener("submit", function(event) {
    event.preventDefault();


    var password = $(".password").value;
    var confirmPassword = $(".confirm-password").value;
    var email = $("email").value;

    // Kiểm tra các trường dữ liệu và thực hiện xử lý đăng ký
    if (password && confirmPassword && email) {
        if (password !== confirmPassword) {
            alert("Mật khẩu và xác nhận mật khẩu không khớp");
        } else {
            // Gửi dữ liệu đăng ký đến server hoặc xử lý theo ý của bạn
            alert("Đăng ký thành công!");
            // Reset form
            $(".auth-form-register").reset();
        }
    } else {
        alert("Vui lòng điền đầy đủ thông tin");
    }
});