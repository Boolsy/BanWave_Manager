<?php

if (function_exists('checkUrl') && function_exists('logout')) {
    checkUrl();
    $_SESSION['alert'] = 'Goodbye !';
    logout();
} else {
    header('Location: index.php?');
    die;
}

