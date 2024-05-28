<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stolen Cars Catalog</title>
</head>
<body>
<h1 align="center"> Stolen Cars Catalog </h1>
<?php
$link = new mysqli("localhost", "root", "", "StolenCarsDB");
if($link->connect_error){
    die("Ошибка: " . $link->connect_error);
}
$sql = "SELECT * FROM StolenCar";
if ($result = $link->query($sql)) {
    $rowsCount = $result->num_rows; // количество полученных строк
    echo "<table align='center' border='1 solid black'>
    <tr><th>CarID</th>
        <th>CarNumber</th> 
        <th>OwnerSurname</th></tr>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row["ID"] . "</td>";
        echo "<td>";?>
        <a href="info.php?car=<?php echo $row["ID"];?>">
            <?php echo $row["CarNumber"];?>
        </a>
<?php echo "</td>";
        echo "<td>" . $row["OwnerSurname"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else {
    echo "Error: " . $link->error;
}

$link->close();
?>
</body>
</html>