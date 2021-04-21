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

<div class="main text-center">
    <form class="form-signin">
        <img class="mb-4" src="https://getbootstrap.com/docs/4.6/assets/brand/bootstrap-solid.svg" alt="" width="72"
             height="72">
        <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Емайл" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
    </form>
</div>

<?php
require_once('footer.php');
require_once ('repository/database.php');
require_once ('functions.php');
$db = new DATABASE();
$print = $db->get_results('SELECT `name`, `last_name`, `email` FROM `users` WHERE `id` = 1')->fetch_assoc();
debug_to_text_file($print, '');
?>

</body>
</html>
