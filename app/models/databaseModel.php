<?php

class DatabaseModel
{
    public function connect()
    {
        try {
            $database = new PDO("mysql:host=localhost;port=3006;dbname=carlog2;charset=utf8", "root", "");
            return $database;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }

    public function disconnect(&$database)
    {
        try {
            $database = null;
        } catch (PDOException $e) {
            echo "Disconnection failed: " . $e->getMessage();
        }
    }

    public function request($database, $query, $params = [])
    {
        try {
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
        } catch (PDOException $e) {
            echo "Query execution failed: " . $e->getMessage();
            return false;
        }
    }
}
