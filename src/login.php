<?php
session_start();
require_once './User.php';
require_once './DBConnection.php';

if( $_SERVER['REQUEST_METHOD'] != 'POST' or isset( $_SESSION['user_id']) ) {
    header( 'Location: ../html/index.html');
} else {
    $email = $_POST['email'];
    $password = $_POST['passwd'];
    
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $conn = getConnection();
    $result = $conn->query($sql);
    
    if( $result->num_rows == 1 ) {
        $row = $result->fetch_assoc();
        
        $hash = $row['hashed_password'];
        $ifPasswordOk = password_verify($password, $hash);
        if( $ifPasswordOk ) {
           $_SESSION['id'] = $row['id'];
           $_SESSION['Name'] = $row['Name'];
           $_SESSION['Surname'] = $row['Surname'];
           $_SESSION['email'] = $row['email'];
           $_SESSION['shipping_addres'] = $row['shipping_addres'];
           header('Location: ../html/index.html');
        } else {
           echo "Podano niewłaściwe hasło. Spróbuj jeszcze raz.";
        }
    } else {
        echo "Zapytanie nie zwróciło użytkownika";
    }
    
    
}
