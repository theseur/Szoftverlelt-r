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
                    echo '<td><a href="">módosítás</a></td>';
                    echo '<td><a href="index.php?page=hirektorlesc&id='.$gep->id.'">törlés</a></td>';
                    echo "</tr>";
            } 
             ?>

             </table>
        </section>
        <?php include_once './View/common/footer.php';   ?>
    </body>
</html>