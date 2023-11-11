<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Hírek módosítása</title>
    </head>
    <body>
        <header>
            <h1 class="header">Hírek módosítása</h1>
            <?php include "nameinheader.php"?>
        </header>
        <a href="index.php?page=mainpageuserc">Vissza a főoldalra</a>
        <section>
        <?php if(isset($viewData["hibauzenet"]))
        {
            echo $viewData["hibauzenet"];
        }
             ?>
        <form method="post" action="index.php?page=hirekfeldolbeillc">
            <input type="hidden" name="hirid" value="<?=$_GET["id"]?>">
        <textarea id="hirek" name="hir" rows="4" cols="50">
    </textarea>
            <input type="submit" value="Elküldés">
            </form>
            

        </section>
        <?php include_once './View/common/footer.php';   ?>>
    </body>
</html>