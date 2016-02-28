<?php
/**
* Log controleur for RSS Feed
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

require dirname(__FILE__).'/../model/utilisateur.php';


if (isset($_SESSION['login'])) {

    header("Location: /PHP_Avance_RSS_Feed/index.php?page=".urlencode('indexMember'));
}

$utilisateur = new Utilisateur();


if (isset($_POST['connexion'])) {
    if (!empty($_POST['login_con']) && !empty($_POST['mdp_con'])) {
        $connexion = $utilisateur->connexion($_POST['login_con'], $_POST['mdp_con']);

        if ($connexion != false && $connexion[6] == "1") {
            $_SESSION['id']= $connexion['id_utilisateur'];
            $_SESSION['login'] = $connexion['pseudo'];
            header("Location: /PHP_Avance_RSS_Feed/index.php?page=".urlencode('indexMember'));

            exit();
        } elseif ($connexion != false && $connexion[6] == "0") {
            $activation = $utilisateur->activation($connexion['pseudo']);
            $_SESSION['id']= $connexion['id_utilisateur'];
            $_SESSION['login'] = $_POST['login_con'];
            header("Location: /PHP_Avance_RSS_Feed/index.php?page=".urlencode('indexMember'));

            exit();
        } elseif (!$connexion) {
            echo 'Compte non reconnu.';
        }
    }
}

if (isset($_POST['suivant'])) {
    if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['mdp']) && !empty($_POST['mdp'])) && (isset($_POST['confMdp']) && !empty($_POST['confMdp'])) && (isset($_POST['nom']) && !empty($_POST['nom'])) && (isset($_POST['prenom']) && !empty($_POST['prenom'])) && (isset($_POST['email']) && !empty($_POST['email']))) {
        $connect = true;
        
        $dataLogExists = $utilisateur->rechercheLogin($_POST['login']);

        $dataLogEmail = $utilisateur->rechercheEmail($_POST['email']);

        /*recherche si le login existe déjà en base de donnée*/
        if ($dataLogExists === true) {
            $erreur_login = "Ce login existe déjà!";
            $connect = false;
        }
        /*recherche si le mail existe déjà en base de donnée*/
        if ($dataLogEmail === true) {
            $erreur_mail ="Cette email est déjà utilisé pour un compte";
            $connect = false;
        }
        /*si le mot de passe est assez long*/
        if ($_POST['mdp'] < 5) {
            $erreur_mdp = "Le mot de passe est trop court";
            $connect = false;
        }
        /*recherche si les deux mot de passe sont diférent*/
        if ($_POST['mdp'] != $_POST['confMdp']) {
            $erreur_confMdp = "Les deux mots de passe sont différents";
            $connect = false;
        }
        /*si aucune erreur n'est détecté*/
        if ($connect == true) {
            
            /*envoi en base de donnée*/
            $inscription = $utilisateur->inscription($_POST['login'], $_POST['mdp'], $_POST['nom'], $_POST['prenom'], $_POST['email']);
            $_SESSION['id']= $inscription['id_utilisateur'];
            $_SESSION['login'] = $_POST['login'];

            header("Location: /PHP_Avance_RSS_Feed/index.php?page=".urlencode('indexMember'));
        }

    } else {
        $erreur_champ ="Vous n'avez pas remplit tout les champs";
    }

}
require dirname(__FILE__).'/../view/log.php';
require dirname(__FILE__).'/../view/foot.php';
?>
