<?php 
require_once('config_db.php');

// Variable globale - conenxion à la base de données
$bdd = null;

// Ouverture de la base de données
function openDatabase() 
{   // utilisation des variables globales
    global $bdd;
    global $mysql_host;
    global $mysql_db;
    global $mysql_user;
    global $mysql_pwd;

    try {
        // connexion bdd
        $bdd = new PDO( "mysql:host=$mysql_host;dbname=$mysql_db;charset=utf8", $mysql_user, $mysql_pwd );
        // Déclencher une exception en cas d'erreur
        $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch (PDOException $e) {
        // Affichage de l'erreur
        print( "Erreur: " . $e->getMessage() );
        exit(1); // Sortie avec erreur car code de sortie différent de 0
    }
}

// Fermeture de la base de données
function closeDatabase()
{
    global $bdd;

    $bdd = null;
}