<?php

if($_SERVER["REQUEST_METHOD"] ==="GET" && isset($_GET["search"]))
$_SESSION["search"]=$_GET["search"];
else
    $_SESSION["search"]="";

if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["filtr"]))
    {
            $_SESSION["filtr"]=$_GET["filtr"];
    }
else
    $_SESSION["filtr"]="Všechno";

if($_SERVER["REQUEST_METHOD"] ==="GET" && isset($_GET["kategorie"]))
    if($_GET["kategorie"]!="Všechno")
        $_SESSION["kategorie"]=$_GET["kategorie"];
    else
        $_SESSION["kategorie"]="";
else
    $_SESSION["kategorie"]="";

if($_SERVER["REQUEST_METHOD"] ==="GET" && isset($_GET["page"]))
    $_SESSION["page"]=$_GET["page"];
else
    $_SESSION["page"]=1;

?>