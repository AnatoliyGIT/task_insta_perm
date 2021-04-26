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
if (isset($_GET)) {
    $titlePage = 'Мои контакты ('.$_GET['name'].')';
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
        $ids = array();
        if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
            $ids[] = intval($_COOKIE['id']);
            $query_contact = mysqli_query($link, "SELECT contacts FROM users WHERE id = '" . intval($_COOKIE['id']) . "' LIMIT 1");
            $contacts_ids = mysqli_fetch_assoc($query_contact);
            if ($contacts_ids['contacts'] !== '') {
                $ids = array_merge($ids, explode(',', $contacts_ids['contacts']));
            }
        } else {
            exit();
        }
        $query = '';
        $contacts = array();
        foreach ($ids as $id) {
            $query = mysqli_query($link, "SELECT * FROM contacts WHERE id='$id'");
            $contacts[] = mysqli_fetch_assoc($query);
        }
        foreach ($contacts as $key => $contact) {
            ?>
            <h4 class="contact">
                <?= $key + 1 . '. ' . $contact['name'] . ' ' . $contact['lastName'] . ' - ' . $contact['phone'] ?>
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