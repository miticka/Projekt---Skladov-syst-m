<?php
include("database.php");
session_start();

$user=$_POST["user"];
$heslo=$_POST["heslo1"];

if($user!="" && $heslo!="")
    {
        $sql="SELECT * FROM uzivatele WHERE `username`='$user'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==0)
            {
                if($heslo!="")
                    {   
                        $hash=password_hash($heslo,PASSWORD_DEFAULT);
                        $sql="INSERT INTO uzivatele (`username`, `password`) VALUES ('$user','$hash')";
                        mysqli_query($conn,$sql);
                        $_SESSION["zprava"]="Uživatel vytvořen";
                        header("location: sprava_uzivatelu.php");
                    }
                else
                    {
                        $_SESSION["zprava"]="Prázdné heslo!";
                        header("location: novy_uzivatel.php");
                    }
            }
        else
            {
            $_SESSION["zprava"]="Uživatel již existuje!";
            header("location: sprava_uzivatelu.php");
            }

    }
?>