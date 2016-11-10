<?php
/**
 * Description of DBConnectio
 *
 * @author KajkoIKokosz
 */

require_once 'Item.php';

$dbConnectParam = [
    "hostName" => "localhost",
    "userName" => "root",
    "password" => "",
    "dbName" => "SQLep"
];

$conn = new mysqli($dbConnectParam['hostName'], $dbConnectParam['userName'], $dbConnectParam['password'], $dbConnectParam['dbName']);
if ($conn->connect_error) {
    die("Polaczenie nieudane. Blad: " . $conn->connect_error."<br>");
}
//setting connections for Models
Item::setConnection($conn);

    

