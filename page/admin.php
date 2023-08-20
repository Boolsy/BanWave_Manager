<?php


if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 'Oui') {
    header('Location: index.php');
    exit;
}


$pdo = connect();

$query = "SELECT * FROM user";
$result = $pdo->query($query);
$users = $result->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
    <h1>User list</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Username</th>
            <th>Steam account created</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        <?php
        if (!empty($users)) {
            foreach ($users as $user) {
                echo '<tr>';
                echo '<td>' . $user['username'] . '</td>';

                $steamCountQuery = "SELECT COUNT(*) AS steam_count FROM steam_accounts WHERE user_id = :user_id";
                $steamCountStatement = $pdo->prepare($steamCountQuery);
                $steamCountStatement->bindValue(':user_id', $user['id']);
                $steamCountStatement->execute();
                $steamCountResult = $steamCountStatement->fetch(PDO::FETCH_ASSOC);


                echo '<td>' . $steamCountResult['steam_count'] . '</td>';

                echo '<td>';
                if ($_SESSION['admin'] != 'Oui' || $_SESSION['id'] != $user['id']) {
                    echo '<a href="index.php?page=app/deleteuser&id=' . $user['id'] . '" onclick="return confirm(\'Are you sure you want to delete this user ?\')">';
                    echo '<img src="img/icon/bin.png" alt="Delete icon">';
                    echo '</a>';
                }
                echo '</td>';


                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="4">No users found</td></tr>';
        }
        ?>
        </tbody>
    </table>
</div>
