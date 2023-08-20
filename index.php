<?php
session_name('PP' . date('Ymd'));
session_start();

require_once 'config.php';
require_once 'lib/pdo.php';
require_once 'lib/user.php';
require_once 'lib/acces.php';
require_once 'lib/output.php';

$connect = connect();

date_default_timezone_set('Europe/Paris');

?>
    <div class="alert-container">
        <?php

        if (!empty($_SESSION['alert'])) {
            if (!empty($_SESSION['alert-color']) && in_array($_SESSION['alert-color'], ['danger', 'info', 'success', 'warning'])) {
                $alertColor = $_SESSION['alert-color'];
                unset($_SESSION['alert-color']);
            } else {
                $alertColor = 'danger';
            }
            echo '<div class="alert alert-' . $alertColor . '">';
            echo '<span class="close-button">&times;</span>';
            echo $_SESSION['alert'];
            echo '</div>';
            unset($_SESSION['alert']);
        }
        ?>
    </div>
<?php

include 'page/header.html';
include 'page/menu.php';

if (!empty($_GET['page'])) {
    getContent($_GET['page']);
}

include 'page/footer.html';