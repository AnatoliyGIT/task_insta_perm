<!doctype html>
<html lang="ru">

<?php
$pageName = 'Профиль';
require_once 'head-tags.php';
?>

<body>

<?php
$nameMenuOne = 'Все контакты';
$hrefMenuOne = 'all_contacts.php';
$nameMenuTwo = 'Профиль';
$hrefMenuTwo = 'profile.php';
$nameButton = 'Выйти из профиля';
$href_btn = 'logout.php';
$titlePage = 'Мои контакты';
require_once 'header.php';
?>

<div class="main text-center container">
    <div class="contacts">
        <?php
        require_once 'functions.php';
        $link = mysqli_connect("localhost", "root", "", "insta");
        if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
            $query_contact = mysqli_query($link, "SELECT contacts FROM users WHERE id = '" . intval($_COOKIE['id']) . "' LIMIT 1");
            $contacts_ids = mysqli_fetch_assoc($query_contact);
        }
        $query = '';
        foreach ($contacts_ids as $contacts_id) {
            $query = mysqli_query($link, "SELECT * FROM contacts WHERE id='$contacts_id'");
        }
        $contacts = mysqli_fetch_all($query);
        debug_to_text_file($contacts, '');
        foreach ($contacts as $key => $contact) {
            ?>
            <h4 class="contact">
                <?= $key + 1 . '. ' . $contact[1] . ' ' . $contact[2] . ' - ' . $contact[3] ?>
            </h4>
            <?php
        }
        ?>
    </div>
</div>

<?php
require_once('footer.php')
?>
</body>
</html>