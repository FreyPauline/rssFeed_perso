<?php
/**
* MesFlux view for RSS Feed
* 
* PHP version 5
*
* @category View
* @package  Non_Non_Non
* @author   Frey Pauline <pauline1.frey@epitech.eu>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.nononon.com
*/ 
?>
<div class="ajoutFlux">
    <h2>Ajouter un flux</h2>
    <form  method="post">
        <label for="nom">Nom</label>
        <input id="nom" type="text" name="nom">
        <label for="url">Url</label>
        <input id="url" type="text" name="url">
        <input type="submit" name="ajouter" value="Ajouter"/>
        <p><?php if (isset($erreur)) {
            echo $erreur; 
} ?></p>
    </form>
</div>
<div class ="Flux">
    <h2>Mes flux</h2>
    <ul>
    <?php foreach ($fluxUser as $value) { ?>
        <li>
            <p><a href="/PHP_Avance_RSS_Feed/index.php?id=<?php echo $value['id_flux'];?>&amp;page=<?php echo urlencode('flux');?>"><?php echo $value['nom']; ?></a></p>
            <p><a title="supprimer" href="/PHP_Avance_RSS_Feed/index.php?supprimer=true&amp;id_flux=<?php echo $value['id_flux'];?>&amp;page=<?php echo urlencode('mesFlux');?>">Supprimer</a></p>
        </li>
    <?php 
} ?>
    </ul>
</div>