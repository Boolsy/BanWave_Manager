<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = connect();
    $stmt = $pdo->prepare("DELETE FROM steam_accounts WHERE account_id = ?");
    $stmt->execute([$_POST['account_id']]);
    $_SESSION['alert'] = 'Steam account successfully deleted';
    $_SESSION['alert-color'] = 'success';
    header('Location: index.php?page=page/account');
    exit;
} else {
    header('Location: index.php');
    exit;
}