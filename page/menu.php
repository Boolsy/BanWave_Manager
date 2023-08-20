<nav class="navbar navbar-expand-md bg-white" id="nav">
    <div class=" navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto py-4 py-md-0">
            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                <a href="https://github.com/Boolsy" target="_blank">
                    <img src="img/icon/github.png" alt="GitHub" width="30" height="30">
                </a>
            </li>
            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                <a class="nav-link" href="index.php?page=page/account">Account list </a>
            </li>
            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                <a class="nav-link" href="index.php?page=page/profil">Profil</a>
            </li>
            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'Oui') : ?>
                    <a class="nav-link" href="index.php?page=page/admin">Admin</a>
                <?php endif; ?>
            </li>
            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                <?php
                if (!empty($_SESSION['id'])) {
                    ?>
                    <a href="index.php?page=page/logout" class="nav-link">Logout</a>
                    <?php
                } else {
                    ?>
                    <a href="index.php?page=page/login" class="nav-link">Login</a>
                    <?php
                }
                ?>
            </li>
        </ul>
    </div>
</nav>
