<?php

var_dump($_POST);

if (empty($_SESSION['id'])) {
    $_SESSION['alert'] = 'You must log in to access your personal space';
    $_SESSION['alert-color'] = 'warning';
    $url = 'index.php?page=page/login';
    header('Location: ' . $url);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pdo = connect();


    // Données du formulaire
    $steamUsername = $_POST['steam_username'];
    $steamEmail = $_POST['steam_email'];
    $steamPassword = $_POST['steam_password'];
    $accountRank = $_POST['account_rank'];
    $banStatus = $_POST['ban_status'];
    $banDuration = $_POST['ban_duration'];
    $friendCode = $_POST['friend_code'];


    $stmt = $pdo->prepare("INSERT INTO steam_accounts (user_id, steam_username, steam_email, steam_password, account_rank, ban_status, ban_duration, friend_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $userId = $_SESSION['id'];
    $stmt->execute([$userId, $steamUsername, $steamEmail, $steamPassword, $accountRank, $banStatus, $banDuration, $friendCode]);


    $_SESSION['alert'] = 'Steam account successfully added';
    $_SESSION['alert-color'] = 'success';
    header('Location: index.php?page=page/account'); // À ajuster
    exit;
} else {

    header('Location: index.php'); // À ajuster
    exit;
}
?>

