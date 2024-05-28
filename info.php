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
    die("Error: " . $link->connect_error);
}
$carID = $_GET['car'];
$sql = "select StolenCar.CarNumber, Model.ModelName, Status.StatusName, StolenCar.OwnerSurname from StolenCar, Model, Status where StolenCar.ID=$carID and StolenCar.ModelID=Model.ID and StolenCar.StatusID=Status.ID";
if ($result = $link->query($sql)) {
    $rowsCount = $result->num_rows; // количество полученных строк
    echo "<table align='center' border='1 solid black'>
    <tr><th>CarNumber</th> 
        <th>Model</th>
        <th>Status</th>
        <th>OwnerSurname</th></tr>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row["CarNumber"] . "</td>";
        echo "<td>" . $row["ModelName"] . "</td>";
        echo "<td>" . $row["StatusName"] . "</td>";
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
<h4 align="left"><a href="index.php">Back</a></h4></body>
</html>