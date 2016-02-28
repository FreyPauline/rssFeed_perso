<?php
/**
* Flux controleur for RSS Feed
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
    
    if (isset($_GET['id'])) {
        $fluxUser = $flux->select($_GET['id'], 1);


        if (!empty($fluxUser[0]['url'])) {
            libxml_use_internal_errors(true);
            try {
                
                $xml = simplexml_load_file($fluxUser[0]['url']);
                $data = $xml;
                
            } catch (Exception $e) {
                $data = false;
            } 
        } 
    }

    include dirname(__FILE__).'/../view/flux.php';

} else {
    header("Location: /PHP_Avance_RSS_Feed/index.php?page=".urlencode("log"));
}

require dirname(__FILE__).'/../view/foot.php';

?>