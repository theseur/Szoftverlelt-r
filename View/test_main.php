<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Szoftverlista</title>
    </head>
    <body>
        <header>
            <h1 class="header">Gépek</h1>
        </header>
        <section>
            <?php foreach($viewData["gepek"] as $gep)
            {
                    echo $gep->hely. $gep->	tipus.$gep->ipcim;
                    echo "<br>";
            } 
             ?>
        </section>
        <footer>lábléc</footer>
    </body>
</html>
