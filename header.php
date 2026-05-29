<?php
session_start();
if(!isset($_SESSION["username"]))
    {
    header("Location: login.php");
    exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <div class="layout">
        <div class="logo">
            LOGO_ZDE
        </div>
        <nav>
            <button onclick="window.location.href='index.php'">Domovská stránka</button>
            <button onclick="window.location.href='seznam.php'">Seznam produktů</button>
            <button onclick="window.location.href='prijem.php'">Příjem zboží</button>
            <button onclick="window.location.href='vydej.php'">Výdej zboží</button>
            <button onclick="window.location.href='historie.php'">Historie</button>
            <button>Export CSV - WIP</button>
            <button>Import CSV - WIP</button>
            
        </nav>
    </div>

    <div class="layout">
        <div class="actionbar">
            <div>
                <button onclick="window.location.href='new_product.php'">+ Přidat produkt</button>
                <button onclick="window.location.href='kategorie.php'">Kategorie zboží</button>
                <?php if ($_SESSION["username"] == "admin")  echo '<button onclick="window.location.href=\'sprava_uzivatelu.php\'">Správa uživatelů</button>';
?>
            </div>
            <div>
                <form action="logout.php">přihlášený jako: <?php echo $_SESSION['username']; ?><button type="submit">Odlásit se</button></form>
            </div>
        </div>