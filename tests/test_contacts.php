<?php 
/* Test du modele contacts
*/
require_once( "../database.php" );
require_once( "../contacts.php" );

openDatabase();


$aContact =[
    'date_contact' => '2021-01-28 18:30:00',
    'email' => 'toto@example.com',
    'nom' => 'Nom', 
    'prenom' => 'prenom',
    'telephone' => '06 12345678',
    'adresse' => 'Rue de la source', 
    'code_postal' => '42000', 
    'ville' => 'Sainté', 
    'contact_message' => 'message'
];


$nId = createContacts( $aContact );
$aContact['contact_message'] = 'message modifié';
updateContacts( $nId, $aContact );

$aContact =[
    'date_contact' => '2021-01-28 18:30:00',
    'email' => 'toto@example.com',
    'nom' => 'Contact à effacer', 
    'prenom' => 'prenom',
    'telephone' => '06 12345678',
    'adresse' => 'Rue de la source', 
    'code_postal' => '42000', 
    'ville' => 'Sainté', 
    'contact_message' => 'message'
];

$nId = createContacts( $aContact );
$aContact = readContacts( $nId );
print_r( $aContact );
deleteContacts( $nId );

$aContacts = indexContacts();
print_r($aContacts);

closeDatabase();