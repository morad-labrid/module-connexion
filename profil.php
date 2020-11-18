<<<<<<< HEAD


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
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
            transition:0.5s;
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
    <?php
=======
<?php
>>>>>>> profil.php

session_start();
if (!isset($_SESSION['login'])) {
    header("Refresh: 3; url=connexion.php");
    echo "<p>Tu dois te connecter pour accéder à ton profil.</p><br><p>Redirection en cours, retour à la page d'accueil...</p>";
    exit(0);
}
$login = $_SESSION['login'];
<<<<<<< HEAD
$sql = mysqli_connect('localhost', 'root', 'root', 'moduleconnexion');
        
    if (!$sql) {
            echo "Erreur connexion";
            exit(0);
    }else {
            echo "<h1>Bienvenue sur ton profil $login</h1><br>";
    }

$req = mysqli_query($sql, "SELECT * FROM utilisateurs WHERE login='$login'");
$info = mysqli_fetch_assoc($req);
$prenom = $info['prenom'];
$nom = $info['nom'];
$password = $info['password'];

echo "Ton login est: $login<br>";
echo "Ton Prénom est: $prenom<br>";
echo "Ton Nom est: $nom<br>";
echo "Ton Mot de passe est: $password<br>";

    if (isset($_POST['modifier'])) {
        $modification =    "Pour modifier le Login cliquer <input type=\"submit\" name=\"modifierlogin\" value=\"ici\"><br>
                            Pour modifier le Nom cliquer <input type=\"submit\" name=\"modifiernom\" value=\"ici\"><br>
                            Pour modifier le Prénom cliquer <input type=\"submit\" name=\"modifierprenom\" value=\"ici\"><br>
                            Pour modifier le Mot de passe cliquer <input type=\"submit\" name=\"modifierpass\" value=\"ici\"><br>
        
        
        
        ";
    }

    // Début de chagement de l'ancien login
    if (isset($_POST['modifierlogin'])) { // si l'utilisateurs appuis sur modifier le Login ca affichera le fomulaire pour changer le Login
        $formNewLogin = "
            <form method=\"post\">
            <input type=\"text\" name=\"newlogin\" id=\"login\" placeholder=\"Entrer un nouveau login\">
            <input type=\"submit\" name=\"submitnewlogin\" value=\"valider\">
            </form>";
    }

    if (isset($_POST['submitnewlogin'])) { // si l'utilisateur appuis sur valider (submitnewlogin)
        $newLogin = $_POST['newlogin'];
        $checklogin = mysqli_query($sql, "SELECT login FROM utilisateurs WHERE login='$login'");
        
        if (!empty($newLogin) !== false) { // si le formulaire est vide s'affichera un message erreur
            $query = "UPDATE utilisateurs SET login='" . htmlentities($_POST['newlogin']) . "' WHERE login='$login'";

            if ($login == $newLogin) {
                $same = "utiliser un login différent que $login !!<br>";
            }
            
            elseif (mysqli_num_rows($checklogin) != 0) {
                $existe = "Le login que vous avez saisi est déjà utilisé par un autre utilisateur<br>veuillez indiquer un autre Login :)";
            }
            
            elseif (mysqli_query($sql, $query)) {
                $valide = "vous avez bien modifié '$login' à '$newLogin' <br>";
                header("Refresh:5"); 
            }
            
        }else {
            $vide = "Remplissez le formulaire SVP !!<br>";
        }
    }
    // Fin de chagement de l'ancien login
    
    
    /////////////////////////////////////////
    /////////////////////////////////////////
    
    
    // Début de chagement de l'ancien Nom

    if (isset($_POST['modifiernom'])) { // si l'utilisateurs appuis sur modifier le Nom s'affichera le fomulaire pour changer le Nom
        $formNewNom = '
            <form method="post">
            <input type="text" name="newnom" id="nom" placeholder="Entrer un nouveau Nom">
            <input type="submit" name="submitnewnom" value="valider">
            </form>';
            $newNom = $_POST['newnom'];
    }

    if (isset($_POST['submitnewnom'])) { // si l'utilisateur appuis sur valider (submitnewnom)
        $newNom = $_POST['newnom'];

        if (!empty($newNom)) { // si le formulaire est vide s'affichera un message erreur
            $query = "UPDATE utilisateurs SET nom='" . htmlentities($_POST['newnom']) . "' WHERE login='$login'";

            if (mysqli_query($sql, $query)) {
                $valide = "vous avez bien modifier votre nom($nom) à ($newNom)";
                header("Refresh:5");
            }
            
        }else {
            $vide = "Remplissez le formulaire SVP !!<br>";
        }
    }
    // Fin de chagement de l'ancien Nom
    
    
    /////////////////////////////////////////
    /////////////////////////////////////////
    
    
    // Début de chagement de l'ancien Prénom

    if (isset($_POST['modifierprenom'])) { // si l'utilisateurs appuis sur modifier le Prénom ca affichera le fomulaire pour changer le Prénom
        $formNewPrenom = "
            <form method=\"post\">
            <input type=\"text\" name=\"newprenom\" id=\"nom\" placeholder=\"Entrer un nouveau Prénom\">
            <input type=\"submit\" name=\"submitnewprenom\" value=\"valider\">
            </form>
        ";
    }

    if (isset($_POST['submitnewprenom'])) { // si l'utilisateur appuis sur valider (submitnewprenom)
        $newPrenom = $_POST['newprenom'];

        if (!empty($newPrenom)) { // si le formulaire est vide s'affichera un message erreur
            $query = "UPDATE utilisateurs SET prenom='" . htmlentities($_POST['newprenom']) . "' WHERE login='$login'";

            if (mysqli_query($sql, $query)) {
                $valide = "vous avez bien modifier votre prénom($prenom) à ($newPrenom)";
                header("Refresh:5"); 
            }
            
        }else {
            $vide = "Remplissez le formulaire SVP !!<br>";
        }
    }
    // Fin de chagement de l'ancien Prénom
    
    
    /////////////////////////////////////////
    /////////////////////////////////////////
    
    
    // Début de chagement de l'ancien Mot de passe

    if (isset($_POST['modifierpass'])) { // si l'utilisateurs appuis sur modifier le Password ca affichera le fomulaire pour changer le Password
        $formNewPass = "
            <form method=\"post\">
            <input type=\"text\" name=\"pass\" id=\"nom\" placeholder=\"Entrer l'ancien Password\"><br>
            <input type=\"text\" name=\"newpass\" id=\"nom\" placeholder=\"Entrer un nouveau Password\"><br>
            <input type=\"text\" name=\"confirmnewpass\" id=\"nom\" placeholder=\"Confirmer le nouveau Password\"><br>
            <input type=\"submit\" name=\"submitnewpass\" value=\"valider\">
            </form>
        ";
    }

    if (isset($_POST['submitnewpass'])) {
        $newpassword = $_POST['newpass'];
        $confirm_password = $_POST['confirmnewpass'];
        
        if (!empty($_POST['pass']) && !empty($_POST['newpass']) && !empty($_POST['confirmnewpass'])) {
            $query = "UPDATE utilisateurs SET password='" . htmlentities($_POST['newpass']) . "' WHERE login='$login'";
    if ($_POST['pass'] == $password) {
        if ($_POST['newpass'] != $_POST['confirmnewpass']) {
            $same = "le mot de passe n'est pas le même !!<br>";
        }
        
        elseif (mysqli_query($sql, $query)) {
            echo "Le mot de passe a bien été changé";
            header("Refresh:5"); 
        }
    }else {
        $wrong = "Le mot de passe que vous avez inseré n'est pas correct";
    }
            
    
        } else {
            $vide = "Remplissez le formulaire SVP !!<br>";
        }
    
    }
    // Fin de chagement de l'ancien Mot de passe
    /////////////////////////////////////////
    /////////////////////////////////////////
    
    // Pour se déconnecter de la session
    if (isset($_POST['deconnecter'])) {
        session_unset ( );
        header("Refresh:0"); 
    }
    /////////////////////////////////////////
    /////////////////////////////////////////

    if (isset($_POST['supprimer'])) {
        $delete =  'êtes-vous sûr de vouloir supprimer votre compte définitivement?<br>
                    <input type="submit" name="oui" value="oui">
                    <input type="submit" name="non" value="non">
                    ';
        if (isset($_POST['oui'])) {
            # code...
        }
    
    
    
                }

?>
        <form action="" method="post">
        <p>Modifier tes information ici <input type="submit" name="modifier" value="Modifier"></p>
        <p><?php echo $modification ?></p>
        <p><?php echo $formNewLogin ?></p>
        <p><?php echo $formNewNom ?></p>
        <p><?php echo $formNewPrenom ?></p>
        <p><?php echo $formNewPass ?></p>
        <p><?php echo $same ?></p>
        <p><?php echo $existe ?></p>
        <p><?php echo $valide ?></p>
        <p><?php echo $vide ?></p>
        <p><?php echo $wrong ?></p>
        </form>
        <form action="" method="post">
        <input type="submit" name="deconnecter" value="Logout">
        <input type="submit" name="supprimer" value="Supprimer">
        </form>
        <p><?php  echo $delete   ?></p>
    </main>
    <footer>
        <div>
            <p>Copyright 2020 All rights reserved - Samy & Morad</p>
        </div>
    </footer>
</body>
</html>



=======
$mysqli = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
if (!$mysqli) {
    echo "Erreur connexion";
    exit(0);
}

$req = mysqli_query($mysqli, "SELECT * FROM utilisateurs WHERE login='$login'");
$info = mysqli_fetch_assoc($req);
?>


<!DOCTYPE HTML>
<html>
    <head>
		<link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
                <link href="moduleconnexion.css" rel="stylesheet">

        <title>Profil</title>
    </head>
    <body>
        <h1>Profil</h1>
      <p>  Pour modifier tes informations <a href="profil.php?modifier">cliquez ici</a></p>
        <br>
      <p>  Pour supprimer ton compte <a href="profil.php?supprimer">cliquez ici</a></p>
        <br>
      <p>  Pour te déconnecter <a href="profil.php?deconnexion">cliquez ici</a> </p>

        <?php
if (isset($_GET['deconnexion'])) {

    unset($_SESSION['login']);
    header("Refresh: 3; url=index.php");

    echo "<p>Tu es correctement déconnecté du site.</p><br><p>Redirection vers la page d'accueil...</p>";
}

if (isset($_GET['supprimer'])) {
    if ($_GET['supprimer'] != "ok") {
        echo "<p>Tu es sûr de vouloir supprimer ce compte définitivement?</p>
                <br>
                <h2></p><a href='profil.php?supprimer=ok' style='color:red'>OUI</a> <a href='profil.php' style='color:green'>NON</a></h2>";
    } else {
        if (mysqli_query($mysqli, "DELETE FROM utilisateurs WHERE pseudo='$login'")) {
            echo "Ton compte vient d'être supprimé pour toujours.";
            unset($_SESSION['login']);
        } else {
            echo "Il y a une erreur quelque part ...";
        }
    }
}

if (isset($_GET['modifier'])) {
    ?>
            <h1>Modification du profil</h1>
            <p>

                <a href="profil.php?modifier=password">Modifier ton mot de passe</a>
                <br>
                <a href="profil.php?modifier=login">Modifier ton login</a>
                <br>
                <a href="profil.php?modifier=prenom">Modifier ton prenom</a>
                <br>
                <a href="profil.php?modifier=nom">Modifier ton nom</a>

            </p>


            <?php
if ($_GET['modifier'] == "login") {

        if (isset($_POST['valider'])) {

            if (mysqli_query($mysqli, "UPDATE utilisateurs SET login='" . htmlentities($_POST['login'], ENT_QUOTES, "UTF-8") . "' WHERE login='$login'")) {
                echo "<h2Login {$_POST['login']} modifié avec succès!<h2>";
                $resultat = true;
            } else {
                echo "Il y a une erreur, mince !";
            }
        }

        if (!isset($resultat)) {
            ?>
                    <br>
                    <form method="post" action="profil.php?modifier=login">
                     <p>Login</p>   <input type="text" name="login" value="<?php echo $info['login']; ?>" required>
                        <input type="submit" name="valider" value="Valider la modification" class="submit">
                    </form>
                    <?php
}
    } elseif ($_GET['modifier'] == "prenom") {
        if (isset($_POST['valider'])) {
            if (!isset($_POST['prenom'])) {
                echo "Le champ prenom n'est pas reconnu.";
            } else {
                if ($_POST['prenom']) {

                    if (mysqli_query($mysqli, "UPDATE utilisateurs SET prenom='" . htmlentities($_POST['prenom']) . "' WHERE login='$login'")) {
                        echo "<h1>Login {$_POST['prenom']} modifiée avec succès!</h1>";
                        $resultat = true;
                    } else {
                        echo "Il y a une erreur, mince !";
                    }
                }
            }
        }
        if (!isset($resultat)) {
            ?>
                    <br>
                    <form method="post" action="profil.php?modifier=prenom">
                     <p>Prénom</p>   <input type="text" name="prenom" value="<?php echo $info['prenom']; ?>" required>
                        <input type="submit" name="valider" value="Valider la modification" class="submit">
                    </form>
                    <?php
}
    } elseif ($_GET['modifier'] == "nom") {
        if (isset($_POST['valider'])) {
            if (!isset($_POST['nom'])) {
                echo "Le champ nom n'est pas reconnu.";
            } else {
                if ($_POST['nom']) {

                    echo "Le nom semble incorrecte.";

                } else {
                    if (mysqli_query($mysqli, "UPDATE utilisateurs SET nom='" . htmlentities($_POST['nom'], ENT_QUOTES, "UTF-8") . "' WHERE login='$login'")) {
                        echo "{$_POST['prenom']} modifiée avec succès!";
                        $resultat = true;
                    } else {
                        echo "Il y a une erreur, mince !";
                    }
                }
            }
        }
        if (!isset($resultat)) {
            ?>
                    <br>
                    <form method="post" action="profil.php?modifier=nom">
                    <p>Nom</p>    <input type="text" name="nom" value="<?php echo $info['nom']; ?>" required>
                        <input type="submit" name="valider" value="Valider la modification" class="submit">
                    </form>
                    <?php
}
    } elseif ($_GET['modifier'] == "password") {
        echo "<p>Remplis les champs </p>";
        if (isset($_POST['valider'])) {
            if (!isset($_POST['nouveaupassword'], $_POST['confirmerpassword'], $_POST['password'])) {
                echo "Un des champs n'est pas reconnu.";
            } else {
                if ($_POST['nouveaupassword'] != $_POST['confirmerpassword']) {
                    echo "Les mots de passe ne correspondent pas.";
                } else {
                    $password = md5($_POST['password']);
                    $newpassword = md5($_POST['nouveaupassword']);
                    $req = mysqli_query($mysqli, "SELECT * FROM utilisateurs WHERE login='$login' AND password='$password'");

                    if (mysqli_query($mysqli, "UPDATE utilisateurs SET password='$newpassword' WHERE login='$login'")) {
                        echo "<h1>Mot de passe modifié avec succès!	</h1>";
                        $resultat = true;
                    } else {
                        echo "Une erreur est survenue, on essaye de corriger ça!";
                    }

                }
            }
        }
        if (!isset($resultat)) {
            ?>
                    <br>
                    <form method="post" action="profil.php?modifier=password">
                     <p>Ici ton nouveau mot de passe</p>   <input type="password" name="nouveaupassword" placeholder="Nouveau mot de passe..." required>
                      <p>Répète le encore une fois STP</p>  <input type="password" name="confirmerpassword" placeholder="Confirmer nouveau passe..." required>
                     <p>Tu te souviens du mot de passe actuel ?</p>   <input type="password" name="password" placeholder="Ton mot de passe actuel..." required>
                      <br/>  <input type="submit" name="valider" value="Valider la modification" class="submit">
                    </form>
                    <?php
}
    }

}
?>
    </body>
</html>
>>>>>>> profil.php
