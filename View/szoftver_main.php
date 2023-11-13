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
                        <th>Név</th>
                        <th>Kategória</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($viewData["softwares"] as $sw) { ?>
                        <tr>
                            <td>
                                <?= $sw->nev ?>
                            </td>
                            <td>
                                <?= $sw->kategoria ?>
                            </td>
                            <td>
                                <a href="index.php?page=telepitesc&sw_id=<?= $sw->id ?>">telepített gépek</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>

    <?php
    include_once './View/common/footer.php';
    ?>
</body>

</html>