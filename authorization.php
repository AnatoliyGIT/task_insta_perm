<!doctype html>
<html lang="ru">

<?php
$pageName = 'Авторизация';
require_once 'head-tags.php';
?>

<body>

<?php
$href_btn = '/insta/registration.php';
$nameButton = 'Зарегистрироваться';
require_once 'header.php';
?>

<div class="main text-center container">

    <div class="authorization">

        <?php
        function generateCode($length = 6)
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
            $code = "";
            $clen = strlen($chars) - 1;
            while (strlen($code) < $length) {
                $code .= $chars[mt_rand(0, $clen)];
            }
            return $code;
        }

        // Connect to database
        $link = mysqli_connect("localhost", "root", "", "insta");

        if (isset($_POST['submit'])) {
            $query = mysqli_query($link, "SELECT id, password FROM users WHERE email='" .
                mysqli_real_escape_string($link, $_POST['email']) . "' LIMIT 1");
            $data = mysqli_fetch_assoc($query);
            if ($data) {
                if ($data['password'] === md5(md5($_POST['password']))) {
                    $hash = md5(generateCode(10));
                    mysqli_query($link, "UPDATE users SET hash='" . $hash . "' WHERE id='" . $data['id'] . "'");

                    // cookies
                    setcookie("id", $data['id'], time() + 60 * 60 * 24 * 30, "/");
                    setcookie("hash", $hash, time() + 60 * 60 * 24 * 30, "/", null, null, true);
                    header('Location: check.php');
                    exit();
                } else {
                    print '<h6 class="error_text">Вы ввели неправильный email/пароль</h6>';
                }
            } else {
                print '<h6 class="error_text">Вы ввели неправильный email/пароль</h6>';
            }
        }
        ?>

        <div class="authorization__form">
            <form class="form-signin authorization__form" method="POST" action="authorization.php">
                <h1 class="h3 mb-3 font-weight-normal registration__form_title">Панель авторизации</h1>
                <div class="authorization__form_input col-sm-12">
                    <label for="inputEmail" class="sr-only registration__form_input-wrapper">Email address</label>
                    <input name="email" type="email" id="inputEmail" class="form-control registration__form_input-value-email"
                           placeholder="Емайл" required="">
                </div>
                <div class="authorization__form_input col-sm-12">
                    <label for="inputPassword" class="sr-only authorization__form_input-wrapper">Password</label>
                    <input name="password" type="password" id="inputPassword"
                           class="form-control authorization__form_input-value-password"
                           placeholder="Пароль" required="">
                </div>
                <div class="authorization__form_buttons">
                    <button name="submit" class="btn btn-lg btn-primary btn-block authorization__form_button-link" type="submit">
                        Войти
                    </button>
                </div>
            </form>
        </div>
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
