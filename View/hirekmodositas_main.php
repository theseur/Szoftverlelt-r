<!DOCTYPE html>
<html>
<?php include_once './View/common/head.php';    ?>

<body>

    <section>
        <div class="container">
            <?php include_once './View/common/menu.php'; ?>
            <h1 class="header">Hír módosítása</h1>


            <?php if (isset($viewData["hibauzenet"])) {
                echo $viewData["hibauzenet"];
            }
            ?>
            <form method="post" action="index.php?page=hirekfeldolbeillc">
                <input type="hidden" name="hirid" value="<?= $_GET["id"] ?>">
                <textarea id="hirek" name="hir" rows="4" cols="50"></textarea>
                <input type="submit" value="Elküldés">
            </form>
        </div>
    </section>
    <?php include_once './View/common/footer.php';   ?>>
</body>

</html>