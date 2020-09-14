<?php
require("../controller/config.php");

function getTenant()
{
    global $user, $pwd, $dbConnStr;
    $return = array();
    if ($dbConn = oci_connect($user, $pwd, $dbConnStr)) {
        $req = "SELECT id_locataire, nom, prenom, adresse_mail, telephone, debut_bail, fin_bail, loyer, bien.adresse AS adresse FROM locataire JOIN bien ON locataire.id_bien = bien.id_bien";

        $stmt = oci_parse($dbConn, $req);
        if (!oci_execute($stmt)) {
            $err = oci_error($stmt);
            trigger_error('Query failed: ' . $err['message'], E_USER_ERROR);
        }

        $aInfo = $aInfos = array();

        while (oci_fetch($stmt)) {
            $aInfo['id'] = oci_result($stmt, 'ID_LOCATAIRE');
            $aInfo['nom'] = oci_result($stmt, 'NOM');
            $aInfo['prenom'] = oci_result($stmt, 'PRENOM');
            $aInfo['email'] = oci_result($stmt, 'ADRESSE_MAIL');
            $aInfo['telephone'] = oci_result($stmt, 'TELEPHONE');
            $aInfo['debut_bail'] = oci_result($stmt, "DEBUT_BAIL");
            $aInfo['fin_bail'] = oci_result($stmt, "FIN_BAIL");
            $aInfo['loyer'] = oci_result($stmt, 'LOYER');
            $aInfo['adresse'] = oci_result($stmt, 'ADRESSE');
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