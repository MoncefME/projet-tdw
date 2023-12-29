<?php
class ComparisionQueries
{
    public static function getComparisionById()
    {
        return "SELECT * FROM comparisions WHERE id = ?";
    }
    public static function getAllComparisions()
    {
        return "SELECT * FROM comparisions";
    }
    public static function addComparision()
    {
        return "INSERT INTO comparisions (user_id, vehicule_1_id, vehicule_2_id, vehicule_3_id, vehicule4_id) 
                VALUES                   (   ?   ,       ?      ,       ?      ,       ?      ,       ?      )";
    }
}