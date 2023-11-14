<!DOCTYPE html>

<html>

<?php include_once './View/common/head.php';    ?>
<style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        margin: 20px;
    }

    h1,
    h2 {
        text-align: center;
    }

    .content {
        max-width: 800px;
        margin: 0 auto;
    }

    .description {
        text-align: justify;
        margin-bottom: 20px;
    }

    .image-container {
        text-align: center;
        margin-bottom: 20px;
    }

    .services {
        margin-bottom: 20px;
    }

    .services ul {
        list-style: none;
        padding-left: 0;
    }

    .services ul li:before {
        content: "\2022";
        color: #0056b3;
        font-weight: bold;
        display: inline-block;
        width: 1em;
        margin-left: -1em;
    }
</style>

<body>
    <section>
        <div class="container">
            <?php include './View/common/menu.php'; ?>


            <div class="content">
                <h1>Szoftverleltár</h1>
                <h2> megoldások az oktatási és irodai szektor számára</h2>
                <br>
                <div class="description">
                    <p>
                        Üdvözöljük a weboldalunkon!
                    </p>
                    <p>Cégünk egyedi szoftvermegoldásokat kínál,
                        köztük szoftverleltárat iskoláknak és különböző irodai intézményeknek, ahol fontos a gépek és a szoftverek követése.
                        <br>
                        Célunk, hogy hatékony, felhasználóbarát és testreszabott
                        szoftverekkel segítsük ügyfeleinket az adminisztrációs terhek csökkentésében és a folyamataik optimalizálásában.
                    </p>
                </div>

                <div class="image-container">
                    <img src="https://www.waoconnect.com/wp-content/uploads/2020/07/Inventory-Management-System-Pic.jpg" alt="Szoftverleltár" width="400">
                </div>

                <div class="services">
                    <h3>Általános szolgáltatásaink:</h3>
                    <ul>
                        <li>Egyedi szoftverfejlesztés az oktatási szektor számára</li>
                        <li>Szoftverleltár készítése és karbantartása</li>
                        <li>Adatbázis tervezés és kezelés</li>
                        <li>Felhasználóbarát, könnyen kezelhető interfészek tervezése</li>
                        <li>Ügyfélszolgálat és támogatás</li>
                    </ul>
                </div>

                <p>
                    Ha további információra van szüksége, kérjük, vegye fel velünk a kapcsolatot.
                </p>
            </div>
        </div>

    </section>
    <?php include_once './View/common/footer.php';   ?>
</body>

</html>