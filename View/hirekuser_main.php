<!DOCTYPE html>
<html>
<?php include_once './View/common/head.php';    ?>

<body>
    <section>
        <div class="container">
            <?php include_once './View/common/menu.php'; ?>

            <h1 class="header">Hírek</h1>
            <a href="index.php?page=hirekhozzaadc">új hír hozzáadása</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Hír</th>
                        <th>Dátum</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($viewData["gepek"] as $g) { ?>
                        <tr>
                            <td>
                                <?= $g->hir ?>
                            </td>
                            <td>
                                <?= $g->datum ?>
                            </td>
                            <td>
                                <a href="index.php?page=hirekmodositasc&id=<?= $g->id ?>">módosítás</a>
                            </td>
                            <td>
                                <a href="index.php?page=hirektorlesc&id=<?= $g->id ?>">törlés</a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

    </section>
    <?php include_once './View/common/footer.php';   ?>
</body>

</html>