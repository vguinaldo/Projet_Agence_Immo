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

function setTeam($var)
{
    global $user, $pwd, $dbConnStr;

    if ($dbConn = oci_connect($user, $pwd, $dbConnStr)) {
        if ($var['firstname'] && $var['lastname'] && $var['salaire'] && $var['agence'] && $var['email'] && $var['phone']) {
            $firstname = $var['firstname'];
            $lastname = $var['lastname'];
            $salaire = $var['salaire'];
            $agence = $var['agence'];
            $email = $var['email'];
            $phone = $var['phone'];
        $req ="";
//            $req = "INSERT INTO AGENT (NOM, PRENOM, ADRESSE_MAIL, TELEPHONE, SALAIRE, NOMBRE_VENTE, AGE, ANCIENNETE, MDP) VALUES ('$lastname', '$firstname', '$email', '$phone', '$salaire', 0, 0, 0, '$lastname')";
            // La requête ne va pas marcher parce qu'il va falloir récupérer le nombre d'agents et l'incrémenter de un, et il faut récupérer l'id de l'agence de l'agent que l'on souhaite ajouter.

        $stmt = oci_parse($dbConn, $req);
        if (!oci_execute($stmt)) {
            $err = oci_error($stmt);
            trigger_error('Query failed: ' . $err['message'], E_USER_ERROR);
        }

        oci_free_statement($stmt);
        oci_close($dbConn);
        }
    } else {
        $err = oci_error();
        trigger_error('Could not establish a connection ' . $err['message'], E_USER_ERROR);
    }
}

function getAgence()
{
    global $user, $pwd, $dbConnStr;
    $return = array();
    if ($dbConn = oci_connect($user, $pwd, $dbConnStr)) {
        $req = "SELECT * FROM agence";

        $stmt = oci_parse($dbConn, $req);
        if (!oci_execute($stmt)) {
            $err = oci_error($stmt);
            trigger_error('Query failed: ' . $err['message'], E_USER_ERROR);
        }

        $aInfo = $aInfos = array();

        while (oci_fetch($stmt)) {
            $aInfo['id'] = oci_result($stmt, 'ID_AGENCE');
            $aInfo['nom'] = oci_result($stmt, 'NOM');
            $aInfo['ville'] = oci_result($stmt, 'NOMVILLE');
            $aInfo['code_postal'] = oci_result($stmt, 'ZIPCODE');
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