<?php

include("database.php");
session_start();
$key=$_SESSION["product_id"];

$sql="SELECT * FROM produkty WHERE `ID`='$key'";
$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
$jmeno_produktu=$row["Název"];
$p_mnozstvi=$row["Množství"];
$cena=$row["Cena"];
$user=$_SESSION["username"];


$sql="INSERT INTO historie (`Typ`,`Zboží`,`Množství`,`Cena`,`ID_produktu`,`Vytvořil` ) VALUES ('Smazání','$jmeno_produktu',$p_mnozstvi,'$cena','$key','$user')";
mysqli_query($conn,$sql);
$sql="DELETE FROM produkty WHERE `produkty`.`ID` = $key";
mysqli_query($conn,$sql);
$_SESSION["zprava"]="Produkt smazán";

header("Location: seznam.php");
?>