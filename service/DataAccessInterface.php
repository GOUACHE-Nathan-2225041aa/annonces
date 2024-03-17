<?php

namespace service;
interface DataAccessInterface
{
    public function getUser($login, $password);

    public function getAllAnnonces();

    public function getPost($id);

    public function insertUser($login, $password, $nom, $prenom);

    public function insertPost($titre, $contenu);

    public function isUser($login);
}