<?php

class DatabaseModel
{
    public function connect()
    {
        $database = new PDO("mysql:host=localhost;dbname=carlog;charset=utf8", "root", "");
        return $database;
    }

    public function disconnect(&$database)
    {
        $database = null;
    }

    public function request($database, $query, $params = [])
    {
        $stmt = $database->prepare($query);

        if ($stmt) {
            if (!empty($params)) {
                $stmt->execute($params);
            } else {
                $stmt->execute();
            }

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            return $result;
        } else {
            return false;
        }
    }
}
