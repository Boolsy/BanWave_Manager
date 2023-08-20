<?php
if (empty($_SESSION['id'])) {
    $_SESSION['alert'] = 'You must log in to access your personal space';
    $_SESSION['alert-color'] = 'warning';
    $url = 'index.php?page=page/login';
    header('Location: ' . $url);
    exit;
}
$user = getUser('id', $_SESSION['id']);


$pdo = connect();
$query = "SELECT * FROM steam_accounts WHERE user_id = :userId";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':userId', $user->id, PDO::PARAM_INT);
$stmt->execute();
$userAccounts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="mt-3">
                                <h4><?php echo ucfirst($user->username) ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Username</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $user->username ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Administrator's rights</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $_SESSION['admin'] ?>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <a href="index.php?page=page/addaccount" class="btn-grad">Add a Steam account</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <h2>Choose a Steam account to modify</h2>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Steam Username</th>
                                        <th>Ban Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($userAccounts as $account): ?>
                                        <tr>
                                            <td><?php echo $account['steam_username']; ?></td>
                                            <td>
                                                <?php if ($account['ban_status'] == 0): ?>
                                                    <img src="img/icon/checked.png" alt="Non banni">
                                                <?php else: ?>
                                                    <img src="img/icon/point-dexclamation.png" alt="Banni">
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="index.php?page=page/editaccount&account_id=<?php echo
                                                $account['account_id']; ?>" class="btn btn-grad">Edit</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
