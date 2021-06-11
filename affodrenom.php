<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Trie oder name</title>
</head>
<body>

<?php

include("connexion.php");
echo "<table style='boder: solid 1px black;'>";

echo "<tr>
<th>nom</th> <th>prenom</th> <th>age</th> <th>classe</th>
</tr>";

class TableRows extends RecursiveIteratorIterator { 
  function __construct($it) { 
    parent::__construct($it, self::LEAVES_ONLY); 
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() { 
    echo "<tr>"; 
  } 

  function endChildren() { 
    echo "</tr>" . "\n";
  } 
} 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mabasephp";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $req = $conn->prepare("SELECT nom, prenom, age, class FROM etudiant ORDER BY nom"); 
  $req->execute();

  // set the resulting array to associative
  $result = $req->setFetchMode(PDO::FETCH_ASSOC); 
  foreach(new TableRows(new RecursiveArrayIterator($req->fetchAll())) as $k=>$v) { 
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}


echo "</table>";

?>
</body>
</html>