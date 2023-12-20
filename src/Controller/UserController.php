<?php

namespace Controller;

use User;
use UserRepository;

class UserController
{
    private UserRepository $repo;

    /**
     * @param UserRepository $repo
     */
    public function __construct()
    {
        $this->repo = new UserRepository();
    }

    public function addUser()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $user = new User($id, $name, $email, $pass);
        $this->repo->addUser($user);
        return;
    }

    public function getUser()
    {
        $id = $_GET['id'];
        if (is_numeric($id))
            $this->repo->getUserById($id);
        else
            echo 'Pase un Id';
        return;
    }
}