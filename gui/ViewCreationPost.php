<?php
namespace gui;

include_once "View.php";

class ViewCreationPost extends View
{
    public function __construct($layout)
    {
        parent::__construct($layout);

        $this->title = 'Exemple Annonces Basic PHP: Creation Post';

        $this->content = '
            <h1>Créer une nouvelle annonce</h1>
            <form action="/annonces/index.php/creationPost" method="post">
                <label for="titre">Titre de l\'annonce (maximum 20 caractères) :</label><br>
                <input type="text" id="titre" name="titre" maxlength="20" required><br><br>
                <label for="contenu">Contenu de l\'annonce (maximum 200 caractères) :</label><br>
                <textarea id="contenu" name="contenu" rows="4" maxlength="200" required></textarea><br><br>
                <input type="submit" value="Publier l\'annonce">
            </form>
        ';

        $this->content .= '
            <h1>Changer de page</h1>
            <ul>
              <li><a href="/annonces/index.php">Se déconnecter</a></li>
              <li><a href="/annonces/index.php/inscription">Créer un compte</a></li>
            </ul>
            ';
    }
}