<?php
namespace project\Model\User;

use project\Model\Database\Connection;

include '../Database/Connection.php';

class User
{
    const USER_TABLE_NAME = 'account';

    protected $_connection;

    protected $_data = [];

    public function __construct(Connection $connection)
    {
        $this->_connection = $connection;
    }

    public function getData($key)
    {
        return $this->_data[$key];
    }

    public function load($id)
    {
        $userData = $this->_connection->get($id, static::USER_TABLE_NAME);
        $this->_data = $userData;

        return true;
    }

    public function loadByUserName($username)
    {
        return $this->_connection->get(static::USER_TABLE_NAME, $username, 'your_name');
    }

    public function save()
    {

    }
}