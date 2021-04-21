<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Регистрация</title>
</head>
<body>

<div class="header text-center">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal">ООО "Инста"</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#">Контакты</a>
            <a class="p-2 text-dark" href="#">О нас</a>
        </nav>
        <a class="btn btn-outline-primary" href="/insta/index.php">Войти</a>
    </div>
</div>

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

<div class="footer text-center">
    <p class="mt-5 mb-3 text-muted">© 2017-2021</p>
</div>
</body>
</html>
