<?php
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
                                <a href="index.php?page=page/addaccount" class="btn-grad">Add a Steam account</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <a href="index.php?page=page/choiceaccount" class="btn-grad">Modify an account
                                    Steam</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
