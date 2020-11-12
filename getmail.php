
<?php
    $fname= $_POST['FirstName'];
    $lname= $_POST['LastName'];
    $mail= $_POST['Email'];
    $subject= $_POST['Subject'];
    $phone= $_POST['Phone'];
    $message= $_POST['Message'];
    $erreur=" ";
    //var_dump($_POST);
    '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h1>';
                if(isset($fname)) 
                {
                    echo $fname;
                }
    '</h1>
    </body>
    </html>';
?>
        