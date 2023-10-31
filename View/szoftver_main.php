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
            <table>
                <tr>
                    <th>Név</th>
                    <th>Kategória</th>
                </tr>
            <?php foreach($viewData["gepek"] as $gep)
            {
                    echo "<tr>";
                    echo "<td>". $gep->nev."</td>";
                    echo "<td>". $gep->kategoria."</td>";
                    echo "</tr>";
            } 
             ?>

             </table>
        </section>
        <footer>lábléc</footer>
    </body>
</html>