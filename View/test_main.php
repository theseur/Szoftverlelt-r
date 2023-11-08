<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Szoftverlista</title>
    </head>
    <body>
        <header>
            <h1 class="header">Gépek</h1>
            <?php include "nameinheader.php"?>
        </header>
        <section>
            <table>
            <tr>
                    <th>Hely</th>
                    <th>IPCím</th>
                </tr>
            <?php foreach($viewData["gepek"] as $gep)
            {
                    
                    echo "<tr>";
                    echo "<td>". $gep->hely."</td>";
                    echo "<td>". $gep->ipcim."</td>";
                    echo "</tr>";
            } 
             ?>
             </table>
        </section>
        <footer>lábléc</footer>
    </body>
</html>
