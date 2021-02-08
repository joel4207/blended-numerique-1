<?php 
/* Test du modele formations
*/
require_once( "../database.php" );
require_once( "../motifs.php" );

openDatabase();
try {
    $nId = createMotifs( true );
}
catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
    echo "Tout va bien la progr defensive est correcte";
}



$nId = createMotifs( "Motif 1" );
updateMotifs( $nId, "Pourquoi faire" );

$nId = createMotifs( "Motif à effacer" );
$aMotif = readMotifs( $nId );
print_r( $aMotif );
deleteMotifs( $nId );

$aMotifs = indexMotifs();
print_r($aMotifs);

closeDatabase();
