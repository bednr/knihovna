<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bednarek</title>
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <div>
    <h1>Prehled databaze</h1>
    <?php
    require 'dbconfig.php';
if(!($con=mysqli_connect("$server", "$user", "$pass", "$base")))
{
    die("nelze se pripojit k serveru</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if(!($result=mysqli_query($con, "SELECT ISBN, firstName, lastName, bookName, popis FROM books")))
{
    die("Nelze provezt dotaz</body></html>");
}
$ISBN=$_POST["ISBN"]; 
$firstName=$_POST["firstName"];
$lastName=$_POST["lastName"];
$bookName=$_POST["bookName"];
?>
<h2>Knihy</h2>
<table border="1">
    <tr>
        <th>ISBN</th>
        <th>Jmeno autora</th>
        <th>Prijmeni autora</th>
        <th>Kniha</th>
        <th>Popis</th>
    </tr>
<?php 
while ($row = mysqli_fetch_array($result))
{
    if($row["bookName"]==$bookName || $row["lastName"]==$lastName || $row["firstName"]==$firstName || $row["ISBN"]==$ISBN){
    ?>
    <tr>
       <td><?php echo htmlspecialchars($row["ISBN"]); ?></td> 
       <td><?php echo htmlspecialchars($row["firstName"]); ?></td>
       <td> <?php echo htmlspecialchars($row["lastName"]); ?></td>
       <td><?php echo htmlspecialchars($row["bookName"]); ?></td>
       <td> <?php echo htmlspecialchars($row["popis"]); ?></td>
    </tr>
    <?php
}
}
mysqli_free_result($result);
mysqli_close($con);
?>
</table><br>

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

</div>
</body>

</html>