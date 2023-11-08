<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
    </head>
    <body>
        <header>
            <h1 class="header">Login</h1>
        </header>
        <section>
        <?php if(isset($viewData["hibauzenet"]))
        {
            echo $viewData["hibauzenet"];
        }
             ?>
        <form method="post" action="index.php?page=loginfeldolgozoc">
            <label for="fname">Bejelentkezesi név:</label><br>
            <input type="text" id="bejelentkezes" name="bejelentkezes"><br>
            <label for="lname">jelszó:</label><br>
            <input type="text" id="jelszo" name="jelszo">
            <input type="submit" value="Elküldés">
            </form>
            <a href="index.php?page=regisztracioc">Regisztráció</a>

        </section>
        <?php include_once './View/common/footer.php';   ?>
    </body>
</html>