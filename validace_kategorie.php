<?php

include("database.php");
session_start();

$nazev=$_POST["nazev_kategorie"];
$popis=$_POST["popis"];
if(!empty($nazev))
    {
        $sql="SELECT *FROM kategorie WHERE nazev= '$nazev'";
        $result=mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0)
            $_SESSION["zprava"]="Kategorie už existuje";
        else
            {
            $sql="INSERT INTO kategorie (`nazev`, `popis`) VALUES ('$nazev','$popis')";
            mysqli_query($conn,$sql);
            $_SESSION["zprava"]="Kategorie přidána.";
            }
            
    }
else
    $_SESSION["zprava"]="Kategorie se nepodařilo přidat.";
header("location: kategorie.php");
?>