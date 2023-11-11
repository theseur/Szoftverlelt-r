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
        <?php include "nameinheader.php"?>
        <a href="index.php?page=mainpageuserc">Vissza a főoldalra</a>
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
        <?php include_once './View/common/footer.php';   ?>
    </body>
</html>
