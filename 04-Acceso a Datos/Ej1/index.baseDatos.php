<?php
$host = "127.0.0.1";
$dbname = "ej1";
$user = "root";
$passwd = "";


function connect($host, $dbname, $user, $passwd)
{
    try{
        $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $passwd);
        return $dbh;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}

$dbh = connect($host,$dbname,$user,$passwd);
