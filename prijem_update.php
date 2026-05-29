<?php
include("database.php");
session_start();

$id=$_POST['heslo'];
$pocet=$_POST["product_".$id];
if($pocet>0)
    {
$sql="SELECT * FROM produkty WHERE ID=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$mnozstvi=$row["Množství"];
$nazev=$row["Název"];
$cena=$row["Cena"];
$username=$_SESSION["username"];

//$mnozstvi=$_SESSION["mnozstvi"];
$celkem=$mnozstvi+$pocet;

$sql="UPDATE produkty 
SET Množství='$celkem'
WHERE ID='$id'";
mysqli_query($conn,$sql);

$sql="INSERT INTO `historie`(`Typ`,`Zboží`,`Množství`,Cena,`ID_produktu`,`Vytvořil` ) VALUES ('Příjem','$nazev',$pocet,'$cena',$id,'$username')";
mysqli_query($conn,$sql);
}
else
    $_SESSION["zprava"]="Nesprávný vstup";

header("Location:prijem.php");
?>