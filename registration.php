<!doctype html>
<html lang="ru">

<?php
$pageName = 'Регистрация';
require_once 'head-tags.php';
?>

<body>

<?php
$href_btn = '/insta/index.php';
$nameButton = 'Авторизоваться';
require_once 'header.php';
?>

<div class="main text-center container">

    <div class="registration">
        <div class="registration__form">
            <form class="form-signin registration__form" action="profile.php">
                <h1 class="h3 mb-3 font-weight-normal registration__form_title">Панель регистрации</h1>
                <div class="registration__form_input col-sm-12">
                    <label for="inputName" class="sr-only registration__form_input-wrapper">Name</label>
                    <input type="text" id="inputName" class="form-control registration__form_input-value-name"
                           placeholder="Имя" required="">
                </div>
                <div class="registration__form_input col-sm-12">
                    <label for="inputLastName" class="sr-only registration__form_input-wrapper">LastName</label>
                    <input type="text" id="inputLastName" class="form-control registration__form_input-value-lastname"
                           placeholder="Фамилия" required="">
                </div>
                <div class="registration__form_input col-sm-12">
                    <label for="inputEmail" class="sr-only registration__form_input-wrapper">Email address</label>
                    <input type="email" id="inputEmail" class="form-control registration__form_input-value-email"
                           placeholder="Емайл" required="">
                </div>
                <div class="registration__form_input col-sm-12">
                    <label for="inputPassword" class="sr-only registration__form_input-wrapper">Password</label>
                    <input type="password" id="inputPassword1"
                           class="form-control registration__form_input-value-password-one" placeholder="Пароль"
                           required="">
                </div>
                <div class="registration__form_input col-sm-12">
                    <label for="inputPassword" class="sr-only registration__form_input-wrapper">Password</label>
                    <input type="password" id="inputPassword2"
                           class="form-control registration__form_input-value-password-two"
                           placeholder="Подтверждение пароля" required="">
                </div>
                <div class="registration__form_buttons">
                    <button class="btn btn-lg btn-primary btn-block registration__form_button-link" type="submit">
                        Зарегистрироваться
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="message">
        <h5 class="message__text"></h5>
    </div>
</div>

<?php
require_once('footer.php')
?>
</body>
</html>
