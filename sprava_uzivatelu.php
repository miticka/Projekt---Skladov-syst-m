<?php
include("header.php");
include("database.php");
?>

        <section class="mainpage">
            <h1>Správa uživatelů</h1>

            <div><button onclick="window.location.href='novy_uzivatel.php'">Nový uživatel</button></div>

            <div class="tabulka_kategorii">
            <?php
                $sql="SELECT * FROM uzivatele";
                $result=mysqli_query($conn,$sql);
                $pocet=ceil(mysqli_num_rows($result)/10);
                $i=1;

                while($i<=$pocet)
                {
                    echo"<table class='kategorie_tab'>
                <tr><th>Uživatel</th></tr>";
                    $poradi=($i-1)*7;
                    $sql="SELECT * FROM uzivatele LIMIT 7 OFFSET $poradi";
                    $result=mysqli_query($conn,$sql);
                    $i++;

                if(mysqli_num_rows($result)>0)
                    while($row=mysqli_fetch_assoc($result))
                    echo"<tr><td><a href='user_edit.php?username=".$row['username']."'>".$row['username']."</a></td></tr>";
                    echo"</table>";
                }
                
            ?>
        </div>
        <div class="footer">
        </div>
        </section>

<?php
include("footer.php");

if($_SESSION["zprava"]!="")
        echo '<script>alert("'.$_SESSION["zprava"].'")</script>';
    $_SESSION["zprava"]="";
?>

