<?php function isLoggedIn(): bool
{
    return isset($_SESSION['user']);
}


function getMenuItems(): array
{
    $isLoggedIn = isLoggedIn();
    return array_filter(PUBLIC_MENU, function ($item) use ($isLoggedIn) {
        return $item['loginRequired'] === $isLoggedIn;
    });

}

function getUserName()
{
    if (isLoggedIn()) {
        $user = $_SESSION["user"];
        echo "<i>" . $user . "</i>";
    } else {
        echo "<i>Unknown user</i>";
    }
}

?>


<nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <?php foreach (getMenuItems() as $menuItem) {
                    if ($menuItem['align'] !== LEFT) continue;
                ?>
                    <?php if (isLoggedIn()) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $menuItem['route'] ?>"><?= $menuItem['text'] ?></a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $menuItem['route'] ?>"><?= $menuItem['text'] ?></a>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
            <ul class="nav navbar-nav">
                <?php if (isLoggedIn()) { ?>
                    <li class="nav-item">
                        <span class="nav-link">Belépve, mint <?= getUserName() ?></span>
                    </li>
                <?php } ?>
                <?php foreach (getMenuItems() as $menuItem) {
                    if ($menuItem['align'] !== RIGHT) continue;
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $menuItem['route'] ?>"><?= $menuItem['text'] ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
