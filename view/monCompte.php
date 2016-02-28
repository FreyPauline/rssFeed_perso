<?php
/**
* MomCompte view for RSS Feed
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
<h2>Mes infomations:</h2>
<table>
    <tr>
        <th>Login</th>
        <th>Nom</th>
        <th>Prènom</th>
        <th>Email</th>
    </tr>
    <tr>
        <td><?php echo $selectUtilisateur['pseudo']; ?></td>
        <td><?php echo $selectUtilisateur['nom']; ?></td>
        <td><?php echo $selectUtilisateur['prenom']; ?></td>
        <td><?php echo $selectUtilisateur['email']; ?></td>
    </tr>
</table>
<h2>Modifier mon compte</h2>
    <form method="post">
        <label id="login">Login:</label>
        <input type="text" name="login" placeholder ="<?php echo $selectUtilisateur['pseudo']?>"/>
        <p><?php if (isset($erreur_login)) {
            echo $erreur_login;
} ?></p>
        <label id="mdp">Ancien Mot de passe:</label> 
        <input type="password" name="mdp"/>
        <p><?php if (isset($erreur)) {
            echo $erreur;
} ?></p>
        <label id="new_mdp">Nouveau mot de passe:</label> 
        <input type="password" name="new_mdp"/>
        <label id="confMdp">Confirmation mot de passe:</label> 
        <input type="password" name="confMdp"/>
        <p><?php if (isset($erreur_new_mdp)) {
            echo $erreur_new_mdp;
} ?></p>
        <label id="email">Adresse e-mail:</label> 
        <p><?php if (isset($erreur_mail)) {
            echo $erreur_mail;
} ?></p>
        <input type="email" name="email" placeholder ="<?php echo $selectUtilisateur['email']?>"/>
        <input type="submit" name="modifier" value="modifier"/>
        <input type="submit" name="desactiver" value="désactiver mon compte"/>
    </form>