<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Hírek</title>
    </head>
    <body>
        <header>
            <h1 class="header">Hírek</h1>
        </header>
        <section>
            <table>
                
            <?php foreach($viewData["gepek"] as $gep)
            {
                    echo "<tr>";
                    echo "<td>". $gep->hir."</td>";
                    echo "<td>". $gep->datum."</td>";
                    echo "</tr>";
            } 
             ?>

             </table>
        </section>
        <footer>lábléc</footer>
    </body>
</html>