<?php
namespace project\Controller\User;

use project\Model\Database\Connection;
use project\Model\User\User;

include '../../Model/User/User.php';
include '../../Model/Database/Connection.php';

class SignIn
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function execute()
    {
        session_start();
        $data = $_POST;
        $result = $this->signIn($data);
        if ($result) {
            return header('Location: ../../index.php');
        } else {
            return header('Location: ../../view/false.php');
        }
    }

    public function signIn($postData)
    {
        $user = $this->getUser($postData);
        if (empty($user)) {
            return false;
        }
        if ($postData['your_pass'] == $user[0]['pass_word']) {
            return true;
        }

        return false;
    }

    public function getUser($data)
    {
        $username = $data['your_name'];

        return $this->user->loadByUserName($username);
    }
}

$connection = new Connection();
$user = new User($connection);
$signIn = new SignIn($user);
$signIn->execute();