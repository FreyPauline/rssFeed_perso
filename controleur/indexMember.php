<?php
/**
* IndexMember controleur for RSS Feed
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

    $allFlux = $flux->selectAllWhere($_SESSION['id']);
    
    if (!empty($_GET['ajouter']) && $_GET['ajouter']=='true') {
            $selectAjoutFlux = $flux->select($_GET['id_flux'], 1);

            $ajoutFlux= $flux->insert($_SESSION['id'], $selectAjoutFlux[0]['nom'], $selectAjoutFlux[0]['url']);

            header("Location: /PHP_Avance_RSS_Feed/index.php?page=".urlencode("indexMember"));
    }
    include dirname(__FILE__).'/../view/indexMember.php';

} else {
    header("Location: /PHP_Avance_RSS_Feed/index.php?page=".urlencode("log"));
}

require dirname(__FILE__).'/../view/foot.php';

?>