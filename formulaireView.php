<?php

function formulaireView( $aMotifs, $aFormations )
{
    $sPart1 = <<<'EOD'
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

    $sPart2 = <<<'EOD'
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

    return( $sPart1 . $sOptionsMotifs . $sOptionsFormations . $sPart2 );
}

function getOptionsMotifs( $aMotifs )
{
    $sOptionsMotifs = <<<'EOD'
                <tr>
                    <td><label>Motif:</label></td>
                    <td><input type ="checkbox" id= "motif" name ="motif[]" value="motif1">Prendre rendez-vous avec le coordinateur</td>
                </tr>    
                <tr>
                    <td></td>
                    <td><input type ="checkbox" id= "motif" name ="motif[]" value="motif2">Demande d'information</td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type ="checkbox" id= "motif" name ="motif[]" value="motif3">Pré-inscription</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
EOD;
    return( $sOptionsMotifs );
}

function getOptionsFormations( $aFormations )
{
    $sOptionsFormations = <<<'EOD'
                <tr>
                    <td><label>Formations:</label></td>
                    <td><input type ="checkbox" id= "formation" name ="formation[]" value="dwwm">DWWM - Développeur Web et Web Mobile</td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type ="checkbox" id= "formation" name ="formation[]" value="dw">DW - Designer Web</td>
                </tr>
                <tr>
                    <td></td>                
                    <td><input type ="checkbox" id= "formation" name ="formation[]" value="tssr">TSSR - Technicien Supérieur Sytèmes et Réseaux</td>
                </tr>
                <tr>
                    <td></td>                
                    <td><input type ="checkbox" id= "formation" name ="formation[]" value="tai">TAI - Technicien Assistance Informatique</td>
                </tr>
EOD;

    return( $sOptionsFormations );    
}
