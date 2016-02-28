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
<h2><?php echo $fluxUser[0]['nom']; ?></h2>
<p>Toute l'information</p>
<?php if ($data) { 
    foreach ($data->channel->item as $valeur) { ?>
    <p> <?php echo date("d/m/Y", strtotime($valeur->pubDate))?></p>
    <p> <a href="<?php echo $valeur->link; ?>"> <?php echo $valeur->title?> </a></p>
    <p> <?php echo $valeur->description?> </p>
<?php 
    }
} else {?>
    <p>Il semble que votre liens n'est pas un flux RSS</p>
<?php 
}?>
