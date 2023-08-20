<?php


if (empty($_SESSION['id'])) {
    $_SESSION['alert'] = 'You must log in to access your personal space';
    $_SESSION['alert-color'] = 'warning';
    $url = 'index.php?page=page/login';
    header('Location: ' . $url);
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pdo = connect();

    $account_id = $_POST['account_id'];
    $steamUsername = $_POST['steam_username'];
    $steamEmail = $_POST['steam_email'];
    $steamPassword = $_POST['steam_password'];
    $accountRank = $_POST['account_rank'];
    $banStatus = $_POST['ban_status'];
    $banDuration = $_POST['ban_duration'];
    $friendCode = $_POST['friend_code'];


    if ($banDuration == '') {
        $stmt = $pdo->prepare("UPDATE steam_accounts SET steam_username = ?, steam_email = ?, steam_password = ?, account_rank = ?, ban_status = ?, friend_code = ? WHERE account_id = ?");
        $stmt->execute([$steamUsername, $steamEmail, $steamPassword, $accountRank, $banStatus, $friendCode, $account_id]);
    } else {
        $stmt = $pdo->prepare("UPDATE steam_accounts SET steam_username = ?, steam_email = ?, steam_password = ?, account_rank = ?, ban_status =?, ban_duration = ?, friend_code = ? WHERE account_id = ?");
        $stmt->execute([$steamUsername, $steamEmail, $steamPassword, $accountRank, $banStatus, $banDuration,
            $friendCode, $account_id]);
    }


    $_SESSION['alert'] = 'Steam account successfully updated';
    $_SESSION['alert-color'] = 'success';
    header('Location: index.php?page=page/account');
    exit;
} else {

    header('Location: index.php?page=page/account');
    exit;
}
?>
