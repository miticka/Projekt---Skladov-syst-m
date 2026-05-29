<?php
include("database.php");
session_start();

$_SESSION["zprava"]="";
$username=$_SESSION["username"];
$jmeno_produktu=$_POST["jmeno_produktu"];
$kategorie=$_POST["kategorie"];
$jednotka=$_POST["jednotka"];
$p_mnozstvi=$_POST["p_mnozstvi"];
$poznamka=$_POST["poznamka"];
$cena=$_POST["cena"];
$dph=$_POST["dph"];
$cena_dph=$_POST["cena_dph"];
$ean=$_POST["ean"];
$plu=$_POST["plu"];

echo"ahoj";

if(empty($jmeno_produktu)||empty($kategorie)||empty($jednotka)||empty($cena)||empty($cena_dph)||(empty($ean)&&empty($plu)))
{
    var_dump($jmeno_produktu,$kategorie,$jednotka,$p_mnozstvi,$poznamka,$cena,$cena_dph,$ean,$plu);
}
else{
    $unique=true;
    $chyba=0;

    $key=$_POST["jmeno_produktu"];
    $sql="SELECT id FROM produkty WHERE `Název` = '$key'";
    try
    {
        $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0)
            {
                $unique=false;
                $chyba=1;
                $_SESSION["zprava"]="Produkt s tímhle názvem již existuje! ";
            }
    }

    catch(Exception $e){
    }

    try
    {
        $key=$_POST["ean"];
        $sql="SELECT id FROM produkty WHERE ean = $key";
        $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0)
            {
                $unique=false;
                $chyba=2;
                $_SESSION["zprava"]=$_SESSION["zprava"]."Produkt s tímhle EAN již existuje! ";
            }
    }

    catch(Exception $e){
    }

    try
    {
        $key=$_POST["plu"];
        $sql="SELECT id FROM produkty WHERE plu = $key";
        $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0)
            {
                $unique=false;
                $chyba=3;
                $_SESSION["zprava"]=$_SESSION["zprava"]."Produkt s tímhle PLU již existuje! ";
            }

    }

    catch(Exception $e){
    }

    if($unique)
        {
            $sql="INSERT INTO `produkty` (`Název`, `Kategorie`, `EAN`, `PLU`, `Cena`, `Cena s DPH`, `DPH`, `Množství`, `Jednotka`, `Prodáno`, `ID`, `Pridal`, `Poznámka`) 
            VALUES ('$jmeno_produktu', '$kategorie', '$ean', '$plu', '$cena', '$cena_dph', '$dph', '$p_mnozstvi', '$jednotka', '0', 'NULL', '$username', '$poznamka')";
            mysqli_query($conn, $sql);
            $_SESSION["zprava"]="Produkt se přidal :)";

            $sql="SELECT * FROM produkty WHERE `Název`='$jmeno_produktu'";
            $result=mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
            $id=$row["ID"];
            $user=$_SESSION["username"];

            $sql="INSERT INTO historie (`Typ`,`Zboží`,`Množství`,`Cena`,`ID_produktu`,`Vytvořil` ) VALUES ('Přidání','$jmeno_produktu',$p_mnozstvi,'$cena','$id','$user')";
            mysqli_query($conn,$sql);

            header("Location: new_product.php");
        }
    else
        $_SESSION["zprava"]=$_SESSION["zprava"]."Produkt se nepřidal.";
        header("Location: seznam.php");
}
?>