<div class="header text-center row_menu">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal">ООО "Инста"</h5>
        <?php
        if ($_GET) {
            ?>
            <h5 class="my-0 mr-md-auto font-weight-normal"><?= 'Привет, ' . htmlspecialchars($_GET["name"]) . '!'; ?></h5>
            <?php
        }
        ?>
        <nav class="my-2 my-md-0 mr-md-3">
            <?php
            if ($_GET) {
                ?><a class="p-2 text-dark"
                     href="<?=$hrefMenuOne.'?name=' . htmlspecialchars($_GET["name"]); ?>">
                    <?= $nameMenuOne?></a>
                <a class="p-2 text-dark"
                   href="profile.php?name=<?= htmlspecialchars($_GET["name"]); ?>">
                    Профиль</a>
                <?php
            }
            ?>
        </nav>
        <a class="btn btn-outline-primary" href="<?= $href_btn ?>"><?= $nameButton ?></a>
    </div>
</div>