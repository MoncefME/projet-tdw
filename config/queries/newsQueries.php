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
        //id, title, content, link, created_at, updated_at, tags, views_count, likes_count 
        return "INSERT INTO news (title, content, link,tags, created_at, updated_at, views_count, likes_count) 
                          VALUES (    ?,       ?,    ?,   ?,    ?     ,    ?,           0,           0)";
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
