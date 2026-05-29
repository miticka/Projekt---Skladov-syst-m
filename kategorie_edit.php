<?php
include("header.php");
$_SESSION["nazev"]=$_GET["nazev"];
?>

<section class="mainpage">
    <h1>Upravit kategorii</h1>
    <div class="kategorie">
    <form method="post" action="update_kategorie.php">
        <label for="nazev">Název kategorie</label><br>
        <input class="vstup" type="text" name="nazev_kategorie" id="nazev_kategorie"<?php echo"value='".$_SESSION["nazev"]."'"; ?>><br>
        <label for="popis">Popis</label><br>
        <textarea id="popis" name="popis"></textarea><br>
        <br>

        <button type="submit" class="ulozit">Uložit</button>
        <button type="button" class="zrusit" onclick="history.back()">Zrušit</button>
    </form>
    </div>
</section>

<script>
    function ValidaceK(e)
{
    e.preventDefault();
    let valid = true;

    let nazev=document.getElementById("nazev_kategorie").value;
    if(nazev==="")
    {
        valid=false;
        alert("nevyplňěné údaje!");
    }

    if(valid) {
        e.target.submit();
    }

}
        document.querySelector(".kategorie form").addEventListener("submit", ValidaceK);
</script>
<?php
include("footer.php");
?>