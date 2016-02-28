<?php
/**
* IndexMember view for RSS Feed
* 
* PHP version 5
*
* @category View
* @package  Non_Non_Non
* @author   Frey Pauline <pauline1.frey@epitech.eu>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.nononon.com
*/
//On vérifie que le get est définit et qu'il existe dans les dossiers.
//Toute la navigation passe par ici. On change de page avec le GET.
// l'url est au format http://localhost/Mon_Dossier/index.php?page=maPage.
// "?page=maPage" permet de $_GET la page.
 
if (isset($_GET['page']) && is_file("controleur/".urldecode($_GET['page']).".php")) {
    //Si la page existe, on include le controller qui lui-même include
    // la view avec ses propres conditions. Par exemple vérifier que l'user
    // est connecté ou level 1 ou encore pas ban, etc...
    include "controleur/".urldecode($_GET['page']).".php";
} else {
    // Si a page n'existe pas, l'utilisateur est renvoyé vers une autre page.
    include "./controleur/log.php";

}

if (isset($_POST['deconnexion'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: /PHP_Avance_RSS_Feed/index.php?page=" . urlencode('log'));
}
?>