<?php 
/* Test du modele formations
*/
require_once( "../database.php" );
require_once( "../contact_formations.php" );
require_once( "../formations.php" );
require_once( "../contacts.php" );

openDatabase();

$nFormationId = createFormations( "Formation 11" );
$aContact =[
    'date_contact' => '2021-01-28 18:30:00',
    'email' => 'toto@example.com',
    'nom' => 'Nom 2', 
    'prenom' => 'prenom',
    'telephone' => '06 12345678',
    'adresse' => 'Rue de la source', 
    'code_postal' => '42000', 
    'ville' => 'Sainté', 
    'message' => 'message'
];
$nContactId = createContacts( $aContact );

$aContactFormation = [
    'contact_id' => $nContactId,
    'formation_id' => $nFormationId
];

createContactFormations( $aContactFormation );

$aContactFormations = indexContactFormations();
print_r($aContactFormations);

deleteContactFormations( $aContactFormation );

closeDatabase();