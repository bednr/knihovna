<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
    <div>
<ul>
            <li>
                <a href="vloz.html">Vkladani</a>
            </li>
            <li>
                <a href="prehled.php">Prehled</a>
            </li>
            <li>
                <a href="hledej.html">Hledej</a>
            </li>
            <li>
                <a href="home.html">Uvod</a>
            </li>
        </ul>
<?php
    require 'dbconfig.php';
    if (!($con = mysqli_connect("$server", "$user", "$pass", "$base"))) {
        die("Nelze se pripojit k serveru</body></html>");
    }
    mysqli_query($con, "SET NAMES 'utf8'");
    $ISBN=addslashes($_POST["ISBN"]);
    $firstName=addslashes($_POST["firstName"]);
    $lastName=addslashes($_POST["lastName"]);
    $bookName=addslashes($_POST["bookName"]);
    $popis=addslashes($_POST["popis"]);

    if(mysqli_query($con, "INSERT INTO books(ISBN, firstName, lastName, bookName, popis ) VALUES('$ISBN','$firstName','$lastName','$bookName','$popis')")){
        echo "uspesne vlozeno";
    }
    else{
        echo "Zase nejaka chyba ". mysqli_error($con);
    }
    mysqli_close($con);

    ?>
    </div>
</body>
</html>