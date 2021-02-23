<?php
require_once( "../util_check.php" );
require_once( "../motifs.php" );
require_once( "../formations.php" );
require_once( "../database.php" );

print("GET:");
print_r($_GET);
print("<br />");

print("POST:");
var_dump($_POST);
print("<br />");

openDatabase();
$sErrMessage = "";
$bErreur = false;
if ( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL, FILTER_FLAG_EMAIL_UNICODE) == false ) {
    $sErrMessage .= "Email incorrect. ";
    $bErreur = true;
} 

$sNumTel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);
if ( strlen($sNumTel) !=  10 ) {
    $sErrMessage .= "Telephone incorrect. ";
    $bErreur = true;
}

if ( ! checkStr($_POST['nom'], 1, 250) ) {
    $sErrMessage .= "Nom incorrect. ";
    $bErreur = true;
}

if ( ! checkStr($_POST['prenom'], 1, 250) ) {
    $sErrMessage .= "Prenom incorrect. ";
    $bErreur = true;
}

$sNumTel = filter_input(INPUT_POST, 'codepostal', FILTER_SANITIZE_NUMBER_INT);
if ( strlen($sNumTel) !=  5 ) {
    $sErrMessage .= "Code postal incorrect. ";
    $bErreur = true;
}

if ( ! checkStr($_POST['ville'], 1, 250) ) {
    $sErrMessage .= "Ville incorrect. ";
    $bErreur = true;
}

if ( ! checkStr($_POST['message'], 0, 2000) ) {
    $sErrMessage .= "Message incorrect. ";
    $bErreur = true;
}

foreach ($_POST['motif'] as $value) {
    $value = intval($value);
    if ( ! checkId($value) ) {
        $sErrMessage .= "ID motif incorrect. ";
        $bErreur = true;    
    }
    $aMotif = readMotifs( $value );
    if ( ! is_array($aMotif) || empty( $aMotif) ) {
        $sErrMessage .= "ID motif inexistant. ";
        $bErreur = true;    
    }
}

foreach ($_POST['formation'] as $value) {
    $value = intval($value);

    if ( ! checkId($value) ) {
        $sErrMessage .= "ID formation incorrect. ";
        $bErreur = true;    
    }
    $aFormation = readFormations( $value );
    if ( ! is_array($aFormation) || empty( $aFormation) ) {
        $sErrMessage .= "ID formation inexistant. ";
        $bErreur = true;    
    }
}

print( $bErreur . "|" . $sErrMessage );

closeDatabase();

?>
