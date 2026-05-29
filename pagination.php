
<div class='pagination'>
                    Stránka:
                        <?php 
                        $search=$_SESSION["search"];
                        $kategorie=$_SESSION["kategorie"];
                        $filtr=$_SESSION["filtr"];
                        $page=$_SESSION["page"];
                        $off=($page-1)*10;

                        $sql="SELECT * FROM produkty WHERE 1 ";
                        if($search!="")
                            $sql=$sql." AND Název LIKE \'%$search%\' ";
                        if($kategorie!="")
                            $sql=$sql." AND Kategorie=\'$kategorie\'";
                        if($filtr=="Skladem")
                            $sql=$sql." AND Množství > 0 ";
                        else if($filtr=="Není skladem")
                            $sql=$sql." AND Množství = 0 ";
                        $result=mysqli_query($conn,$sql);
                        $pocet=ceil(mysqli_num_rows($result)/10);

                        $i=$_SESSION["page"];
                        $a=1;

                        echo"<a href=".$_SESSION["action"].".php?page=1 ";
                        if($i==1)
                            echo"class=\'page\'";
                        echo"\'>1</a>";
                        while($i<$pocet)
                            {
                                if($a<4)
                                    {   $i++;
                                        echo"<a href=".$_SESSION["action"].".php?page=".$i;
                                        if($i==$a)
                                            echo"class=\'page\'";
                                        echo"
                                        >".$i."</a>";
                                    }
                                $a++;
                            }
                        if($a<$pocet &&$a)
                            echo"<a href=".$_SESSION["action"].".php?page=".$pocet." class=\'page\'>".$pocet."</a>";
                        ?>
                </div>'
