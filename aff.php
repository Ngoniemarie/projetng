<!DOCTYPE html>
<html>
    <head>
        <title>PHP-MySQL</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Table-Etudiant</h1>  
        <?php
            $servname = "localhost"; $dbname = "mabasephp"; $user = "root"; $pass = "";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                /*Sélectionne toutes les valeurs dans la table etudiant*/
                $sth = $dbco->prepare("SELECT * FROM etudiant");
                $sth->execute();
                
                /*Retourne un tableau associatif pour chaque entrée de notre table
                 *avec le nom des colonnes sélectionnées en clefs*/
                $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
                
                /*print_r permet un affichage lisible des résultats,
                 *<pre> rend le tout un peu plus lisible*/
                echo '<pre>';
                print_r($resultat);
                echo '</pre>';
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>