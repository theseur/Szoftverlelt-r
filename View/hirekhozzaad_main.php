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
        <section>
        <?php if(isset($viewData["hibauzenet"]))
        {
            echo $viewData["hibauzenet"];
        }
             ?>
        <form method="post" action="index.php?page=hirekfeldolgozoc">
        <textarea id="jirek" name="hirek" rows="4" cols="50">
    </textarea>
            <input type="submit" value="Elküldés">
            </form>
            

        </section>
        <footer>lábléc</footer>
    </body>
</html>