<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Szoftverlista</title>

    <?php include_once './View/common/head.php';    ?>
</head>

<body>
    <section>
        <div class="container">
            <h2>Gépek</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Hely</th>
                        <th>IPCím</th>
                        <th>Típus</th>
                        <th>Aktív</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($viewData["gepek"] as $g) { ?>
                        <tr>
                            <td>
                                <?= $g->hely ?>
                            </td>
                            <td>
                                <?= $g->ipcim ?>
                            </td>
                            <td>
                                <?= $g->tipus ?>
                            </td>
                            <td>
                                <?php if ($g->deactivate === 0) : ?>
                                    <input type="checkbox" checked disabled>
                                <?php else : ?>
                                    <input type="checkbox" disabled>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="index.php?page=telepitesc&gep_id=<?= $g->id ?>">telepített szoftverek</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
    </section>
    <?php include_once './View/common/footer.php';   ?>
</body>

</html>