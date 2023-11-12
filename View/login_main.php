<!DOCTYPE html>
<html>

<?php include_once './View/common/head.php';    ?>

<body>
    <div class="container">
        <h2 class="header">Bejelentkezés</h2>
        <div>
            <?php if (isset($viewData["hibauzenet"])) {
                echo $viewData["hibauzenet"];
            }
            ?>
            <form method="post" action="index.php?page=loginfeldolgozoc">
                <label for="fname">Bejelentkezesi név:</label><br>
                <input type="text" id="bejelentkezes" name="bejelentkezes"><br>
                <label for="lname">jelszó:</label><br>
                <input type="password" id="jelszo" name="jelszo">
                <input type="submit" value="Elküldés">
            </form>
            <a href="index.php?page=regisztracioc">Regisztráció</a>

        </div>
    </div>
    <?php include_once './View/common/footer.php';   ?>
</body>

</html>