<?php
require("../controller/config.php");

function getOwners()
{
    global $user, $pwd, $dbConnStr;
    $return = array();
    if ($dbConn = oci_connect($user, $pwd, $dbConnStr)) {
        $req = "SELECT id_proprietaire, nom, prenom, adresse_mail, telephone FROM proprietaire";

        $stmt = oci_parse($dbConn, $req);
        if (!oci_execute($stmt)) {
            $err = oci_error($stmt);
            trigger_error('Query failed: ' . $err['message'], E_USER_ERROR);
        }

        $aInfo = $aInfos = array();

        while (oci_fetch($stmt)) {
            $aInfo['id'] = oci_result($stmt, 'ID_PROPRIETAIRE');
            $aInfo['nom'] = oci_result($stmt, 'NOM');
            $aInfo['prenom'] = oci_result($stmt, 'PRENOM');
            $aInfo['email'] = oci_result($stmt, 'ADRESSE_MAIL');
            $aInfo['phone'] = oci_result($stmt, 'TELEPHONE');
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

function deleteOwner($var) {
    global $user, $pwd, $dbConnStr;
    if ($dbConn = oci_connect($user, $pwd, $dbConnStr)) {
        $req = "DELETE FROM PROPRIETAIRE WHERE id = $var";

        $stmt = oci_parse($dbConn, $req);
        if (!oci_execute($stmt)) {
            $err = oci_error($stmt);
            trigger_error('Query failed: ' . $err['message'], E_USER_ERROR);
        }

        oci_free_statement($stmt);
        oci_close($dbConn);
    } else {
        $err = oci_error();
        trigger_error('Could not establish a connection ' . $err['message'], E_USER_ERROR);
    }
}

?>