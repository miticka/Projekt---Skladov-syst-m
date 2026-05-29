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
$celkem=$mnozstvi-$pocet;
$user=$_SESSION["username"];

$nazev=$row["Název"];
$cena=$row["Cena"];
$user=$_SESSION["username"];


if($celkem>=0)
    {  
        $cp=$row["Prodáno"]+$pocet;

        $sql="UPDATE produkty 
        SET Prodáno='$cp'
        WHERE ID='$id'";
        mysqli_query($conn,$sql);

        $sql="UPDATE produkty 
        SET Množství='$celkem'
        WHERE ID='$id'";
        mysqli_query($conn,$sql);

        $sql="INSERT INTO historie (`Typ`,`Zboží`,`Množství`,`Cena`,`ID_produktu`,`Vytvořil` ) VALUES ('Výdej','$nazev',$pocet,'$cena','$id','$user')";
        mysqli_query($conn,$sql);
    }
else
    $_SESSION["zprava"]="Nesprávný vstup";
}
else
    $_SESSION["zprava"]="Nesprávný vstup";


header("Location:vydej.php");
?>