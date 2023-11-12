<!DOCTYPE html>
<html>

<?php include_once './View/common/head.php';    ?>

<body>
    <section>
        <div class="container">
            <?php include_once './View/common/menu.php'; ?>

            <h1 class="header">Hír hozzáadása</h1>

            <?php if (isset($viewData["hibauzenet"])) {
                echo $viewData["hibauzenet"];
            }
            ?>
            <form method="post" action="index.php?page=hirekfeldolgozoc">
                <input type="hidden" name="userid" value="<?= $viewData['userid'] ?>">
                <textarea id="hirek" name="hir" rows="4" cols="50"></textarea>
                <input type="submit" value="Elküldés">
            </form>

        </div>
    </section>
    <?php include_once './View/common/footer.php';   ?>
</body>

</html>