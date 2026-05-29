<?php
include("header.php");
include("database.php");
?>

        <section class="mainpage">
            <h1>Kategorie</h1>
            <div class="top_kategorie">
                <div>
                    <input type="search" placeholder="Vyhledat kategorií..." class="vyhledavac"> 
                    <button class="vyhledej">🔍Vyhledat</button>
                </div>
                
            </div>
            <br>
            <div><button onclick="window.location.href='nova_kategorie.php'">Nová kategorie</button></div>

            <div class="tabulka_kategorii">
            <?php
                $sql="SELECT * FROM kategorie";
                $result=mysqli_query($conn,$sql);
                $pocet=ceil(mysqli_num_rows($result)/10);
                $i=1;

                while($i<=$pocet)
                {
                    echo"<table class='kategorie_tab'>
                <tr><th>Kategorie</th></tr>";
                    $poradi=($i-1)*7;
                    $sql="SELECT * FROM kategorie LIMIT 7 OFFSET $poradi";
                    $result=mysqli_query($conn,$sql);
                    $i++;

                if(mysqli_num_rows($result)>0)
                    while($row=mysqli_fetch_assoc($result))
                    echo"<tr><td><a href='kategorie_edit.php?nazev=".$row['nazev']."'>".$row['nazev']."</a></td></tr>";
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

