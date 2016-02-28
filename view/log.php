<?php
/**
* Log view for RSS Feed
* 
* PHP version 5
*
* @category View
* @package  Non_Non_Non
* @author   Frey Pauline <pauline1.frey@epitech.eu>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.nononon.com
*/ ?>
<div id="content">
    <section>
        <h2>Déja Membre</h2>
        <p>Connexion</p>
        <form method="post">
            <label for="login_con">Login:</label>  
            <input id="login_con" type="text" name="login_con"/>
            <label for="mdp_con">Mot de passe :</label> 
            <input id="mdp_con" type="password" name="mdp_con"/>
            <input type="submit" name="connexion" value="Connexion"/>
        </form>
    </section>

    <section>
        <h2>Inscription</h2>
        <p><?php if (isset($erreur_champ)) {
            echo $erreur_champ;
} ?></p>
        <form method="post">
            <label id="login">Login:</label>
            <input type="text" name="login"/>
            <p><?php if (isset($erreur_login)) { 
                echo $erreur_login;
} ?></p>
            <label id="mdp">Mot de passe:</label> 
            <input type="password" name="mdp"/>
            <p><?php if (isset($erreur_mdp)) { 
                echo $erreur_mdp;
} ?></p>
            <label id="confMdp">Confirmation mot de passe:</label> 
            <input type="password" name="confMdp"/>
            <p><?php if (isset($erreur_confMdp)) { 
                echo $erreur_confMdp;
} ?></p>
            <label id="nom">Nom:</label>
            <input type="text" name="nom"/>
            <label id="prenom">Prénom:</label>
            <input type="text" name="prenom"/>
            <label id="email">Adresse e-mail:</label> 
            <p><?php if (isset($erreur_mail)) { 
                echo $erreur_mail;
} ?></p>
            <input type="email" name="email"/>
            <p><?php if (isset($erreur_mail) || (isset($erreur_login))) { 
                echo "Si vous avez désactivez votre compte, il vous suffit de vous connecter pour le réactiver!";
} ?></p>
            <input type="submit" name="suivant" value="suivant"/>
        </form>
    </section>
</div>