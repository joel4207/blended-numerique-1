<?php
require_once('../database.php');
require_once('../motifs.php');
require_once('../formations.php');
require_once('../formulaireView.php');

openDatabase();
$aMotifs = indexMotifs();
$aFormations = indexFormations();
closeDatabase();

$sPageHTML = formulaireView( $aMotifs, $aFormations );
print($sPageHTML);

