<?php


if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $pdo = connect();

    $deleteUserQuery = "DELETE FROM user WHERE id = :user_id";
    $deleteUserStatement = $pdo->prepare($deleteUserQuery);
    $deleteUserStatement->bindValue(':user_id', $user_id);

    if ($deleteUserStatement->execute()) {

        header('Location: index.php?page=page/admin');
        $_SESSION['alert'] = 'User deleted successfully.';
        $_SESSION['alert-color'] = 'success';
        exit;
    } else {
        $_SESSION['alert'] = "Error while deleting user.";
        $_SESSION['alert-color'] = 'danger';
    }
} else {
    $_SESSION['alert'] = "Id not found.";
    $_SESSION['alert-color'] = 'danger';
}

