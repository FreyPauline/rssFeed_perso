<?php
/**
* Flux view for RSS Feed
* 
* PHP version 5
*
* @category View
* @package  Non_Non_Non
* @author   Frey Pauline <pauline1.frey@epitech.eu>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.nononon.com
*/ ?>
<nav>
    <h1><img alt="Logo Flux tendu" src="./view/css/Flux-Tendu-logo.png"></h1>
    <?php if (isset($_SESSION['login'])) {?>
        
        <ul>
            <li><a href="/PHP_Avance_RSS_Feed/index.php?page=<?php echo urlencode('indexMembre');?>">Accueil</a></li>
            <li><a href="/PHP_Avance_RSS_Feed/index.php?page=<?php echo urlencode('mesFlux');?>">Mes Flux</a></li>
            <li><a href="/PHP_Avance_RSS_Feed/index.php?page=<?php echo urlencode('monCompte');?>">Mon Compte</a></li>
        </ul>
        <form method="post"> 
            <input type="submit" name="deconnexion" value="Déconnexion"/>
        </form>

    <?php 
} else { ?>
            <div id="titre_non_connecter">
            <h2>Flux tendu</h2>
    </div>
    <?php 
} ?>
</nav>
