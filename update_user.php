<?php
include("database.php");
session_start();

$old = $_SESSION["nazev"];
$user = $_POST["user"];
$heslo = $_POST["heslo1"];

// kontrola duplicity
$sql = "SELECT * FROM uzivatele WHERE username='$user' AND username!='$old'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION["zprava"] = "Uživatel už existuje";
    header("Location: sprava_uzivatelu.php");
    exit;
}

// update username
$sql = "UPDATE uzivatele SET username='$user' WHERE username='$old'";
mysqli_query($conn, $sql);

// update hesla
if (!empty($heslo)) {
    $hash = password_hash($heslo, PASSWORD_DEFAULT);

    $sql = "UPDATE uzivatele SET password='$hash' WHERE username='$user'";
    mysqli_query($conn, $sql);
}

$_SESSION["zprava"] = "Uživatel upraven";
header("Location: sprava_uzivatelu.php");
exit;
?>