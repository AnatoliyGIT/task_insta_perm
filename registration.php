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

        <?php
        // Connect to database
        $link = mysqli_connect("localhost", "root", "", "insta");
        if (isset($_POST['submit'])) {
            $errors = [];
            $email_pattern = "/^[_A-Za-z0-9-+]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$/u";
            if (!preg_match($email_pattern, $_POST['email'])) {
                $errors[] = 'Неправильно введен email адрес';
            }

            // Check user in database
            $query = mysqli_query($link, "SELECT id FROM users WHERE email='" . mysqli_real_escape_string($link, $_POST['email']) . "'");
            if (mysqli_num_rows($query) > 0) {
                $errors[] = "Пользователь с таким email уже зарегистрирован";
            }

            if (count($errors) == 0) {
                $email = $_POST['email'];
                $password = md5(md5(trim($_POST['password'])));
                $name = $_POST['name'];
                $lastName = $_POST['last_name'];
                $phone = $_POST['phone'];
                mysqli_query($link, "INSERT INTO users SET email='" . $email . "', password='" . $password . "', name='" . $name . "', lastName='" . $lastName . "', phone='" . $phone . "'");
                header('Location: profile.php?name='.$name);
                exit();
            } else {
                foreach ($errors as $key => $error) {
                    print $key + 1 . '. ' . $error . "<br>";
                }
            }
        }
        ?>

        <div class="registration__form">
            <form class="form-signin registration__form" method="POST" action="registration.php">
                <h1 class="h3 mb-3 font-weight-normal registration__form_title">Панель регистрации</h1>
                <div class="registration__form_input col-sm-12">
                    <label for="inputName" class="sr-only registration__form_input-wrapper">Name</label>
                    <input name="name" type="text" id="inputName"
                           class="form-control registration__form_input-value-name"
                           placeholder="Имя" required="">
                </div>
                <div class="registration__form_input col-sm-12">
                    <label for="inputLastName" class="sr-only registration__form_input-wrapper">LastName</label>
                    <input name="last_name" type="text" id="inputLastName"
                           class="form-control registration__form_input-value-lastname"
                           placeholder="Фамилия" required="">
                </div>
                <div class="registration__form_input col-sm-12">
                    <label for="inputPhone" class="sr-only registration__form_input-wrapper">Phone</label>
                    <input name="phone" type="text" id="inputPhone"
                           class="form-control registration__form_input-value-phone"
                           placeholder="Телефон">
                </div>
                <div class="registration__form_input col-sm-12">
                    <label for="inputEmail" class="sr-only registration__form_input-wrapper">Email address</label>
                    <input name="email" type="email" id="inputEmail"
                           class="form-control registration__form_input-value-email"
                           placeholder="Емайл" required="">
                </div>
                <div class="registration__form_input col-sm-12">
                    <label for="inputPassword" class="sr-only registration__form_input-wrapper">Password</label>
                    <input name="password" type="password" id="inputPassword1"
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
                    <button class="btn btn-lg btn-primary btn-block registration__form_button-link" name="submit"
                            type="submit" value="Зарегистрироваться">
                        Зарегистрироваться
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

<?php
require_once('footer.php')
?>
</body>
</html>
