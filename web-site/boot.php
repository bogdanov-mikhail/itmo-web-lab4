<?php

session_start();

/**
 * @throws Exception
 */
function pdo(): PDO
{
    static $pdo;

    if (!$pdo) {
        $db_params = parse_ini_file("database.ini");
        $db_address = sprintf(
            "pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
            $db_params["host"],
            $db_params["port"],
            $db_params["database"],
            $db_params["user"],
            $db_params["password"]
        );
        $pdo = new PDO($db_address);
    }

    return $pdo;
}

function is_auth(): bool {
    return $_SESSION["user_id"] ?? false;
}

function get_in_list(array $list): string {
    $in_string = "";
    foreach ($list as $element) {
        $in_string .= "'$element',";
    }
    return rtrim($in_string, ',');
}