<!doctype html>
<html lang="ru">

<?php
$pageName = 'Профиль';
require_once 'head-tags.php';
?>

<body>

<?php
$nameMenuOne = 'Мои контакты';
$hrefMenuOne = 'my_contacts.php';
$nameMenuTwo = 'Профиль';
$hrefMenuTwo = 'profile.php';
$nameButton = 'Выйти из профиля';
$href_btn = 'logout.php';
if (isset($_GET)) {
    $titlePage = 'Все контакты ('.$_GET['name'].')';
} else {
    exit();
}

require_once 'header.php';
?>

<div class="main text-center container">
    <div class="contacts">
        <?php
//        require_once 'functions.php';
        $link = mysqli_connect("localhost", "root", "", "insta");
        if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
            $query = mysqli_query($link, "SELECT * FROM contacts");
            $contacts = mysqli_fetch_all($query);
            foreach ($contacts as $key => $contact) {
                ?>
                <h4 class="contact">
                    <?= $key + 1 . '. ' . $contact[1] . ' ' . $contact[2] . ' - ' . $contact[3] ?>
                </h4>
                <?php
            }
        } else {
            exit();
        }
        ?>
    </div>
</div>

<?php
require_once('footer.php')
?>
</body>
</html>