<?php include "connexion.php" ?>
<?php setcookie('$_GET["id"]', 'spectacle', time() + 365*24*3600); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Untitled Document</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="wrap">
        
        
        <header>
            <nav>
                <!-- A completer -->
            </nav>
            <h1><a href="index.html"><img src="img/logo.png" alt="la coursive la rochelle"></a></h1>
            
        </header>
        
        <main>
            <?php
            //Requête pour récupérer les éléments de la table "spectacle" correspondant à l'ID envoyé en paramètre 
            $id = $_GET["id"];
            $requete="SELECT * FROM spectacle WHERE id=$id";
            $rep=$connexion->query($requete);
            $info=$rep->fetchAll(PDO::FETCH_OBJ);
            foreach ($info as $element) {
            echo "<h2>".$element->nom."/".$element->compagnie."</h2>";
            echo "<section class='lesImages'>";
            echo "<p class='grande'><img src='$element->photos' alt='photos' /></p>";
            echo "<ul>";
            //Affichage de toutes les images d'un dossier
            $dossier = "/images/";
            $images = glob($dossier."*.png");
            foreach($images as $image) {
                echo '<li><img src="'.$image.'" /></li>';
            }
            echo "<p class='description'>Description</p>";
            echo "<p>".$element->description."</p>";
            }
            ?>
        </main>
        
        
        
        
        
        
        
        
    </div>



</body>
</html>
