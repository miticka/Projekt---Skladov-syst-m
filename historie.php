<?php
include("header.php");
include("database.php");

if($_SERVER["REQUEST_METHOD"] ==="GET" && isset($_GET["page"]))
$_SESSION["page"]=$_GET["page"];
else
    $_SESSION["page"]=1;
$_SESSION["action"]="historie";
?>

<section class="mainpage">
    <div class="top_historie">
        <h1>Historie</h1>
        <div class="pagination">
                    Stránka:
                        <?php 
                        $sql="SELECT * FROM historie";
                        $result=mysqli_query($conn,$sql);
                        $pocet=ceil(mysqli_num_rows($result)/10);

                        $i=$_SESSION["page"];
                        $a=1;

                        while($a<=$pocet)
                        {   
                            echo"<a href=".$_SESSION["action"].".php?page=".$a;
                            if($a==$i)
                                {echo" class='page'";}
                            echo">".$a."</a>";
                            $a++;
                            }
                        if($a<$pocet &&$a)
                            echo"<a href=".$_SESSION["action"].".php?page=".$pocet." class='page'>".$pocet."</a>";
                        ?>
        </div>
    </div>

    <table class="historie">
        <tr>
            <th>Událost</th>
            <th>ID události</th>
            <th>Zboží</th>
            <th>Množství</th>
            <th>Cena za jednotku</th>
            <th>Datum</th>
            <th>ID zboží</th>
            <th>Vytvořil</th>
        </tr>
<?php
    $page=$_SESSION["page"];
    $off=($page-1)*10;
    $sql="SELECT * FROM historie ORDER BY Datum DESC LIMIT 10 OFFSET $off";
    $result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)> 0)
    {		
    while($row=mysqli_fetch_assoc($result))
    {
    echo"
    <tr ";

    switch($row["Typ"])
    {
        case "Příjem":echo"class='pridano'";
        case "Výdej":echo"class='vydano'";
        case "Přidání": echo "class='pridalose'";
        case "Smazání": echo "class='odstraneni'";
    }
    echo">
        <td class='ostatni'>".$row["Typ"]."</td>
        <td class='ostatni'>".$row["ID"]."</td>
        <td class='nazev2'>".$row["Zboží"]."</td>
        <td class='ostatni'>".$row["Množství"]."</td>
        <td class='ostatni'>".$row["Cena"]."</td>
        <td class='ostatni'>".$row["Datum"]."</td>
        <td class='ostatni'>".$row['ID_produktu']."</td>
        <td class='ostatni'>".$row["Vytvořil"]."</td>

    </tr>
    ";
    }
    }


?>
    </table>
    <div class="footer">
        <div class="pagination">
                    Stránka:
                        <?php 
                        $sql="SELECT * FROM historie";
                        $result=mysqli_query($conn,$sql);
                        $pocet=ceil(mysqli_num_rows($result)/10);

                        $i=$_SESSION["page"];
                        $a=1;

                        while($a<=$pocet)
                        {   
                            echo"<a href=".$_SESSION["action"].".php?page=".$a;
                            if($a==$i)
                                {echo" class='page'";}
                            echo">".$a."</a>";
                            $a++;
                            }
                        if($a<$pocet &&$a)
                            echo"<a href=".$_SESSION["action"].".php?page=".$pocet." class='page'>".$pocet."</a>";
                        ?>
        </div>
    </div>
</section>
<?php 
include("footer.php")
?>