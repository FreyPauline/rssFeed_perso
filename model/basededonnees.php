<?php
/**
* Basededonnees class for Tweet Academie
* 
* PHP version 5
*
* @category Class
* @package  Non_Non_Non
* @author   Frey Pauline <pauline1.frey@epitech.eu>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.nononon.com
*/
/**
* Basededonnees class for Tweet Academie
* 
* PHP version 5
*
* @category Class
* @package  Non_Non_Non
* @author   Frey Pauline <pauline1.frey@epitech.eu>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.nononon.com
*/
class BaseDeDonnees
{
    protected $bdd;
    /**
    * ConnectionBase
    *
    * @return bool; $e die
    */
    public function connectionBase()
    {
        try
        {
            $this->bdd = new PDO('mysql:host=localhost;dbname=fluxrss;unix_socket=/home/frey_b/.mysql/mysql.sock', 'root', '');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
    * SelectAll
    *
    * @param string; $table requete
    *
    * @return array; $data request result
    */
    public function selectAll($table)
    {
        $sql = "SELECT * FROM " . $table;
        $req = $this->bdd->query($sql);
        $data = $req->fetchAll();
        return $data;
        
    }
    /**
    * GetBdd
    *
    * @return string; $this->bdd
    */
    public function getBdd()
    {
        return $this->bdd;
    }
    /**
    * SetBdd
    *
    * @param string; $bdd requete
    *
    * @return string; $bdd
    */
    public function setBdd($bdd)
    {
        $this->bdd = $bdd;
    }
}
?>