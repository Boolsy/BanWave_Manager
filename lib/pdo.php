<?php

function connect()
{
    global $connect;

    if (is_a($connect, 'PDO')) {
        return $connect;
    } else {
        try {
            $connect = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';charset=utf8', DB_USER, DB_PWD);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die ('Error: ' . $exception->getMessage());
        }
        return $connect;
    }
}


/**
 * @param string $table
 * @return array
 */
function getColumns(string $table): array
{
    $connect = connect();
    $columns = [];
    $cols = $connect->query("DESCRIBE " . $table, PDO::FETCH_OBJ);
    foreach ($cols as $col) {
        $columns[] = $col->Field;
    }
    return $columns;
}