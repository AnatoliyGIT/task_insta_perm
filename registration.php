<!doctype html>
<html lang="ru">

<?php
$pageName = 'Регистрация';
require_once 'head-tags.php';
?>

<body>

<?php
$href = '/insta/index.php';
$nameButton = 'Авторизоваться';
require_once 'header.php';
?>

<div class="main text-center">
    <form class="form-signin">
        <img class="mb-4" src="https://getbootstrap.com/docs/4.6/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
        <label for="inputName" class="sr-only">Name</label>
        <input type="text" id="inputName" class="form-control" placeholder="Имя" required="">
        <label for="inputLastName" class="sr-only">LastName</label>
        <input type="text" id="inputLastName" class="form-control" placeholder="Фамилия" required="">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" style="border-radius: 0" placeholder="Емайл" required="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
    </form>
</div>

<?php
require_once ('footer.php')
?>
</body>
</html>
