<!DOCTYPE html>
<html>

<?php include_once './View/common/head.php';    ?>
<body>
    <section>
        <div class="container">
            <?php include_once './View/common/menu.php'; ?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>