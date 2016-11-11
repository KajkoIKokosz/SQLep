<?php
/**
 * Description of DBConnectio
 *
 * @author KajkoIKokosz
 */

function getConnection() {
    $dbConnectParam = [
        "hostName" => "localhost",
        "userName" => "root",
        "password" => "",
        "dbName" => "SQLep"
    ];
    
    $conn = new mysqli($dbConnectParam['hostName'], $dbConnectParam['userName'], $dbConnectParam['password'], $dbConnectParam['dbName']);
    if ($conn->connect_error) {
        die("Polaczenie nieudane. Blad: " . $conn->connect_error."<br>");
    } else {
        echo "udało się ustanowić połączenie";
        return $conn;
    }
}
