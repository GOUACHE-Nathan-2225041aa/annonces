<?php

namespace service;

interface userAccessInterface
{
    public function getUser($login, $password);
}