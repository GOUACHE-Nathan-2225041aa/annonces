<?php
namespace gui;

include_once "View.php";

class ViewInscription extends View
{
    public function __construct($layout)
    {
        parent::__construct($layout);

        $this->title = 'Exemple Annonces Basic PHP: Inscription';

        $this->content = '
            <h2>Inscription</h2>
            <form method="post" action="/annonces/index.php/inscription">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" id="nom" maxlength="50" required />
                <br />

                <label for="prenom">Prénom:</label>
                <input type="text" name="prenom" id="prenom" maxlength="50" required />
                <br />

                <label for="login">Identifiant:</label>
                <input type="text" name="login" id="login" maxlength="20" required />
                <br />

                <label for="password">Mot de passe:</label>
                <input type="password" name="password" id="password" maxlength="20" required />
                <br />

                <input type="submit" value="S\'inscrire">
            </form>
        ';

        $this->content .= '
            <h1>Changer de page</h1>
            <ul>
              <li><a href="/annonces/index.php/creationPost">Créer post</a></li>
              <li><a href="/annonces/index.php">Se déconnecter</a></li>
            </ul>
            ';
    }
}