<?php 
/* Test du modele formations
*/
require_once( "../database.php" );
require_once( "../formations.php" );

openDatabase();

$nId = createFormations( "Formation 1" );
updateFormations( $nId, "DWWM" );

$nId = createFormations( "Formation à effacer" );
$aFormation = readFormations( $nId );
print_r( $aFormation );
deleteFormations( $nId );

$aFormations = indexFormations();
print_r($aFormations);

closeDatabase();