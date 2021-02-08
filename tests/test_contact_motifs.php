<?php 
/* Test du modele formations
*/
require_once( "../database.php" );
require_once( "../contact_motifs.php" );
require_once( "../motifs.php" );
require_once( "../contacts.php" );

openDatabase();

$nMotifId = createMotifs( "Motif 11" );

$aContact =[
    'date_contact' => '2021-01-28 18:30:00',
    'email' => 'toto@example.com',
    'nom' => 'Nom 3', 
    'prenom' => 'prenom',
    'telephone' => '06 12345678',
    'adresse' => 'Rue de la source', 
    'code_postal' => '42000', 
    'ville' => 'Sainté', 
    'message' => 'message'
];
$nContactId = createContacts( $aContact );

$aContactMotif = [
    'contact_id' => $nContactId,
    'motif_id' => $nMotifId
];

createContactMotifs( $aContactMotif );

$aContactMotifs = indexContactMotifs();
print_r($aContactMotifs);

deleteContactMotifs( $aContactMotif );

closeDatabase();