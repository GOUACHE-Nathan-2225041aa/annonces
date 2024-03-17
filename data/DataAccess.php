<?php

namespace data;

use PDO;
use service\DataAccessInterface;
include_once "service/DataAccessInterface.php";

use domain\{User,Post};
include_once "domain/User.php";
include_once "domain/Post.php";

class DataAccess implements DataAccessInterface
{
    protected $dataAccess = null;

    public function __construct($dataAccess)
    {
        $this->dataAccess = $dataAccess;
    }

    public function __destruct()
    {
        $this->dataAccess = null;
    }

    public function getUser($login, $password)
    {
        $user = null;

        $query = 'SELECT login FROM Users WHERE login="' . $login . '" and password="' . $password . '"';
        $result = $this->dataAccess->query($query);

        if ($result->rowCount())
            $user = "feurPrime";

        $result->closeCursor();

        return $user;
    }

    public function isUser($login)
    {
        $query = 'SELECT login FROM Users WHERE login ="' . $login . '"';
        $statement = $this->dataAccess->prepare($query);

        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        $statement->closeCursor();

        return $result;
    }

    public function getAllAnnonces()
    {
        $result = $this->dataAccess->query('SELECT * FROM Post');
        $annonces = array();

        while ($row = $result->fetch()) {
            $currentPost = new Post($row['id'], $row['title'], $row['body'], $row['date']);
            $annonces[] = $currentPost;
        }

        $result->closeCursor();

        return $annonces;
    }

    public function getPost($id)
    {
        $id = intval($id);
        $result = $this->dataAccess->query('SELECT * FROM Post WHERE id=' . $id);
        $row = $result->fetch();

        $post = new Post($row['id'], $row['title'], $row['body'], $row['date']);

        $result->closeCursor();

        return $post;
    }

    public function insertUser($login, $password, $nom, $prenom)
    {
        $query = 'INSERT INTO Users (login, password, nom, prenom, date_creation) VALUES ("' . $login . '","' . $password . '","' . $nom . '","' . $prenom . '", CURDATE())';
        $statement = $this->dataAccess->prepare($query);

        $statement->execute();

        $user = new User($login, $password, $nom, $prenom);

        $statement->closeCursor();

        return $user;
    }

    public function insertPost($titre, $contenu)
    {
        $sql_last_id = "SELECT MAX(id) as last_id FROM Post";
        $result = $this->dataAccess->query($sql_last_id);
        $row = $result->fetch();

        $id = $row['last_id'] + 1;

        $query = 'INSERT INTO Post (id, date, title, body) VALUES (' . $id . ', CURDATE(), "' . $titre . '","' . $contenu . '")';
        $statement = $this->dataAccess->prepare($query);

        $statement->execute();

        $statement->closeCursor();

        return $this->getPost($id);
    }
}

?>