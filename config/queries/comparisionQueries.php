<?php
class ComparisionQueries
{
    public static function getComparisionById()
    {
        return "SELECT * FROM comparisons WHERE id = ?";
    }
    public static function getAllComparisions()
    {
        return "SELECT * FROM comparisons";
    }
    public static function addComparision()
    {
        return "INSERT INTO comparisons (user_id, vehicule_1_id, vehicule_2_id, vehicule_3_id, vehicule_4_id) 
                VALUES                   (   ?   ,       ?      ,       ?      ,       ?      ,       ?      )";
    }
}