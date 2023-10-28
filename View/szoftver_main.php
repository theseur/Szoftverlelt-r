<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Szoftverlista</title>
    </head>
    <body>
        <header>
            <h1 class="header">Szoftver</h1>
        </header>
        <section>
            <?php foreach($viewData["gepek"] as $gep)
            {
                    echo $gep->nev. $gep->kategoria;
                    echo "<br>";
            } 
             ?>
        </section>
        <footer>lábléc</footer>
    </body>
</html>