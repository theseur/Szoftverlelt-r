<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Hírek hozzáadása</title>
    </head>
    <body>
        <header>
            <h1 class="header">Hírek hozzáadása</h1>
            <?php include "nameinheader.php"?>
        </header>
        <a href="index.php?page=mainpageuserc">Vissza a főoldalra</a>
        <section>
        <?php if(isset($viewData["hibauzenet"]))
        {
            echo $viewData["hibauzenet"];
        }
             ?>
        <form method="post" action="index.php?page=hirekfeldolgozoc">
        <input type="hidden" name="userid" value="<?=$viewData['userid']?>">
        <textarea id="hirek" name="hir" rows="4" cols="50">
    </textarea>
            <input type="submit" value="Elküldés">
            </form>
            

        </section>
        <?php include_once './View/common/footer.php';   ?>
    </body>
</html>