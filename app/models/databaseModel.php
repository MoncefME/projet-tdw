<?php

class DatabaseModel
{

    private $DB_HOST = 'localhost';
    private $DB_USER = 'root';
    private $DB_PASS = '';
    private $DB_NAME = 'carlog';
    private $DB_PORT = '3006';

    public function connect()
    {
        try {
            $database = new PDO("mysql:host=" . $this->DB_HOST . ";port=" . $this->DB_PORT . ";dbname=" . $this->DB_NAME . ";charset=utf8", $this->DB_USER, $this->DB_PASS);
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
