<?php
/**
* Flux class for Tweet Academie
* 
* PHP version 5
*
* @category Class
* @package  Non_Non_Non
* @author   Frey Pauline <pauline1.frey@epitech.eu>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.nononon.com
*/
require "utilisateur.php";
/**
* Flux class for Tweet Academie
* 
* PHP version 5
*
* @category Class
* @package  Non_Non_Non
* @author   Frey Pauline <pauline1.frey@epitech.eu>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.nononon.com
*/
class Flux extends Utilisateur
{
    private $_table;

    /**
    * Construct
    */
    public function __construct()
    {
        $this->connectionBase();
        $this->_table = "flux";
        
    }
    /**
    * Insert
    *
    * @param int;    $id  requete
    * @param string; $nom requete
    * @param string; $url requete
    *
    * @return bool; $jesaipas
    */
    public function insert($id, $nom, $url)
    {
        $id = htmlspecialchars($id);
        $nom = htmlspecialchars(ucfirst($nom));
        $url = htmlspecialchars($url);

        $add = "INSERT INTO flux (`id_utilisateur`, `nom`, `url`) VALUES ( :id_utilisateur, :nom, :url);";
        $requeteAdd = $this->bdd->prepare($add);
        $requeteAdd->bindParam(':id_utilisateur', $id, PDO::PARAM_STR);
        $requeteAdd->bindParam(':nom', $nom, PDO::PARAM_STR);
        $requeteAdd->bindParam(':url', $url, PDO::PARAM_STR);
        $requeteAdd->execute();
    }
    /**
    * SelectAll
    *
    * @param int;    $id    requete
    * @param string; $champ requete
    *
    * @return array; $dataflux request result
    */
    public function select($id, $champ)
    {
        $id = htmlspecialchars($id);
        if ($champ === 1) {
            $selectFlux = "SELECT * FROM flux WHERE id_flux= :id";
        } else {
            $selectFlux = "SELECT * FROM flux WHERE id_utilisateur= :id";
        }
        
        $requeteFlux =  $this->bdd->prepare($selectFlux);
        $requeteFlux->bindParam(':id', $id, PDO::PARAM_INT);

        $requeteFlux->execute();
        $dataflux = $requeteFlux->fetchAll();
        return $dataflux;
    }
    /**
    * SelectAllWhere
    *
    * @param int; $id_utilisateur requete
    *
    * @return array; $dataflux request result
    */
    public function selectAllWhere($id_utilisateur)
    {
        $id_utilisateur = htmlspecialchars($id_utilisateur);

        $selectFlux = "SELECT * FROM flux WHERE id_utilisateur != :id_utilisateur";
        $requeteFlux =  $this->bdd->prepare($selectFlux);
        $requeteFlux->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $requeteFlux->execute();
        $requeteFlux->debugDumpParams();
        $dataflux = $requeteFlux->fetchAll();

        return $dataflux;
    }
    /**
    * Delete
    *
    * @param int; $id_flux        requete
    * @param int; $id_utilisateur requete
    *
    * @return bool; $jesaispas
    */
    public function delete($id_flux, $id_utilisateur)
    {
        $id_flux = htmlspecialchars($id_flux);
        $id_utilisateur = htmlspecialchars($id_utilisateur);


        $delet = "DELETE FROM flux WHERE id_flux = :id_flux AND id_utilisateur = :id_utilisateur ;";
        $requeteDelet = $this->bdd->prepare($delet);
        $requeteDelet->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $requeteDelet->bindParam(':id_flux', $id_flux, PDO::PARAM_INT);
        $requeteDelet->execute();

    }

}

?>