<?php
    include("header.php");
    include("database.php");
    $key=$_GET['id'];
    $_SESSION["product_id"]=$_GET["id"];
    $sql="SELECT * FROM produkty WHERE ID = $key ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);

    $jmeno_produktu=$row["Název"];
    $kategorie=$row["Kategorie"];
    $jednotka=$row["Jednotka"];
    $mnozstvi=$row["Množství"];
    $poznamka=$row["Poznámka"];
    $cena=$row["Cena"];
    $dph=$row["DPH"];
    $cena_dph=$row["Cena s DPH"];
    $ean=$row["EAN"];
    $plu=$row["PLU"];

    $key=$_GET['id'];$sql="SELECT * FROM produkty WHERE ID = $key ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result); 
    $_SESSION["jednotka"]=$row["Jednotka"];
    $_SESSION["kategorie"]=$row["Kategorie"];
    $_SESSION["dph"]=$row["DPH"];

?>
        <section class="mainpage">
            <h2>Nový produkt</h2>
            <div class="novy_produkt">
                <form method="POST">
                <div class="container">
                    <div>
                        <label for="jmeno_produktu">Název</label><br>
                        <input type="text" name="jmeno_produktu" id="jmeno_produktu" value="<?php echo $jmeno_produktu;?>"><br>
                        <label for="kategorie">Kategorie</label><br>
                        <select id="kategorie" name="kategorie">
                            <option></option>
                        <?php 
                        $sql="SELECT * FROM kategorie";
                        $result=mysqli_query($conn,$sql);

                        while($row=mysqli_fetch_assoc($result))
                        {echo"<option";
                        if($_SESSION["kategorie"]==$row["nazev"])echo" selected";
                        echo">".$row["nazev"]."</option>";}
                        ?>
                        </select><br>
                        <label for="jednotka">Jednotka</label><br>
                        <select name="jednotka" id="jednotka" class="selet" value="<?php echo $jednotka;?>">
                            <option <?php if($_SESSION["jednotka"]=="Kus") echo "selected"?>>Kus</option>
                            <option <?php if($_SESSION["jednotka"]=="Kg") echo "selected"?>>Kg</option>
                            <option <?php if($_SESSION["jednotka"]=="Litr") echo "selected"?>>Litr</option>
                            </select><br>
                        <label for="p_mnozstvi">Množství</label><br>
                        <input type="number" id="p_mnozstvi" name="p_mnozstvi" value=<?php echo $mnozstvi;?>><br>
                        <label for="poznamka">Poznámka</label><br>
                        <textarea class="poznamka" id="poznamka" name="poznamka" value="<?php echo $poznamka;?>"></textarea>
                    </div>
                    
                    <div>
                        <label for="cena">Cena bez DPH</label><br>
                        <input type="number" step="any" name="cena" id="cena" value="<?php echo $cena;?>"><br>
                        <label for="cena_dph">Cena s DPH</label><br>
                        <input type="number" name="cena_dph" step="any" id="cena_dph" value="<?php echo $cena_dph;?>"><br>
                        <label for="dph">DPH</label><br>
                        <select name="dph" id="dph" value="<?php echo $dph;?>">
                            <option value="0 <?php if($_SESSION["dph"]=="0") echo "selected"?></option>">0 %</option>
                            <option value="12" <?php if($_SESSION["dph"]=="12") echo "selected"?>>12 %</option>
                            <option value="21" <?php if($_SESSION["dph"]=="21") echo "selected"?>>21 %</option>
                        </select><br>
                        <label for="ean">EAN kód</label><br>
                        <input type="number" name="ean" id="ean" value="<?php echo $ean;?>"><br>
                        <label for="plu">PLU kód</label><br>
                        <input type="number" name="plu" id="plu" value="<?php echo $plu;?>">
                    </div>
                </div>
                <br>
                <button type="submit" class="ulozit" action="update_produktu.php">Uložit</button>
                <button type="button" class="zrusit" onclick="history.back()">Zrušit</button>
                </form><br>

                <form action="smazat_produkt" method="post"><button type="submit" formaction="smazat_produkt.php" class="zrusit" onclick="return confirm('Opravdu smazat?')">Smazat</button></form>
        </section>
            </div>
            <br>
<?php
include("footer.php");
if($_SESSION["zprava"]!="")
        echo '<script>alert("'.$_SESSION["zprava"].'")</script>';
    $_SESSION["zprava"]="";
?>

<script src="validace_vstupu.js"></script>