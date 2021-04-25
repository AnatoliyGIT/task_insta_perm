<!doctype html>
<html lang="ru">

<?php
$pageName = 'Профиль';
require_once 'head-tags.php';
?>

<body>

<?php
$href_btn = '/insta/index.php';
$nameMenuOne = 'Мои контакты';
$hrefMenuOne = 'my_contacts.php';
$nameMenuTwo = 'Все контакты';
$hrefMenuTwo = 'all_contacts.php';
$nameButton = 'Выйти из профиля';
$titlePage = 'Профиль';
require_once 'header.php';
?>

<div class="main text-center container">
    <div class="profile">
        <div class="about">
            <?php
            require_once 'functions.php';
            $link = mysqli_connect("localhost", "root", "", "insta");
            if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
                $query = mysqli_query($link, "SELECT id, hash, email, name, lastName, phone FROM users WHERE id = '" . intval($_COOKIE['id']) . "' LIMIT 1");
                $userdata = mysqli_fetch_assoc($query);
            }
            ?>
            <p>
                <h4 class="user"><?=$userdata['name'] . ' ' . $userdata['lastName']?></h4>
            </p>
            <p>
                Телефон: <h4 class="user"><?=$userdata['phone']?></h4>
            </p>
            <p>
                Электронная почта: <h4 class="user"><?=$userdata['email']?></h4>
            </p>
        </div>
    </div>
</div>

<?php
require_once('footer.php')
?>
</body>
</html>
