<?php
require_once 'lib/output.php';
if (empty($_SESSION['id'])) {
    $_SESSION['alert'] = 'You must log in to access your personal space';
    $_SESSION['alert-color'] = 'warning';
    $url = 'index.php?page=page/login';
    header('Location: ' . $url);
    exit;
}
$user = getUser('id', $_SESSION['id']);
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
                                <a href="index.php?page=page/choiceaccount" class="btn-grad">Modify an account Steam</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <h2>Add a Steam account</h2>
                                <form action="index.php?page=app/addaccount" method="post">
                                    <div class="form-group">
                                        <label for="steam_username">Steam username :</label>
                                        <input type="text" class="form-control" id="steam_username"
                                               name="steam_username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="steam_email">Steam e-mail address :</label>
                                        <input type="email" class="form-control" id="steam_email" name="steam_email"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="steam_password">Steam password :</label>
                                        <input type="password" class="form-control" id="steam_password"
                                               name="steam_password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="account_rank">Account rank :</label>
                                        <select class="form-control" id="account_rank" name="account_rank">
                                            <option value="1">No rank</option>
                                            <option value="2">Silver 1</option>
                                            <option value="3">Silver 2</option>
                                            <option value="4">Silver 3</option>
                                            <option value="5">Silver 4</option>
                                            <option value="6">Silver Elite</option>
                                            <option value="7">Silver Elite Master</option>
                                            <option value="8">Gold Nova 1</option>
                                            <option value="9">Gold Nova 2</option>
                                            <option value="10">Gold Nova 3</option>
                                            <option value="11">Gold Nova Master</option>
                                            <option value="12">Master Guardian 1</option>
                                            <option value="13">Master Guardian 2</option>
                                            <option value="14">Master Guardian Elite</option>
                                            <option value="15">Distinguished Master Guardian</option>
                                            <option value="16">Legendary Eagle</option>
                                            <option value="17">Legendary Eagle Master</option>
                                            <option value="18">Supreme Master First Class</option>
                                            <option value="19">The Global Elite</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ban_status">Banning status :</label>
                                        <select class="form-control" id="ban_status" name="ban_status">
                                            <option value="0">Not banned</option>
                                            <option value="1">Banned</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="ban_duration">Ban duration :</label>
                                        <select class="form-control" id="ban_duration" name="ban_duration">
                                            <?php
                                            for ($i = 0; $i <= 30; $i++) {
                                                $newDate = addDaysToDate($i);
                                                $timestamp = strtotime($newDate);
                                                $formattedDate = ($timestamp !== false) ? date('Y-m-d H:i:s', $timestamp) : '0000-00-00 00:00:00';
                                                echo '<option value="' . $formattedDate . '">' . $i . ' jours (' . $formattedDate . ')</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="friend_code">Friend codes</label>
                                        <input type="text" class="form-control" id="friend_code" name="friend_code">
                                    </div>
                                    <button type="submit" class="btn-grad">Add account</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
