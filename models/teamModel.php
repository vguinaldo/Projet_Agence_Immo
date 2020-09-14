<?php
require("../controller/config.php");

function getTeam()
{
    global $user, $pwd, $dbConnStr;
    $return = array();
    if ($dbConn = oci_connect($user, $pwd, $dbConnStr)) {
        $req = "SELECT agent.id_agent, agence.nom AS agence, agent.nom, agent.prenom, agent.adresse_mail, agent.telephone, agent.salaire, agent.nombre_vente, agent.age, agent.anciennete, nomville AS ville FROM agent JOIN agence ON agent.id_agence = agence.id_agence";

        $stmt = oci_parse($dbConn, $req);
        if (!oci_execute($stmt)) {
            $err = oci_error($stmt);
            trigger_error('Query failed: ' . $err['message'], E_USER_ERROR);
        }

        $aInfo = $aInfos = array();

        while (oci_fetch($stmt)) {
            $aInfo['id'] = oci_result($stmt, 'ID_AGENT');
            $aInfo['agence'] = oci_result($stmt, 'AGENCE');
            $aInfo['nom'] = oci_result($stmt, 'NOM');
            $aInfo['prenom'] = oci_result($stmt, 'PRENOM');
            $aInfo['email'] = oci_result($stmt, 'ADRESSE_MAIL');
            $aInfo['phone'] = oci_result($stmt, 'TELEPHONE');
            $aInfo['salaire'] = oci_result($stmt, 'SALAIRE');
            $aInfo['vente'] = oci_result($stmt, 'NOMBRE_VENTE');
            $aInfo['age'] = oci_result($stmt, 'AGE');
            $aInfo['anciennete'] = oci_result($stmt, 'ANCIENNETE');
            $aInfo['ville'] = oci_result($stmt, 'VILLE');
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