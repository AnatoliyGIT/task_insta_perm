<!doctype html>
<html lang="ru">

<?php
$pageName = 'Авторизация';
require_once 'head-tags.php';
?>

<body>

<?php
$href = '/insta/registration.php';
$nameButton = 'Зарегистрироваться';
require_once 'header.php';
?>

<div class="main text-center container">

    <div class="registration">
        <div class="registration__form">
            <form class="form-signin registration__form">
                <h1 class="h3 mb-3 font-weight-normal registration__form_title">Панель авторизации</h1>
                <div class="registration__form_input col-sm-12">
                    <label for="inputEmail" class="sr-only registration__form_input-wrapper">Email address</label>
                    <input type="email" id="inputEmail" class="form-control registration__form_input-value-email"
                           style="border-radius: 0" placeholder="Емайл" required="">
                </div>
                <div class="registration__form_input col-sm-12">
                    <label for="inputPassword" class="sr-only registration__form_input-wrapper">Password</label>
                    <input type="password" id="inputPassword2"
                           class="form-control registration__form_input-value-password-two"
                           placeholder="Пароль" required="">
                </div>
                <div class="registration__form_buttons">
                    <button class="btn btn-lg btn-primary btn-block registration__form_button-link" type="submit">
                        Войти
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
require_once('footer.php');
?>

<?php
//require_once ('repository/database.php');
//require_once ('functions.php');
//$db = new DATABASE();
//$db->query('INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `phone`, `password`)
//                            VALUES ("", "Василий", "Пупкин", "vasya@mail.ru", "6556787654", "87667")');
//$db->query('INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `phone`, `password`)
//                            VALUES ("", "Егор", "Охотин", "egor@mail.ru", "876789087", "123455432")');
//$print = $db->query('SELECT * FROM `users` WHERE `id` = 3')->fetch_assoc();
//debug_to_text_file($print, '');
//$print = $db->query('SELECT * FROM `users` WHERE `id` = 1')->fetch_assoc();
//debug_to_text_file($print, '');
?>

</body>
</html>
