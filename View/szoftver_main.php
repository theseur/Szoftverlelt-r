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
            <h2>Szoftverek</h2>
            <?php include "nameinheader.php"?>
            <a href="index.php?page=mainpageuserc">Vissza a főoldalra</a>
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