<?php

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "moduleconnexion";

    $sql = mysqli_connect($servername, $username, $password, $dbname);
    $checklogin = mysqli_query($sql, "SELECT login FROM utilisateurs WHERE login='$login'");

        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];


            if (!empty($login) && !empty($nom) && !empty($prenom) && !empty($password) && !empty($confirm_password)){
                $query = "INSERT INTO utilisateurs(login, prenom, nom, password) 
                VALUES ('$login', '$prenom', '$nom', '$password')";
                
                if ($password != $confirm_password) {
                    $wrongpass = "le mot de passe n'est pas le meme YALAHMAR<br>";
                }

                elseif (mysqli_num_rows($checklogin) != 0) {
                    $existe =  "Le Pseudo est deja  utiliser";
                }

                elseif (mysqli_query($sql, $query)) {
                    echo "Bienvenue $prenom";
                }

            }
            else {
                $remplissez = "Remplissez le formulaire YALAHMAR<br>";
            }
            
            
        }
        

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Good Vibes</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background-color: #090535;
            color: white;
            font-family: 'Archivo', cursive, sans-serif;
            padding: 0 100px;
        }
        header div h1{
            font-family: 'Pacifico', cursive, sans-serif;
            margin: 0;
        }
        a{
            text-decoration: none;
            color: inherit;
        }
        header{
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 10px;
        }
        main section div p{
            width: 400px;
            margin-top: 30px;
            letter-spacing: 2px
        }
        main section div h1{
            font-size: 50px;
        }

        img{
            width: 450px;
        }
        section div form{
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
        }
        section div h3{
            text-align: center;
            color: red;
        }
        nav a{
            margin: 0 15px;
        }
        main{
            padding: 100px 0;
        }
        footer{
            text-align: center;
        }
        form input{
            background: none;
            border: 1px solid white;
            width: 250px;
            height: 30px;
            color: white;
            padding: 0 20px;
            margin: 8px;
            outline: none;
        }
        form input:focus{
            box-shadow: 0px 0px 10px 2px rgba(255,255,255,1);
            border: 0 solid white;
            width: 280px;
            height: 32px;
        }
        input::placeholder {
            color: white;
            font-weight: lighter;
        }
        input[type="submit"]{
            cursor:pointer;
            width: 100px
        }
        input[type="submit"]:hover{
            background-color: white;
            color: black; 
        }
        input[type="submit"]:focus{
            width: 100px
        }
    
    
    </style>
</head>
<body>
    <header>
        <div>
            <h1>VIBES</h1>
        </div>
        <nav>
            <a href="">Inscription</a>
            <a href="">Connexion</a>
        </nav>
    </header>
    <main>
        <section>
            <div>
            <h3>
                <?php echo $remplissez ?>
                <?php echo $wrongpass ?>
                <?php echo $existe ?>
            </h3>
                <form action="" method="POST">

                    <label for="login"></label>
                    <input type="text" name="login" id="login" placeholder="Username">
                    <br>
                    <label for="nom"></label>
                    <input type="text" name="nom" id="nom" placeholder="Nom">
                    <br>
                    <label for="prenom"></label>
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom">
                    <br>
                    <label for="password"></label>
                    <input type="password" name="password" id="password" placeholder="Mot de passe">
                    <br>
                    <label for="confirm_password"></label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirmer le mot de passe">
                    <br>
                    <input type="submit" name="submit" value="VALIDER">
                </form>
                </div>
        </section>
    
    </main>
    <footer>
        <div>
            <p>Copyright 2020 All rights reserved - Samy & Morad</p>
        </div>
    </footer>
</body>
</html>