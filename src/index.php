<?php
session_start();

?>

<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/index.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="header">
            <div class='head_links'>
                <a href="logout.php" class='navigation'>Wyloguj</a>
                <span class='navigation'> | </span>
                <a href="login.php" class='navigation'>Zaloguj</a>
                <span class='navigation'> | </span>
                <a href="" class='navigation'>Mój koszyk</a>
                <span class='navigation'> | </span>
                <a href="" class='navigation'>Moje konto</a>
            </div>
            <div id='nav'>
                <div class='navi'>Odież męska</div>
                <div class='navi'>Odież damska</div>
                <div class='navi'>Obuwie</div>
                <div class='navi'>Namioty</div>
                <div class='navi'>Akcesoria</div>
            </div>
            <div>
                <form action="login.php" method="POST">
                    <input type="text" id="whatAreYouLookingFor" placeholder="Czego szukasz?"> 
                </form>
            </div>
                <div class="itemWindow">
                    <div class="itemPicture">
                        
                    </div>
                    <div class="itemData">
                        
                    </div>
                </div>
        </div>    
    </body>
</html>


