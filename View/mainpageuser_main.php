<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Szoftverlista</title>
    </head>
    <body>
        <header>
            <h1 class="header">Föoldal</h1>
            <?php include "nameinheader.php"?>
        </header>
        <section>
            <a href="index.php?page=logoutc">Kijelentkezés</a>     
            <a href="index.php?page=test">Gépek</a>
            <a href="index.php?page=szoftverc">Szoftver</a>
            <a href="index.php?page=telepitesc">Telepítés</a>
            <a href="index.php?page=hirekc">Hírek vélemények</a>
            <a href="index.php?page=mnb">MNB Árfolyam</a>
        </section>
        <?php include_once './View/common/footer.php';   ?>
    </body>
</html>