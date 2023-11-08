<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Telepiteslista</title>
    </head>
    <body>
        <header>
            <h1 class="header">Telepítés</h1>
            <?php include "nameinheader.php"?>
        </header>
        <section>
        <table>
                <tr>
                    <th>GépID</th>
                    <th>SzoftverID</th>
                    <th>Verzió</th>
                    <th>Dátum</th>
                </tr>
            <?php foreach($viewData["gepek"] as $gep)
            {
                    
                    echo "<tr>";
                    echo "<td>". $gep->gepid."</td>";
                    echo "<td>". $gep->szoftverid."</td>";
                    echo "<td>". $gep->verzio."</td>";
                    echo "<td>". $gep->datum."</td>";
                    echo "</tr>";
            } 
             ?>
             </table>
        </section>
        <footer>lábléc</footer>
    </body>
</html>