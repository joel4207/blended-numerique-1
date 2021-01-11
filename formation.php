<?php 

$mysql_host = 'localhost';
$mysql_db = 'blended';
$mysql_user = 'blended';
$mysql_pwd = 'blended';

try {
    // connexion bdd
    $bdd = new PDO( "mysql:host=$mysql_host;dbname=$mysql_db", $mysql_user, $mysql_pwd );
    $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
 
    //requete sql
//    $bdd->query("INSERT INTO formations (formation_id, formation) VALUES (NULL, 'toto')");
//    $bdd->query("DELETE FROM formations WHERE formation_id = 6");
//    $bdd->query("UPDATE formations SET formation = 'tata' WHERE formation_id = 7");
  
    $requete = "SELECT * FROM formations";
    foreach( $bdd->query( $requete, PDO::FETCH_ASSOC ) as $row ) {
        print_r($row);
    }

}
catch (PDOException $e) {
    // traitement des erreurs
    print "Erreur: " . $e->getMessage();
    exit(1);
}

$bdd = null; //fermeture connexion