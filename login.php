<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <img src="logo.jpg">
    <div>
        <form method="POST">
            Username: <br>
            <input type="text" name="username"><br>
            Password: <br>
            <input type="password" name="password"><br> <br>
            <button type="submit" name="submit">Log in</button><br>
            <?php
//echo password_hash("admin",PASSWORD_DEFAULT);
if($_SERVER["REQUEST_METHOD"] === "POST")
    { session_start();
        if(empty($_POST["username"]) || empty($_POST["password"]))
            {
                echo"Chybí username nebo heslo";
            }
        else
            {
                include("database.php");
                $username=$_POST["username"];
                $sql="SELECT * FROM uzivatele WHERE username='$username'";
                $result=mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)> 0)
                    {
                    $row=mysqli_fetch_assoc($result);
                    $hash=$row["password"];
                    if(password_verify($_POST["password"],$hash))
                        {
                            
                            $_SESSION["username"]=$_POST["username"];
                            header("Location: index.php");
                            exit;
                        }
                    else
                        {
                            echo"Špatný username nebo heslo";
                        }
                    }
                else
                  echo"Špatný username nebo heslo";
            }
    }
?>
        </form>
    </div>
</body>
</html>

