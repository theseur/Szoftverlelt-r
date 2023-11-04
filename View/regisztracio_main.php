<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Regisztráció</title>
    </head>
    <body>
        <header>
            <h1 class="header">Regisztráció</h1>
        </header>
        <section>
        <?php if(isset($viewData["hibauzenet"]))
        {
            echo $viewData["hibauzenet"];
        }
             ?>
        <form method="post" action="index.php?page=regisztraciofeldolgozoc">
        <label for="fname">Családi név:</label><br>
            <input type="text" id="csaladi_nev" name="csaladi_nev"><br>
            <label for="lname">Utónév:</label><br>
            <input type="text" id="utonev" name="utonev"><br>
            <label for="fname">Bejelentkezesi név:</label><br>
            <input type="text" id="bejelentkezes" name="bejelentkezes"><br>
            <label for="lname">jelszó:</label><br>
            <input type="text" id="jelszo" name="jelszo"><br>
            <label for="lname">jelszó még egyszer:</label><br>
            <input type="text" id="jelszo1" name="jelszo1"><br>
            <input type="submit" value="Elküldés">

            </form>

        </section>
        <footer>lábléc</footer>
    </body>
</html>