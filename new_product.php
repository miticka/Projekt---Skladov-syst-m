<?php
    include("header.php");
    include("database.php");
?>
        <section class="mainpage">
            <h2>Nový produkt</h2>
            <div class="novy_produkt">
                <form method="POST" action="validace_produktu.php">
                <div class="container">
                    <div>
                        <label for="jmeno_produktu">Název</label><br>
                        <input type="text" name="jmeno_produktu" id="jmeno_produktu"><br>

                        <label for="kategorie">Kategorie</label><br>
                        <select id="kategorie" name="kategorie">
                            <option></option>
                        <?php 
                        $sql="SELECT * FROM kategorie";
                        $result=mysqli_query($conn,$sql);

                        while($row=mysqli_fetch_assoc($result))
                            echo"<option>".$row["nazev"]."</option>";
                        ?>
                        </select><br>
                        

                        <label for="jednotka">Jednotka</label><br>
                        <select name="jednotka" id="jednotka" class="selet">
                            <option>Kus</option>
                            <option>Kg</option>
                            <option>Litr</option>
                        </select><br>
                        <label for="p_mnozstvi">Počáteční množství</label><br>
                        <input type="number" id="p_mnozstvi" name="p_mnozstvi" value="0"><br>
                        <label for="poznamka">Poznámka</label><br>
                        <textarea class="poznamka" id="poznamka" name="poznamka"></textarea>
                    </div>
                    
                    <div>
                        <label for="cena">Cena bez DPH</label><br>
                        <input type="number" step="any" name="cena" id="cena"><br>
                        <label for="cena_dph">Cena s DPH</label><br>
                        <input type="number" name="cena_dph" step="any" id="cena_dph"><br>
                        <label for="dph">DPH</label><br>
                        <select name="dph" id="dph">
                            <option value="0">0 %</option>
                            <option value="12" selected>12 %</option>
                            <option value="21">21 %</option>
                        </select><br>
                        <label for="ean">EAN kód</label><br>
                        <input type="number" name="ean" id="ean"><br>
                        <label for="plu">PLU kód</label><br>
                        <input type="number" name="plu" id="plu">
                    </div>
                </div>
                <br>
                <button type="submit" class="ulozit">Uložit</button>
                <button type="button" class="zrusit" onclick="history.back()">Zrušit</button>
                </form>
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