<?php
/**
* MonCompte controleur for RSS Feed
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

    include dirname(__FILE__).'/../model/utilisateur.php';
    $utilisateur = new Utilisateur();


    $selectUtilisateur = $utilisateur->selectUtilisateur($_SESSION['login']);

    if (isset($_POST['modifier'])) {
        
        if (isset($_POST['login']) && !empty($_POST['login'])) {
            $dataLogExists = $utilisateur->rechercheLogin($_POST['login']);
            
            if ($dataLogExists === true) {
                $erreur_login = "Ce login existe déjà!";
            } else {
                $updateLogin = $utilisateur->updateLogin($_POST['login'], $_SESSION['login']);
                $_SESSION['login']=$_POST['login'];
                header("Location: /PHP_Avance_RSS_Feed/index.php?page=".urlencode('monCompte'));
            }
        }

        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $dataLogEmail = $utilisateur->rechercheEmail($_POST['email']);
            
            if ($dataLogEmail === true) {
                $erreur_mail ="Cette email est déjà utilisé pour un compte";
            } else {
                $updateEmail = $utilisateur->updateEmail($_POST['email'], $_SESSION['login']);
                header("Location: /PHP_Avance_RSS_Feed/index.php?page=".urlencode('monCompte'));
            }
        }
        
        if ((isset($_POST['mdp']) && !empty($_POST['mdp'])) && (isset($_POST['new_mdp']) && !empty($_POST['new_mdp'])) && (isset($_POST['confMdp']) && !empty($_POST['confMdp']))) {
            
            $data = $utilisateur->connexion($_SESSION['login'], $_POST['mdp']);
            
            if ($data) {
                if ($_POST['new_mdp'] != $_POST['confMdp']) {
                    $erreur_new_mdp = 'Les 2 mots de passe sont différents.';
                } else {
                    $dataLogEmail = $utilisateur->updateMdp($_POST['new_mdp'], $_SESSION['login']);
                    header("Location: /PHP_Avance_RSS_Feed/index.php?page=".urlencode('monCompte'));
                }
            } elseif (!$data) {
                $erreur="mot de passe incorrect!";
            }
        }

    }
    if (isset($_POST['desactiver'])) {
        
        $desactivation = $utilisateur->desactivation($_SESSION['login']);
        $_SESSION = array();
        session_destroy();
        header("Location: /PHP_Avance_RSS_Feed/index.php?page=" . urlencode('log'));
    }
    include dirname(__FILE__).'/../view/monCompte.php';
} else {
    header("Location: /PHP_Avance_RSS_Feed/index.php?page=".urlencode('log'));
}

require dirname(__FILE__).'/../view/foot.php';

?>