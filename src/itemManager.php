<?php
    require_once './Item.php';
    
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if ( isset($_POST['itemName'])
           && isset($_POST['itemPrice'])
        ) {
            $newItem = new Item(
                    $_POST['itemName'],
                    $_POST['itemDesc'],
                    (float)$_POST['itemPrice'],
                    (int)$_POST['itemQuant']
            );
            $newItem->saveToDb();
            
            if( isset($_FILES['upload_file']) ) {
                $image = $_FILES['upload_file']['tmp_name'];
                $newItem->addImg($image);
            }
        }
      
    }
?>

<!DOCTYPE html>
<htm>
    <head>
        <title>Zarządzaj przedmiotem</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action='' method='POST' enctype="multipart/form-data">
            <h3>Wprowadź dane produktu</h3>
            <label>Nazwa:  
                <input type='text' name='itemName'>
            </label>
            <br>
            <label>Opis:  
                <input type='text' name='itemDesc'>
            </label>
            <br>
            <label>Cena:  
                <input type='text' name='itemPrice'>
            </label>
            <br>
            <label>Ilość:  
                <input type='text' name='itemQuant'>
            </label>
            <br>
            <label>Obraz:  
                <input type="file" name="upload_file" id="fileToUpload">
            </label>
            <br>
            <input type='submit' value='dodaj przedmiot'>
        </form>
    </body>
    
</htm>