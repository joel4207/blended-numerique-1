<?php

function formulaireView( $aMotifs, $aFormations )
{
    $sPartDebut = <<<'EOD'
<!doctype html>
<html>
    <head>   
        <meta charset="utf-8">
        <style>h1{text-align:center;color:blue}</style>
        <title>Contact - Blended Numérique</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h1>Formulaire de contact</h1>
        <form method="post" action="test_contactform.php">
            <table border="0">
            <tr>    
                <td align="left">Adresse mail</td>
                <td align="left"><input type ="text" name ="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}"></td>
            </tr>
            <tr>
                <td align="left">Nom</td>
                <td align="left"><input type="text" name="nom"></td>
            </tr>
            <tr>
                <td align="left">Prénom</td>
                <td align="left"><input type="text" name="prenom"></td>
            </tr>
            <tr>
                <td align="left">Téléphone</td>
                <td align="left"><input type ="text" name ="tel"></td>
            </tr>
            <tr>   
                <td align="left">Adresse</td>
                <td align="left"><input type="text" name="adresse"></td>
            </tr>
            <tr>   
                <td align="left">Code postal</td>
                <td align="left"><input type="text" name="codepostal"></td>
            </tr>
            <tr>   
                <td align="left">Ville</td>
                <td align="left"><input type="text" name="ville"></td>
            </tr> 
            <tr>
                <td></td>
            </tr>
EOD;

    $sPartFin = <<<'EOD'
            <tr>
                <td><label for ="messages">Message :</label></td>
                <td><textarea name ="message" id="message" cols="50" rows="10"></textarea></td>
            </tr>
            <tr>
                <td><input type ="submit" value="valider"> </td>
            </tr>
            </table>
        </form>
    </body>
</html>
EOD;

    $sOptionsMotifs = getOptionsMotifs( $aMotifs );
    $sOptionsFormations = getOptionsFormations( $aFormations );

    return( $sPartDebut . $sOptionsMotifs . $sOptionsFormations . $sPartFin );
}

function getOptionsMotifs( $aMotifs )
{
    $sOptionsMotifs = "";
    $nLigne = 1;

    foreach( $aMotifs as $aMotif ) {
        if ( $nLigne==1 ) {
            $sLabelMotif = "<label>Motif:</label>";
        } else {
            $sLabelMotif = "";
        }

        $sOptionsMotifs .= '
                    <tr>
                    <td>'.$sLabelMotif.'</td>
                    <td><input type="checkbox" id="motif" name ="motif[]" value="'.$aMotif['motif_id'].'">&nbsp;'.$aMotif['motif'].'</td>
                    </tr>'.PHP_EOL;  
        $nLigne++;  
    }

    $sOptionsMotifs .= <<<'EOD'
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
EOD;

    return( $sOptionsMotifs );
}

function getOptionsFormations( $aFormations )
{

    $sOptionsFormations = "";
    $nLigne = 1;
    foreach ($aFormations as $aFormation) {

        if ( $nLigne == 1 ) {
            $sLabelFormations = "<label>Formations:</label>";
        } else {
            $sLabelFormations = "";
        }

        $sOptionsFormations .= '
        <tr>
            <td>'.$sLabelFormations.'</td>
            <td><input type="checkbox" id="formation" name ="formation[]" value="'.$aFormation['formation_id'].'">&nbsp;'.$aFormation['formation'].'</td>
        </tr>';

    $nLigne++;
    }

    return( $sOptionsFormations );    
}
