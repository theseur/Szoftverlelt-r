<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Telepiteslista</title>
      <?php include "nameinheader.php"?>
    <?php include_once './View/common/head.php';    ?>
</head>

<body>
    <section>
    <?php include "nameinheader.php"?>
    <a href="index.php?page=mainpageuserc">Vissza a főoldalra</a>
        <div class="container">
            <?php if (!empty($viewData["szoftver"])) { ?>
                <h2>
                    A <i>
                        <?php
                        echo $viewData["szoftver"]->szoftverName;
                        ?>
                    </i>
                    szoftver a következő gépeken érhető el
                </h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Hely</th>
                            <th>Típus</th>
                            <th>IP</th>
                            <th>aktív</th>
                            <th>Verzió</th>
                            <th>Dátum</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($viewData["gepek"] as $g) { ?>
                            <tr>
                                <td>
                                    <?= $g->hely ?>
                                </td>
                                <td>
                                    <?= $g->tipus ?>
                                </td>
                                <td>
                                    <?= $g->ipcim ?>
                                </td>
                                <td>
                                    <?php if ($g->deactivate === 0) : ?>
                                        <input type="checkbox" checked disabled>
                                    <?php else : ?>
                                        <input type="checkbox" disabled>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?= $g->verzio ?>
                                </td>
                                <td>
                                    <?= $g->datum ?>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php  } ?>


            <?php if (!empty($viewData["gep"])) { ?>
                <h2>
                    A <i>
                        <?php
                        echo $viewData["gep"]->hely . ' ' . $viewData["gep"]->ipcim;
                        ?>
                    </i>
                    gépen
                    <i>
                        [<?php echo $viewData["gep"]->tipus; ?>]
                    </i>
                    a következő szoftverek érhetők el
                </h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Szoftver neve</th>
                            <th>Kategória</th>
                            <th>Verzió</th>
                            <th>Telepítés dátuma</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($viewData["szoftverek"] as $sz) { ?>
                            <tr>
                                <td>
                                    <?= $sz->szoftverName ?>
                                </td>
                                <td>
                                    <?= $sz->szoftverKategoria ?>
                                </td>
                                <td>
                                    <?= $sz->verzio ?>
                                </td>
                                <td>
                                    <?= $sz->datum ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php  } ?>
        </div>
    </section>

    <?php include_once './View/common/footer.php';   ?>
</body>

</html>