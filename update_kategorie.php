<?php
include("database.php");
session_start();

$old=$_SESSION["nazev"];
$nazev=$_POST["nazev_kategorie"];
$popis=$_POST["popis"];

if(!empty($nazev))
    {
    $sql="UPDATE kategorie SET `nazev`='$nazev', `popis`='$popis' WHERE `nazev`='$old'" ;
    mysqli_query($conn,$sql);
    $_SESSION["zprava"]="Kategorie upravena";
    }
else
    $_SESSION["zprava"]="Kategorii se nepodařilo upravit";
header("Location: kategorie.php");
?>