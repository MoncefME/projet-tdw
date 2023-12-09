<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/Config/queries/newsQueries.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/databaseController.php');
class NewsQueries
{
    public static function getNewsById()
    {
        return "SELECT * FROM news WHERE id = ?";
    }
    public static function getAllNews()
    {
        return "SELECT * FROM news";
    }

    public static function addNews()
    {
        return "INSERT INTO news (title, content, link,tags) 
                          VALUES (    ?,       ?,    ?,   ?)";
    }

    public static function updateNews()
    {
        return "UPDATE news SET title=?, content=?, link=?, updated_at=?, tags=? WHERE id = ?";
    }

    public static function deleteNews()
    {
        return "DELETE FROM news WHERE id = ?";
    }
}
