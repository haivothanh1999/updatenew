<?php
namespace project\Model\Image;

use project\Model\Database\Connection;

include '..\Database\Connection.php';

class Image
{
    const IMAGE_TABLE = 'photos';

    protected $_connection;

    public function __construct(Connection $connection)
    {
        $this->_connection = $connection;
    }

    public function getAllImages()
    {
        $allImage = $this->_connection->getAll(static::IMAGE_TABLE);

        return $allImage;
    }
}