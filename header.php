<div class="header text-center row_menu">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal logo-color">ООО "Инста"</h5>
        <?php
        if ($_GET) {
            ?>
            <h2 class="my-0 mr-md-auto font-weight-regular title-color"><?= $titlePage ?></h2>
            <?php
        }
        ?>
        <nav class="my-2 my-md-0 mr-md-3">
            <?php
            if ($_GET) {
                ?>
                <a class="text-dark btn btn-outline-primary"
                   href="<?= $hrefMenuOne . '?name=' . htmlspecialchars($_GET["name"]); ?>">
                    <?= $nameMenuOne ?></a>
                <a class="text-dark btn btn-outline-primary"
                   href="<?= $hrefMenuTwo . '?name=' . htmlspecialchars($_GET["name"]); ?>">
                    <?= $nameMenuTwo ?></a>
                <?php
            }
            ?>
        </nav>
        <a class="btn btn-outline-primary" href="<?= $href_btn ?>"><?= $nameButton ?></a>
    </div>
</div>