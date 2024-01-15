<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/Config/queries/newsQueries.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/databaseController.php');
class NewsQueries
{
    const getNewsById = "SELECT * FROM news WHERE id = ?";
    const getAllNews = "SELECT * FROM news";
    const addNews = "INSERT INTO news (title, content, link,tags, created_at, updated_at, views_count, likes_count, newsImage) 
                          VALUES (    ?,       ?,    ?,   ?,    ?     ,    ?,           0,           0, ?)";
    const updateNews = "UPDATE news SET title=?, content=?, link=?, updated_at=?, tags=?,newsImage=? WHERE id = ?";
    const deleteNews = "DELETE FROM news WHERE id = ?";

}
