<?php
/**
* Utilisateur class for Tweet Academie
* 
* PHP version 5
*
* @category Class
* @package  Non_Non_Non
* @author   Frey Pauline <pauline1.frey@epitech.eu>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.nononon.com
*/
require "basededonnees.php";
/**
* Utilisateur class for Tweet Academie
* 
* PHP version 5
*
* @category Class
* @package  Non_Non_Non
* @author   Frey Pauline <pauline1.frey@epitech.eu>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.nononon.com
*/
class Utilisateur extends BaseDeDonnees
{
    private $_table;
    /**
    * Construct
    */
    public function __construct()
    {
        $this->connectionBase();
        $this->_table = "utilisateur";
    }
    /**
    * Connexion
    *
    * @param string; $login requete
    * @param string; $mdp   requete
    *
    * @return array; $data request result
    */
    public function connexion($login, $mdp)
    {
        $mdp = htmlspecialchars(sha1($mdp));
        $login = htmlspecialchars($login);
        $email = htmlspecialchars($login);

        $sql = "SELECT * FROM utilisateur WHERE mdp= :mdp AND pseudo = :pseudo";
        $requeteConnexion = $this->bdd->prepare($sql);
        $requeteConnexion->bindParam(':mdp', $mdp, PDO::PARAM_STR);
        $requeteConnexion->bindParam(':pseudo', $login, PDO::PARAM_STR);
        $requeteConnexion->execute();
        $data = $requeteConnexion->fetch();
        return $data;
    }
    /**
    * RechercheLogin
    *
    * @param string; $login requete
    *
    * @return bool; $data request result
    */
    public function rechercheLogin($login)
    {
        $login = htmlspecialchars($login);

        $logExists = "SELECT pseudo FROM utilisateur WHERE pseudo= :pseudo";
        $requeteLogExists = $this->bdd->prepare($logExists);
        $requeteLogExists->bindParam(':pseudo', $login, PDO::PARAM_STR);
        $requeteLogExists->execute();
        $dataLogExists = $requeteLogExists->fetchAll();
        if ($dataLogExists) {
            return true;
        } else {
            return false;
        }
    }
    /**
    * RechercheEmail
    *
    * @param string; $mail requete
    *
    * @return bool; $data request result
    */
    public function rechercheEmail($mail)
    {
        $mail = htmlspecialchars($mail);

        $logEmail = "SELECT email FROM utilisateur WHERE email= :email";
        $requeteLogEmail =  $this->bdd->prepare($logEmail);
        $requeteLogEmail->bindParam(':email', $mail, PDO::PARAM_STR);
        $requeteLogEmail->execute();
        $dataLogEmail = $requeteLogEmail->fetch();
        if ($dataLogEmail) {
            return true;
        } else {
            return false;
        }
    }
    /**
    * Inscription
    *
    * @param string; $pseudo requete
    * @param string; $mdp    requete
    * @param string; $nom    requete
    * @param string; $prenom requete
    * @param string; $mail   requete
    *
    * @return bool; $jesaispas
    */
    public function inscription($pseudo, $mdp, $nom, $prenom, $mail)
    {
        $pseudo = htmlspecialchars($pseudo);
        $mdp = htmlspecialchars(sha1($mdp));
        $nom = htmlspecialchars($nom);
        $prenom = htmlspecialchars($prenom);
        $mail = htmlspecialchars($mail);

        $add = "INSERT INTO utilisateur (`id_utilisateur`, `email`, `pseudo`, `nom`, `prenom`, `mdp`) VALUES (NULL, :email, :pseudo, :nom, :prenom, :mdp);";
        $requeteAdd = $this->bdd->prepare($add);
        $requeteAdd->bindParam(':email', $mail, PDO::PARAM_STR);
        $requeteAdd->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $requeteAdd->bindParam(':nom', $nom, PDO::PARAM_STR);
        $requeteAdd->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $requeteAdd->bindParam(':mdp', $mdp, PDO::PARAM_STR);
        $requeteAdd->execute();
    }
    /**
    * SelectUtilisateur
    *
    * @param string; $pseudo requete
    *
    * @return array; $dataUtilisateur request result
    */
    public function selectUtilisateur($pseudo)
    {
        $pseudo = htmlspecialchars($pseudo);

        $selectUtilisateur = "SELECT * FROM utilisateur WHERE pseudo= :pseudo";
        $requeteUtilisateur =  $this->bdd->prepare($selectUtilisateur);
        $requeteUtilisateur->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $requeteUtilisateur->execute();
        $dataUtilisateur = $requeteUtilisateur->fetch();
        return $dataUtilisateur;
    }
    /**
    * UpdateMdp
    *
    * @param string; $mdp    requete
    * @param string; $pseudo requete
    *
    * @return bool; $jesaispas
    */
    public function updateMdp($mdp, $pseudo)
    {
        $pseudo = htmlspecialchars($pseudo);
        $mdp = htmlspecialchars(sha1($mdp));

        $add = "UPDATE utilisateur SET mdp= :mdp WHERE pseudo= :pseudo";
        $requeteAdd = $this->bdd->prepare($add);
        $requeteAdd->bindParam(':mdp', $mdp, PDO::PARAM_STR);
        $requeteAdd->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $requeteAdd->execute();
        $dataAdd = $requeteAdd->fetch();
    }
    /**
    * UpdateEmail
    *
    * @param string; $email  requete
    * @param string; $pseudo requete
    *
    * @return bool; $jesaispas
    */
    public function updateEmail($email, $pseudo)
    {
        $pseudo = htmlspecialchars($pseudo);
        $email = htmlspecialchars($email);
        $add = "UPDATE utilisateur SET email= :email WHERE pseudo= :pseudo";
        $requeteAdd = $this->bdd->prepare($add);
        $requeteAdd->bindParam(':email', $email, PDO::PARAM_STR);
        $requeteAdd->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $requeteAdd->execute();
        $dataAdd = $requeteAdd->fetch();
    }
    /**
    * UpdateLogin
    *
    * @param string; $new_login requete
    * @param string; $pseudo    requete
    *
    * @return bool; $jesaispas
    */
    public function updateLogin($new_login, $pseudo)
    {
        $new_login = htmlspecialchars($new_login);
        $pseudo = htmlspecialchars($pseudo);

        $add = "UPDATE utilisateur SET pseudo= :new_login WHERE pseudo= :pseudo";
        $requeteAdd = $this->bdd->prepare($add);
        $requeteAdd->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $requeteAdd->bindParam(':new_login', $new_login, PDO::PARAM_STR);
        $requeteAdd->execute();
        $dataAdd = $requeteAdd->fetch();
    }
    /**
    * Desactivation
    *
    * @param string; $pseudo requete
    *
    * @return bool; $jesaispas
    */
    public function desactivation($pseudo)
    {
        $pseudo = htmlspecialchars($pseudo);

        $update = "UPDATE utilisateur SET actif= '0' WHERE pseudo= :pseudo";
        $requeteAdd = $this->bdd->prepare($update);
        $requeteAdd->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $requeteAdd->execute();
    }
    /**
    * Activation
    *
    * @param string; $pseudo requete
    *
    *@return bool; $jesaispas
    */
    public function activation($pseudo)
    {
        $pseudo = htmlspecialchars($pseudo);

        $update = "UPDATE utilisateur SET actif= '1' WHERE pseudo= :pseudo";
        $requeteAdd = $this->bdd->prepare($update);
        $requeteAdd->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $requeteAdd->execute();
    }
}
?>