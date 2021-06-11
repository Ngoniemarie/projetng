<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Php/Html</title>
</head>
<body>
<?php

$servname = 'localhost';
$dbname = 'mabasephp';
$user = 'root';
$pass = '';



try{
    $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql1 = "INSERT INTO Etudiant(id,Nom,Prenom,Age,class,date_ins)

    VALUES('170','natali','paye','21','1ere','2021-04-19 03:14:07'),
    ('105','lika','tall','22','2nd','2021-06-10 03:14:07')";


    $dbco->exec($sql1);
    echo 'Entrée ajoutée dans la table';

    echo 'ajoue valide';
}
catch(PDOException $e){
  echo "Erreur : " . $e->getMessage();
}
   
?>

</body>

</html>