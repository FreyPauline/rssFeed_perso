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
*/ ?>
<h2>Bienvenue !</h2>
<p>Pour ajouter de nouveau flux vou pouvez vous rendre dans la section <a href="/PHP_Avance_RSS_Feed/index.php?page=<?php echo urlencode('mesFlux');?>">Mes Flux</a>.</p>
<h2>Les autres utilisateurs suivent:</h2>
<ul>
<?php foreach ($allFlux as $value) { ?>
    <li>
        <p><a href="/PHP_Avance_RSS_Feed/index.php?id=<?php echo $value['id_flux'];?>&amp;page=<?php echo urlencode('flux');?>"><?php echo $value['nom']; ?></a></p>
        <p><a title="supprimer" href="/PHP_Avance_RSS_Feed/index.php?ajouter=true&amp;id_flux=<?php echo $value['id_flux'];?>&amp;page=<?php echo urlencode('indexMember');?>">Ajouter</a></p>
    </li>
<?php 
} ?>
</ul>