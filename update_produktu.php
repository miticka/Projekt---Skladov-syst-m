<?php
include("database.php");
session_start();

$id=$_SESSION["product_id"];
$username=$_SESSION["username"];
$jmeno_produktu=$_POST["jmeno_produktu"];
$kategorie=$_POST["kategorie"];
$jednotka=$_POST["jednotka"];
$p_mnozstvi=$_POST["p_mnozstvi"];
$poznamka=$_POST["poznamka"];
$cena=floatval($_POST["cena"]);
$dph=$_POST["dph"];
$cena_dph=floatval($_POST["cena_dph"]);
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
    $sql="SELECT id FROM produkty WHERE Název = $key";
    try
    {
        $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 1)
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
        $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 1)
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
        if(mysqli_num_rows($result) > 1)
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
            $sql="UPDATE produkty
            SET Název='$jmeno_produktu',
                Kategorie='$kategorie',
                EAN='$ean',
                PLU='$plu',
                Cena='$cena',
                `Cena s DPH`='$cena_dph',
                Množství='$p_mnozstvi',
                Jednotka='$jednotka',
                PoznámkA='$poznamka'
            WHERE ID='$id'
            ";
            $user=$_SESSION["username"];
            mysqli_query($conn, $sql);
            $sql="INSERT INTO historie (`Typ`,`Zboží`,`Množství`,`Cena`,`ID_produktu`,`Vytvořil` ) VALUES ('Výdej','$jmeno_produktu',$p_mnozstvi,'$cena','$id','$user')";
            mysqli_query($conn,$sql);
            $_SESSION["zprava"]="Produkt se upravil :)";
            header("Location: new_product.php");
        }
    else
        $_SESSION["zprava"]=$_SESSION["zprava"]."Produkt se nepřidal.";
        header("Location: seznam.php");
}
?>