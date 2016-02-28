<?php
/**
* MesFlux controleur for RSS Feed
* 
* PHP version 5
*
* @category Controleur
* @package  Non_Non_Non
* @author   Frey Pauline <pauline1.frey@epitech.eu>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.nononon.com
*/
session_start();

require dirname(__FILE__)."/../view/head.php";
require dirname(__FILE__)."/../view/nav.php";


if (isset($_SESSION['login'])) {

    include dirname(__FILE__).'/../model/flux.php';
    $flux = new Flux;

    $fluxUser = $flux->select($_SESSION['id'], 0);

    if (isset($_POST['ajouter'])) {
        if ((!empty($_POST['url']) && $_POST['url'] !=="") && (!empty($_POST['nom']) && $_POST['nom'] !=="")) {

            if (filter_var($_POST['url'], FILTER_VALIDATE_URL) && is_string($_POST['nom'])) {
                $ajout = $flux->insert($_SESSION['id'], $_POST['nom'], $_POST['url']);
                header("Location: /PHP_Avance_RSS_Feed/index.php?page=".urlencode("mesFlux"));
            } else {
                $erreur = "une erreur c'est produite, veuillez réessayer";
            }
        } else {
            $erreur = "Vous n'avez pas remplit tout les champs";
        }
    }
    if (!empty($_GET['supprimer']) && $_GET['supprimer']=='true') {
        $deletFlux = $flux->delete($_GET['id_flux'], $_SESSION['id']);
        header("Location: /PHP_Avance_RSS_Feed/index.php?page=".urlencode("mesFlux"));
    }

    include dirname(__FILE__).'/../view/mesFlux.php';

} else {
    header("Location: /PHP_Avance_RSS_Feed/index.php?page=".urlencode("log"));
}

require dirname(__FILE__).'/../view/foot.php';

?>