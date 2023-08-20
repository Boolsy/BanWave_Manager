<?php
if (empty($_SESSION['id'])) {
    $_SESSION['alert'] = 'You must log in to access your personal space';
    $_SESSION['alert-color'] = 'warning';
    $url = 'index.php?page=page/login';
    header('Location: ' . $url);
    exit;
}
$user = getUser('id', $_SESSION['id']);

$account_id = $_GET['account_id'];


$pdo = connect();
$query = "SELECT * FROM steam_accounts WHERE account_id = :accountId";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':accountId', $account_id, PDO::PARAM_INT);
$stmt->execute();
$accountToEdit = $stmt->fetch(PDO::FETCH_ASSOC);
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
                                <h2>Edit a Steam account</h2>
                                <form action="index.php?page=app/editaccount" method="post">
                                    <input type="hidden" name="account_id"
                                           value="<?php echo $accountToEdit['account_id']; ?>">
                                    <div class="form-group">
                                        <label for="steam_username">Steam username :</label>
                                        <input type="text" class="form-control" id="steam_username"
                                               name="steam_username"
                                               value="<?php echo $accountToEdit['steam_username']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="steam_email">Steam e-mail address :</label>
                                        <input type="email" class="form-control" id="steam_email" name="steam_email"
                                               value="<?php echo $accountToEdit['steam_email']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="steam_password">Steam password :</label>
                                        <input type="password" class="form-control" id="steam_password"
                                               name="steam_password"
                                               value="<?php echo $accountToEdit['steam_password']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="account_rank">Account rank :</label>
                                        <select class="form-control" id="account_rank" name="account_rank">
                                            <option value="1"<?php if ($accountToEdit['account_rank'] == 1) echo ' selected'; ?>>
                                                No rank
                                            </option>
                                            <option value="2"<?php if ($accountToEdit['account_rank'] == 2) echo ' selected'; ?>>
                                                Silver 1
                                            </option>
                                            <option value="3"<?php if ($accountToEdit['account_rank'] == 3) echo ' selected'; ?>>
                                                Silver 2
                                            </option>
                                            <option value="4"<?php if ($accountToEdit['account_rank'] == 4) echo ' selected'; ?>>
                                                Silver 3
                                            </option>
                                            <option value="5"<?php if ($accountToEdit['account_rank'] == 5) echo ' selected'; ?>>
                                                Silver 4
                                            </option>
                                            <option value="6"<?php if ($accountToEdit['account_rank'] == 6) echo ' selected'; ?>>
                                                Silver Elite
                                            </option>
                                            <option value="7"<?php if ($accountToEdit['account_rank'] == 7) echo ' selected'; ?>>
                                                Silver Elite Master
                                            </option>
                                            <option value="8"<?php if ($accountToEdit['account_rank'] == 8) echo ' selected'; ?>>
                                                Gold Nova 1
                                            </option>
                                            <option value="9"<?php if ($accountToEdit['account_rank'] == 9) echo ' selected'; ?>>
                                                Gold Nova 2
                                            </option>
                                            <option value="10"<?php if ($accountToEdit['account_rank'] == 10) echo ' selected'; ?>>
                                                Gold Nova 3
                                            </option>
                                            <option value="11"<?php if ($accountToEdit['account_rank'] == 11) echo ' selected'; ?>>
                                                Gold Nova Master
                                            </option>
                                            <option value="12"<?php if ($accountToEdit['account_rank'] == 12) echo ' selected'; ?>>
                                                Master Guardian 1
                                            </option>
                                            <option value="13"<?php if ($accountToEdit['account_rank'] == 13) echo ' selected'; ?>>
                                                Master Guardian 2
                                            </option>
                                            <option value="14"<?php if ($accountToEdit['account_rank'] == 14) echo ' selected'; ?>>
                                                Master Guardian Elite
                                            </option>
                                            <option value="15"<?php if ($accountToEdit['account_rank'] == 15) echo ' selected'; ?>>
                                                Distinguished Master Guardian
                                            </option>
                                            <option value="16"<?php if ($accountToEdit['account_rank'] == 16) echo ' selected'; ?>>
                                                Legendary Eagle
                                            </option>
                                            <option value="17"<?php if ($accountToEdit['account_rank'] == 17) echo ' selected'; ?>>
                                                Legendary Eagle Master
                                            </option>
                                            <option value="18"<?php if ($accountToEdit['account_rank'] == 18) echo ' selected'; ?>>
                                                Supreme Master First Class
                                            </option>
                                            <option value="19"<?php if ($accountToEdit['account_rank'] == 19) echo ' selected'; ?>>
                                                The Global Elite
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ban_status">Banning status :</label>
                                        <select class="form-control" id="ban_status" name="ban_status">
                                            <option value="0"<?php if ($accountToEdit['ban_status'] == 0) echo ' selected'; ?>> Not banned

                                            </option>
                                            <option value="1"<?php if ($accountToEdit['ban_status'] == 1) echo ' selected'; ?>> Banned

                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ban_duration">Ban duration :</label>
                                        <select class="form-control" id="ban_duration" name="ban_duration">
                                            <option value="">Choose</option>
                                            <?php
                                            for ($i = 1; $i <= 30; $i++) {
                                                $newDate = addDaysToDate($i);
                                                $timestamp = strtotime($newDate);
                                                $formattedDate = ($timestamp !== false) ? date('Y-m-d H:i:s',
                                                    $timestamp) : '0000-00-00 00:00:00';

                                                $selected = ($formattedDate == $accountToEdit['ban_duration']) ? 'selected' : '';

                                                echo '<option value="' . $formattedDate . '" ' . $selected . '>' . $i . ' days (' . $formattedDate . ')</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="friend_code">Friend codes</label>
                                        <input type="text" class="form-control" id="friend_code" name="friend_code"
                                               value="<?php echo $accountToEdit['friend_code']; ?>" required>
                                    </div>


                                    <button type="submit" class="btn-grad">Edit account</button>
                                </form>
                                <form action="index.php?page=app/deleteaccount" method="post">
                                    <input type="hidden" name="account_id"
                                           value="<?php echo $accountToEdit['account_id']; ?>">
                                    <button type="submit" class="btn-grad1" onclick="return confirm('Are you sure you want to delete this user?')">Delete account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>