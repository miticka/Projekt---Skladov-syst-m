<?php
include("header.php");
?>

<section class="mainpage">
    <h1>Nová kategorie</h1>
    <div class="kategorie">
    <form method="post" action="validace_kategorie.php">
        <label for="nazev">Název kategorie</label><br>
        <input type="text" name="nazev_kategorie" id="nazev_kategorie" class="vstup"><br>
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
        valid=false
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