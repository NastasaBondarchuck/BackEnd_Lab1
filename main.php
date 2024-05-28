<?php
$link = mysqli_connect("localhost", "root", "");
if ($link) echo "Connection established";
else echo "Connection failed";

$db = "StolenCarsDB";
$query = "create database if not exists $db";
//$query = "DROP DATABASE IF EXISTS $db";
$createDB = mysqli_query($link, $query);
if ($createDB) echo "\nDatabase is successfully created";
else echo "\nDatabase creating failed";

$query = "grant all privileges on *.* to 'admin'@'localhost' identified by 'admin' with grant option";
$createAdmin = mysqli_query($link, $query);

$selectDB = mysqli_select_db($link, $db);

$statusTable = "Status";
$query = "create table if not exists $statusTable 
    ( 
        ID integer auto_increment primary key, 
        StatusName text not null
    )";
$createStatusTable = mysqli_query($link, $query);
if ($createStatusTable) echo "\n$statusTable table is successfully created";
else echo "\n$statusTable table creating failed";

$modelTable = "Model";
$query = "create table if not exists $modelTable
    (
        ID int not null auto_increment primary key,
        ModelName text not null
    )";
$createModelTable = mysqli_query($link, $query);
if ($createModelTable) echo "\n$modelTable table is successfully created";
else echo "\n$modelTable table creating failed";

$carTable = "StolenCar";
$query = "create table if not exists $carTable
    (
        ID int not null auto_increment primary key,
        CarNumber varchar(8) not null,
        ModelID int,
        StatusID int not null,
        OwnerSurname varchar(50) not null,
        CreationDate date not null,
        foreign key (StatusID) references Status (ID),
        foreign key (ModelID) references Model (ID)
    )";
$createCarTable = mysqli_query($link, $query);
if ($createCarTable) echo "\n$carTable table is successfully created";
else echo "\n$carTable table creating failed";





