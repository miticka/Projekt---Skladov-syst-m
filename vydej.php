<?php
include("header.php");
include("database.php");
include("filter_header.php");
$_SESSION["action"]="vydej";
?>

        <section class="mainpage">
            <div class="vydej"><h1>Výdej zboží</h1></div>
            <div class="top">
                <div>
                    <form method="get" action="vydej.php">
                        <input name="search" type="search" placeholder="Vyhledat zboží..." class="vyhledavac" <?php echo "value='".$_SESSION["search"]."'" ?>> 
                        <label for="filtr">Filtr:</label>
                        <select id="filtr" name="filtr" class="filtr">
                            <option value="Všechno" <?php if($_SESSION["filtr"]=="Všechno") echo " selected"?>>Všechno</option>
                            <option value="Skladem" <?php if($_SESSION["filtr"]=="Skladem") echo " selected"?>>Skladem</option>
                            <option value="Není skladem" <?php if($_SESSION["filtr"]=="Není skladem") echo " selected"?>>Není skladem</option>
                        </select>
                        <label for="kate">Podle kategorie: </label>
                        <select name="kategorie">
                            <option>Všechno</option>
                        <?php 
                        $sql="SELECT * FROM kategorie";
                        $result=mysqli_query($conn,$sql);

                        if(mysqli_num_rows($result)>0)
                            while($row=mysqli_fetch_assoc($result))
                            {echo"<option";
                        if($_SESSION["kategorie"]==$row["nazev"])
                          echo " selected";
                        
                        echo">".$row['nazev']."</option>";}
                        ?>
                        </select>
                        <button class="vyhledej" type="submit">🔍Vyhledat</button>
                    </form>
                </div>
                <div class='pagination'>
                    Stránka:
                        <?php 
                        $search=$_SESSION["search"];
                        $kategorie=$_SESSION["kategorie"];
                        $filtr=$_SESSION["filtr"];
                        $page=$_SESSION["page"];
                        $off=((int)$page-1)*10;

                        $sql="SELECT * FROM produkty WHERE 1 ";
                        if($search!="")
                            $sql=$sql." AND Název LIKE '%$search%' ";
                        if($kategorie!="")
                            $sql=$sql." AND Kategorie='$kategorie'";
                        if($filtr=="Skladem")
                            $sql=$sql." AND Množství > 0 ";
                        else if($filtr=="Není skladem")
                            $sql=$sql." AND Množství = 0 ";
                        $result=mysqli_query($conn,$sql);
                        $pocet=ceil(mysqli_num_rows($result)/10);

                        $i=$_SESSION["page"];
                        $a=1;

                        while($a<=$pocet)
                        {   
                            echo"<a href=".$_SESSION["action"].".php?page=".$a."&search=".$search."&filtr=".$filtr."&kategorie=".$kategorie;
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
            
            <table class="akce">
                    <tr>
                        <th>EAN</th>
                        <th>PLU</th>
                        <th>Stav</th>
                        <th>Název</th>
                        <th>Na skladě</th>
                        <th>Prodáno</th>
                        <th>Akce</th>
                    </tr>
            <?php 
            $page=$_SESSION["page"];
            $off=($page-1)*10;
            $search=$_SESSION["search"];
            $filtr=$_SESSION["filtr"];
            $kategorie=$_SESSION["kategorie"];

            $sql="SELECT * FROM produkty WHERE 1 ";
            if($search!="")
                $sql=$sql." AND Název LIKE '%$search%' ";
            if($kategorie!="")
                $sql=$sql." AND Kategorie='$kategorie'";
            if($filtr=="Skladem")
                $sql=$sql." AND Množství > 0 ";
            else if($filtr=="Není skladem")
                $sql=$sql." AND Množství = 0 ";
            $sql=$sql." LIMIT 10 OFFSET $off";
            $result=mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)> 0)
            {
                while($row=mysqli_fetch_assoc($result))
                    {
                        
                        echo"
                        <tr class='row'>";
                        if($row["EAN"]==0)
                            echo"<td class='ean'></td>";
                        else
                        echo "<td class='ean'>".$row["EAN"]."</td>";
                        if($row["PLU"]==0)
                            echo"<td class='plu'></td>";
                        else
                        echo"<td class='plu'>".$row["PLU"]."</td>";
                        
                        if($row["Množství"]>0)
                            echo"<td class='stav'>🟢 Skladem</td>";
                        else
                            echo"<td class='stav'>🔴 Není skladem</td>";

                        echo"
                        <td class='nazev2'><a href='produkt.php?id=".$row["ID"]."'>".$row["Název"]."</a></td>
                        <td class='mnozstvi'>".$row["Množství"]." ";
                        if($row["Jednotka"]=="Kus")
                            echo"Ks";
                        else
                            echo $row["Jednotka"]."</td>";
                        echo
                        "<td class='prodano'>".$row["Prodáno"]." ";

                        if($row["Jednotka"]=="Kus")
                            echo"Ks"."</td>";
                        else
                            echo $row["Jednotka"]."</td>";
                        echo"
                        <td>
                            <form method='post' action='vydej_update.php'>
                            <label>Výdej: </label>
                            <input type='number' class='cislo' name='product_".$row["ID"]."'>
                            ";

                            if($row["Jednotka"]=="Kus")
                                echo"Ks";
                            else
                                echo $row["Jednotka"];
                            $_SESSION["mnozstvi"]=$row["Množství"];
                            echo"
                            <button class='nasklad' name='heslo' type='submit' value='".$row["ID"]."'>Proveď</button>
                            </form>
                        </td>
                        </tr>";
                    }
            }
            else
                echo"<div>Produkt nenalezen.</div>";
            ?>
            </table>
            <div class="footer">
                <div class='pagination'>
                    Stránka:
                        <?php 
                        $search=$_SESSION["search"];
                        $kategorie=$_SESSION["kategorie"];
                        $filtr=$_SESSION["filtr"];
                        $page=$_SESSION["page"];
                        $off=((int)$page-1)*10;

                        $sql="SELECT * FROM produkty WHERE 1 ";
                        if($search!="")
                            $sql=$sql." AND Název LIKE '%$search%' ";
                        if($kategorie!="")
                            $sql=$sql." AND Kategorie='$kategorie'";
                        if($filtr=="Skladem")
                            $sql=$sql." AND Množství > 0 ";
                        else if($filtr=="Není skladem")
                            $sql=$sql." AND Množství = 0 ";
                        $result=mysqli_query($conn,$sql);
                        $pocet=ceil(mysqli_num_rows($result)/10);

                        $i=$_SESSION["page"];
                        $a=1;

                        while($a<=$pocet)
                        {   
                            echo"<a href=".$_SESSION["action"].".php?page=".$a."&search=".$search."&filtr=".$filtr."&kategorie=".$kategorie;
                            if($a==$i)
                                {echo" class='page'";}
                            echo">".$a."</a>";
                            $a++;
                            }
                        if($a<$pocet &&$a)
                            echo"<a href=".$_SESSION["action"].".php?page=".$pocet." class='page'>".$pocet."</a>";
                        ?>
            </div>
        </section>

<?php
include("footer.php");

if($_SESSION["zprava"]!="")
        echo '<script>alert("'.$_SESSION["zprava"].'")</script>';
    $_SESSION["zprava"]="";
?>