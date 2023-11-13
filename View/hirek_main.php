<!DOCTYPE html>
<html>
<?php include_once './View/common/head.php';    ?>

<body>
    <section>
        <div class="container">
            <?php include_once './View/common/menu.php'; ?>

            <h1 class="header">Hírek</h1>
            <table>

                <?php foreach ($viewData["gepek"] as $gep) {
                    echo "<tr>";
                    echo "<td>" . $gep->hir . "</td>";
                    echo "<td>" . $gep->datum . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
    </section>
    <?php include_once './View/common/footer.php';   ?>
</body>

</html>