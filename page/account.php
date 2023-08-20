<?php
$pdo = connect();


$query = "SELECT sa.*, u.username as user_username FROM steam_accounts sa LEFT JOIN user u ON sa.user_id = u.id";
$result = $pdo->query($query);
$accounts = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Steam account list</title>
</head>
<?php
$ranksMapping = array(
    1 => "img/rang/No_Rank_46a99a39f8.png",
    2 => "img/rang/silver_1_46a99a39f8.png",
    3 => "img/rang/silver_2_c07d0facdd.png",
    4 => "img/rang/silver_3_5d1ca03c7e.png",
    5 => "img/rang/silver_4_0c5d383e29.png",
    6 => "img/rang/silver_elite_317c688372.png",
    7 => "img/rang/silver_elite_master_9717189fe5.png",
    8 => "img/rang/gold_nova_1_cec4b69c20.png",
    9 => "img/rang/gold_nova_2_700f45ba47.png",
    10 => "img/rang/gold_nova_3_78bbea8969.png",
    11 => "img/rang/gold_nova_master_e0b4e1790f.png",
    12 => "img/rang/master_guardian_1_705461cdaa.png",
    13 => "img/rang/master_guardian_2_34c0aa8b4c.png",
    14 => "img/rang/master_guardian_elite_6b4b6401ee.png",
    15 => "img/rang/distinguished_master_guardian_c867a8385a.png",
    16 => "img/rang/legendary_eagle_c040258efa.png",
    17 => "img/rang/legendary_eagle_master_4d72faaf57.png",
    18 => "img/rang/supreme_master_first_class_d274bcdb5f.png",
    19 => "img/rang/global_elite_0e7e234eeb.png"
);
?>
<body>
<div class="container">
    <h1>Steam account list</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Player</th>
            <th>Steam Username</th>
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'Oui'): ?>
                <th>Steam Email</th>
                <th>Steam Password</th>
            <?php endif; ?>
            <th>Account Rank</th>
            <th>Ban Status</th>
            <th>Ban Duration</th>
            <th>Friend codes</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($accounts as $account): ?>
            <tr>
                <td><?php echo ucfirst($account['user_username']); ?></td>
                <td><?php echo $account['steam_username']; ?></td>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'Oui'): ?>
                    <td class="copyable"><?php echo $account['steam_email']; ?></td>
                    <td class="copyable"><?php echo $account['steam_password']; ?></td>
                <?php endif; ?>
                <td>
                    <?php if (isset($ranksMapping[$account['account_rank']])): ?>
                        <img src="<?php echo $ranksMapping[$account['account_rank']]; ?>" alt="Rank Image" width="70%">
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($account['ban_status'] == 0): ?>
                        <img src="img/icon/checked.png" alt="Non banni">
                    <?php else: ?>
                        <img src="img/icon/point-dexclamation.png" alt="Banni">
                    <?php endif; ?>
                </td>
                <td class="ban-duration-cell">
                    <?php
                    if ($account['ban_status'] == 0) {
                        echo '<img src="img/icon/speed.png" alt="Ready">';
                    } else {
                        $banDurationTimestamp = strtotime($account['ban_duration']);
                        if ($banDurationTimestamp !== false) {
                            $formattedBanDuration = date('d/m/Y H:i:s', $banDurationTimestamp);
                            echo $formattedBanDuration;
                        } else {
                            echo 'Invalid format';
                        }
                        echo '<span class="countdown" data-end="' . ($banDurationTimestamp) . '"></span>';

                    }
                    ?>
                </td>


                <td class="copyable"><?php echo $account['friend_code']; ?></td>


            </tr>

        <?php endforeach; ?>
        <tr>
            <td colspan="8">
                <a href="index.php?page=page/addaccount" class="btn-grad2">+</a>
            </td>
        </tr>
        </tbody>
    </table>
</div>



