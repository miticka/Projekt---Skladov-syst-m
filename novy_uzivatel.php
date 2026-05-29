<?php
include("header.php");
if($_SESSION["username"]!="admin")
    header("location: zakaz_vstupu.php");

?>

<section class="mainpage">
    <h1>Upravit uživatele</h1>
    <div class="kategorie">
    <form method="post" action="validace_user.php">
        <label for="nazev">Username</label><br>
        <input class="vstup" type="text" name="user" id="user"><br><br>
        <label for="heslo">Nové heslo</label><br>
        <input type="password" name="heslo1" id="heslo1" class="vstup"><br>
        <label for="heslo">Potvrdit heslo</label><br>
        <input type="password" name="heslo2" id="heslo2" class="vstup"><br>

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

    let user=document.getElementById("user").value;
    if(user=="")
    {
        valid=false;
        alert("nevyplňěné údaje!");
    }

    let heslo1=document.getElementById("heslo1").value;
    let heslo2=document.getElementById("heslo2").value;

    if(heslo1!=heslo2)
    {
        valid=false;
        alert("Hesla se neshodují!");
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