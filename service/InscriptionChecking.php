<?php

namespace service;

class InscriptionChecking
{
    protected $inscriptionTxt;

    public function getInscriptionTxt()
    {
        return $this->inscriptionTxt;
    }

    public function validateInscriptionData($login, $password, $data)
    {
        if($data->isUser($login) || strlen($password) < 12 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{12,}$/', $password)) {
            return false;
        }
        return true;
    }

    public function insertUser($login, $password, $nom, $prenom, $data)
    {
        $post = $data->insertUser($login, $password, $nom, $prenom);

        $this->inscriptionTxt[] = array('login' => $post->getLogin(), 'password' => $post->getPassword(), 'nom' => $post->getNom(), 'prenom' => $post->getPrenom());
    }
}