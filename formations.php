<?php 
/* Modèle formations v1 - Sans gestion des erreurs et avec faille de sécurité !!!
*/

// Create - creation nouvelle formation
function createFormations( $formation ) 
{
    global $bdd;

    $bdd->query( "INSERT INTO formations (formation_id, formation) VALUES (NULL, '$formation')" );

    return( $bdd->lastInsertId() );
}

// Read - lecture d'une formation
function readFormations( $formation_id ) 
{
    global $bdd;
     
    $requete = "SELECT * FROM formations WHERE formation_id = $formation_id"; 

    $stmt = $bdd->query( $requete, PDO::FETCH_ASSOC );
    $aFormation = $stmt->fetch();   // recuperer un seul enregistrement

    return($aFormation);
}
    
// Update - modification d'une formation
function updateFormations( $formation_id, $formation ) 
{
    global $bdd;

    $bdd->query("UPDATE formations SET formation = '$formation' WHERE formation_id = $formation_id");
}

// Delete - effacement d'une formation
function deleteFormations( $formation_id ) 
{
    global $bdd;

    $bdd->query("DELETE FROM formations WHERE formation_id = $formation_id");
}

// Liste de toutes les formations
function indexFormations() 
{
    global $bdd;

    $requete = "SELECT * FROM formations";

    $stmt = $bdd->query( $requete, PDO::FETCH_ASSOC );
    $aFormations = $stmt->fetchAll();   // Récupération de toutes les lignes

    return( $aFormations );
}
        
