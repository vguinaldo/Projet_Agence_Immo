<?php
require("../controller/config.php");

function getProperty()
{
    global $user, $pwd, $dbConnStr;
    $return = array();
    if ($dbConn = oci_connect($user, $pwd, $dbConnStr)) {
        $req = "SELECT id_bien, type_bien, type_vente, adresse, surface, ville.zipcode as code_postal, ville.nom as ville, nombre_piece, prix FROM bien JOIN ville ON bien.id_ville = ville.id_ville ORDER BY id_bien";

        $stmt = oci_parse($dbConn, $req);
        if (!oci_execute($stmt)) {
            $err = oci_error($stmt);
            trigger_error('Query failed: ' . $err['message'], E_USER_ERROR);
        }

        $aInfo = $aInfos = array();

        while (oci_fetch($stmt)) {
            $aInfo['id'] = oci_result($stmt, 'ID_BIEN');
            $aInfo['type'] = oci_result($stmt, 'TYPE_BIEN');
            $aInfo['categorie'] = oci_result($stmt, 'TYPE_VENTE');
            $aInfo['surface'] = oci_result($stmt, 'SURFACE');
            $aInfo['piece'] = oci_result($stmt, "NOMBRE_PIECE");
            $aInfo['adresse'] = oci_result($stmt, "ADRESSE");
//            $aInfo['adresse'] = "";
            $aInfo['code_postal'] = oci_result($stmt, 'CODE_POSTAL');
            $aInfo['ville'] = oci_result($stmt, 'VILLE');
            $aInfo['prix'] = oci_result($stmt, 'PRIX');
            $aInfos[] = $aInfo;
        }

        $return = $aInfos;

        oci_free_statement($stmt);
        oci_close($dbConn);
    } else {
        $err = oci_error();
        trigger_error('Could not establish a connection ' . $err['message'], E_USER_ERROR);
    }
    return $return;
}

?>