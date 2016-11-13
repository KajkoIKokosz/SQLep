<?php
session_start();
require_once './User.php';
require_once './DBConnection.php';
  
if(isset( $_SESSION['user_id']) ) {
    header( 'Location: ./index.php');
} else if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
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
           $_SESSION['user_id'] = $row['id'];
           $_SESSION['Name'] = $row['Name'];
           $_SESSION['Surname'] = $row['Surname'];
           $_SESSION['email'] = $row['email'];
           $_SESSION['shipping_addres'] = $row['shipping_addres'];
           header('Location: ./index.php');
        } else {
           echo "Podano niewłaściwe hasło. Spróbuj jeszcze raz.";
        }
    } else {
        echo "Zapytanie nie zwróciło użytkownika";
    }
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/login.css" rel="stylesheet" type="text/css"/>
        <script src="../JS/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="../JS/login.js" type="text/javascript"></script>
    </head>
    <body>
        <div id='loging'>
            <form id='loging_form' action="../src/login.php" method="POST"> 
               <input type="email" name="email" class="log_element" placeholder="email">
               <br>
               <input type="password" name="passwd" id='passwd' class="log_element" placeholder="****">
               <br id='beforeRepeatPasswd'>
               <input type="submit" class="log_element removeWhileRegister" value="zaloguj">
               <span class="removeWhileRegister"> lub </span>
               <button id="register" class="log_element" formaction="../src/register.php" value="zarejestruj">Zarejestruj</button>
            </form>
            
        </div>
    </body>
</html>

