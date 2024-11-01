<?php
include_once("ColissimoAPI.php");
include_once("ChronopostAPI.php");
include_once("USPSAPI.php");
include_once("UPSAPI.php");
include_once("FedexAPI.php");
require_once("statuts.php");

function grab_usps_statuses($compte,$noColis)
{
    $colis = new USPSAPI();

    $statuses_found = $colis->getStatus($compte, $noColis);

    if (is_array($statuses_found)) {
        return $statuses_found;
    }
    return false;
}

function grab_ups_statuses($AccessLicenseNumber, $UserId, $Password, $noColis)
{
    $colis = new USPSAPI();

    $statuses_found = $colis->getStatus($AccessLicenseNumber, $UserId, $Password, $noColis);

    if (is_array($statuses_found)) {
        return $statuses_found;
    }
    return false;
}

function grab_fedex_statuses($Accesskey,$AccessPassword,$accoundNumber,$meterNumber, $noColis)
{
    $colis = new FedexAPI();

    $statuses_found = $colis->getStatus($Accesskey, $AccessPassword, $accoundNumber,$meterNumber, $noColis);

    if (is_array($statuses_found)) {
        return $statuses_found;
    }
    return false;
}

function grab_coliposte_statuses($compte, $password, $noColis)
{
    $colis = new ColissimoAPI();

    $statuses_found = $colis->getStatus($compte, $password, $noColis);

    if (is_array($statuses_found)) {
        return $statuses_found;
    }
    return false;
}

function grab_chronopost_statuses($noColis)
{
    $colis = new ChronopostAPI();

    $statuses_found = $colis->getChronopostStatus($noColis);

    if (is_array($statuses_found)) {
        return $statuses_found;
    }
    return false;
}

function interpret_date($date)
{

    $d = substr($date, 8, 2);
    $m = substr($date, 5, 2);
    $y = substr($date, 0, 4);

    $date_livraison = strtotime($y . "-" . $m . "-" . $d);

    return $date_livraison;
}

/*function merci_la_poste($noColis, $statuses_found)
{
 global $status;
 $case= 0;
    // now we treat all statuses found
    if ($statuses_found != "") {
        
     
        // remboursable ou pas?
        if ($status[$statuses_found]['remboursable'] == 'false') {
            $case = 9;
        }
        // encore en transit
        if ($status[$statuses_found]['initial_transit'] == 'true') {
            $case = 5;
        }
        if ($status[$statuses_found]['initial_transit'] == 'false') {
            $case = 1;
        }
    }

    switch ($case) {
        // Cas dans lesquels on a trouvé une date de présentation
        case 1 :
            return 1;
            break;
        // Cas dans lesquels la commande est encore en transit
        case 5 :
            return 5;
            break;
        // Cas dans lesquels la commande n'est pas remboursable
        case 9 :
            // La date
            return 9;
            break;
        // Cas dans lesquels on a pas encore d'info
        default :
            return $status;
            break;
    }
}*/

?>