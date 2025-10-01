<?php
require_once "config.php";

$db_connection = null;

function connect()
{
    global $db_connection;
    if($db_connection == null){
        try{
            $db_connection = new PDO("mysql:host=". DB_HOSTNAME .";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
            $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    return $db_connection;
}

