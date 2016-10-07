<?php include "connexion.php" ?>


<!DOCTYPE html>
<html>
<head>
    <title>Coursives</title>
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
               <ul>
                    <?php
                    //Requête pour récupérer les éléments de la table "typespectacle"
                    $requete="SELECT * FROM typespectacle";
                    $rep=$connexion->query($requete);
                    $info=$rep->fetchAll(PDO::FETCH_OBJ);
                    foreach ($info as $element) {
                        //Récupération pour chaque élément du type et affichage dans un li.
                        echo "<li><a href='#'>".$element->type."</a></li>";
                    }
                    ?>
                </ul>
            </nav>
            <h1><a href="index.php"><img src="img/logo.png" alt="la coursive la rochelle"></a></h1>
            
        </header>
        
        <main>
            
            <h2>La saison</h2>
            
            <section class="fondRouge">
                <form id="triType" method="POST" action="index.php" onload="document.getElementById('triType').submit();" onchange="document.getElementById('triType').submit();">
                    <p><label for="typeS" id="typeS">Catégorie :</label>
                        <select name="typeS" id="typeS">
                            <?php
                            echo '<option value="0" selected="selected"">Tous les spectacles</option>';
                            $requete="SELECT * FROM typespectacle";
                            $rep=$connexion->query($requete);
                            $info=$rep->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($info as $element) {
                                echo "<option value='".$element['idSpec']."'>".$element['type']."</option>";
                            }
                            ?>
                        </select>
                    </p>
                    </form>
                    <ul>
                        <?php
                            $month=array(
                                        1 =>'Janv.',
                                        2 =>'Févr.',
                                        3 => 'Mars',
                                        4 => 'Avr',
                                        5 => 'Mai',
                                        6 => 'Juin',
                                        7 => 'Juill.',
                                        8 => 'Août',
                                        9=> 'Sept.',
                                        10=> 'Oct.',
                                        11 => 'Nov.',
                                        12 => 'Déc.'
                                        );
                            foreach ($month as $key => $element) {
                                echo "<li>".$element."</li>";
                            }
                        ?>
                    </ul>
            </section>
            <?php
                //Requête pour récupérer les éléments de la table "spectacle"
                $requete="SELECT * FROM spectacle";
                $rep=$connexion->query($requete);
                $info=$rep->fetchAll(PDO::FETCH_OBJ);
                echo "<ul>";
                foreach ($info as $element) {
                    //Récupération pour chaque élément et affichage dans un li.
                    echo "<li>";
                    if ($element->plusieursDate == 0) {
                        echo "<p>".$element->date."</p>";
                    }
                    else {
                        echo "<p>A partir de ".$element->date."</p>";
                    }
                    echo "<p><img src='$element->photos' alt='photos' /></p>";
                    echo "<h3>".$element->nom."/".$element->compagnie."</h3>";
                    echo "<h4>".$element->type."</h4>";
                    echo "<p>".$element->description."</p>";
                    echo '<p><a href="spectacle.php?id='.$element->id.'">"<img src="plus.png" alt="plus" /></a></p>'; //Lien avec passage de paramètre de l'ID de l'élément.
                    echo "</li>";
                }
                echo"</ul>";
            
            //Différent test pour le tri mais ne fonctionne pas
            if($_POST["typeS"]=='1') {
                $requete="SELECT * FROM spectacle WHERE type=1";
                $rep=$connexion->query($requete);
                $info=$rep->fetchAll(PDO::FETCH_OBJ);
                echo "<ul>";
                foreach ($info as $element) {
                    echo "<li>";
                    if ($element->plusieursDate == 0) {
                        echo "<p>".$element->date."</p>";
                    }
                    else {
                        echo "<p>A partir de ".$element->date."</p>";
                    }
                    echo "<p class='lesImages'><img src='$element->photos' alt='photos' /></p>";
                    echo "<h3>".$element->nom."/".$element->compagnie."</h3>";
                    echo "<h4>".$element->type."</h4>";
                    echo "<p class='description'>".$element->description."</p>";
                    echo '<p><a href="spectacle.php?id='.$element->id.'">"<img src="plus.png" alt="plus" /></a></p>';
                    echo "</li>";
                }
                echo"</ul>";
            }
            elseif($_POST["typeS"]=='2') {
                $requete="SELECT * FROM spectacle WHERE type=2";
                $rep=$connexion->query($requete);
                $info=$rep->fetchAll(PDO::FETCH_OBJ);
                echo "<ul>";
                foreach ($info as $element) {
                    echo "<li>";
                    if ($element->plusieursDate == 0) {
                        echo "<p>".$element->date."</p>";
                    }
                    else {
                        echo "<p>A partir de ".$element->date."</p>";
                    }
                    echo "<p><img src='$element->photos' alt='photos' /></p>";
                    echo "<h3>".$element->nom."/".$element->compagnie."</h3>";
                    echo "<h4>".$element->type."</h4>";
                    echo "<p>".$element->description."</p>";
                    echo '<p><a href="spectacle.php?id='.$element->id.'">"<img src="plus.png" alt="plus" /></a></p>';
                    echo "</li>";
                }
                echo"</ul>";
            }
            elseif($_POST["typeS"]=='3') {
                $requete="SELECT * FROM spectacle WHERE type=3";
                $rep=$connexion->query($requete);
                $info=$rep->fetchAll(PDO::FETCH_OBJ);
                echo "<ul>";
                foreach ($info as $element) {
                    echo "<li>";
                    if ($element->plusieursDate == 0) {
                        echo "<p>".$element->date."</p>";
                    }
                    else {
                        echo "<p>A partir de ".$element->date."</p>";
                    }
                    echo "<p><img src='$element->photos' alt='photos' /></p>";
                    echo "<h3>".$element->nom."/".$element->compagnie."</h3>";
                    echo "<h4>".$element->type."</h4>";
                    echo "<p>".$element->description."</p>";
                    echo '<p><a href="spectacle.php?id='.$element->id.'">"<img src="plus.png" alt="plus" /></a></p>';
                    echo "</li>";
                }
                echo"</ul>";
            }
            elseif($_POST["typeS"]=='4') {
                $requete="SELECT * FROM spectacle WHERE type=4";
                $rep=$connexion->query($requete);
                $info=$rep->fetchAll(PDO::FETCH_OBJ);
                echo "<ul>";
                foreach ($info as $element) {
                    echo "<li>";
                    if ($element->plusieursDate == 0) {
                        echo "<p>".$element->date."</p>";
                    }
                    else {
                        echo "<p>A partir de ".$element->date."</p>";
                    }
                    echo "<p><img src='$element->photos' alt='photos' /></p>";
                    echo "<h3>".$element->nom."/".$element->compagnie."</h3>";
                    echo "<h4>".$element->type."</h4>";
                    echo "<p>".$element->description."</p>";
                    echo '<p><a href="spectacle.php?id='.$element->id.'">"<img src="plus.png" alt="plus" /></a></p>';
                    echo "</li>";
                }
                echo"</ul>";
            }
            ?>
        </main>
        
        
        
        
        
        
        
        
    </div>



</body>
</html>
