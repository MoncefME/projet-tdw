<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/models/databaseModel.php');
class DatabaseController
{
    public function connect()
    {
        $database = new DatabaseModel();
        return $database->connect();
    }
    public function disConnect(&$database)
    {
        $database = null;
    }

    public function request($database, $query, $params = [])
    {
        $databaseModel = new DatabaseModel();
        return $databaseModel->request($database, $query, $params);
    }
}
