<?php
/**
 * @param string $field
 * @param string $value
 * @return mixed
 */
function getUser(string $field, string $value): mixed
{

    if (!in_array($field, getColumns('user'))) {
        return false;
    }

    $connect = connect();

    // 2. QUERY
    $request = $connect->prepare("SELECT * FROM user WHERE $field = ?");

    $params = [
        trim($value),
    ];

    // 3. EXECUTE
    $request->execute($params);

    // 4. FETCH
    return $request->fetchObject();
}


/**
 * @param string $field
 * @param string $value
 * @return bool
 */
function userExists(string $field, string $value): bool
{
    if (is_object(getUser($field, $value))) {
        return true;
    } else {
        return false;
    }
}

/**
 * @return void
 */
function logout(): void
{
    $errorMessage = 'Au revoir !';


    session_unset();
    session_destroy();
    session_write_close();


    session_start();
    $_SESSION['alert'] = $errorMessage;


    header('Location: index.php');
    die;
}


