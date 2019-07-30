<?php

namespace project\Model\Database;

class Connection
{
    const MYSQL_USER_NAME = 'vohai';
    const SERVER_PASSWORD = "12345678";
    const DATABASE = 'project_group2';

    public function add($tableName, $data, $columns)
    {
        $this->initConnection();
        $query = "INSERT INTO $tableName (" . implode(',', $columns) . ") VALUE (" . implode(',', $data) . ")";
        $result = $this->query($query);
        if ($result) {
            // Xu ly ket qua
        }
        $this->closeConnection();
    }

    public function get($tableName, $data, $column)
    {
        $query = "SELECT * FROM $tableName WHERE $column = '$data'";
        $connect = $this->initConnection();

        return $this->query($connect, $query);
    }

    public function getAll($tableName)
    {
        $connect = $this->initConnection();
        $query = "SELECT * FROM $tableName";
        $result = $this->query($connect, $query);
        if (!empty($result)) {
            return $result;
        } else {
            return [];
        }
        $this->closeConnection();
    }

    public function delete()
    {

    }

    public function update()
    {

    }

    private function initConnection()
    {
        $conn = mysqli_connect('localhost', self::MYSQL_USER_NAME, self::SERVER_PASSWORD, self::DATABASE);
        mysqli_select_db($conn, self::DATABASE);

        return $conn;
    }

    protected function query($connect, $query)
    {
        $query = mysqli_query($connect, $query);
        $result = [];
        while ($data = mysqli_fetch_array($query)) {
            $result[] = $data;
        }

        return $result;
    }

    private function closeConnection()
    {

    }
}