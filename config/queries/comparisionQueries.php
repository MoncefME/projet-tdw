<?php
class ComparisionQueries
{
    const getComparisionById = "SELECT * FROM comparisons WHERE id = ?";
    const getAllComparisions = "SELECT * FROM comparisons";
    const addComparision = "INSERT INTO comparisons (user_id, vehicule_1_id, vehicule_2_id, vehicule_3_id, vehicule_4_id) 
                VALUES                   (   ?   ,       ?      ,       ?      ,       ?      ,       ?      )";
    const getComparisionsByVehiculeId = "SELECT * FROM comparisons WHERE vehicule_1_id = ? OR vehicule_2_id = ? OR vehicule_3_id = ? OR vehicule_4_id = ?";
    const getVehiculesIdMostCompared = "SELECT vehicule_id, COUNT(*) as occurrence_count
            FROM (
                SELECT vehicule_1_id as vehicule_id FROM comparisons WHERE vehicule_1_id IS NOT NULL
                UNION ALL
                SELECT vehicule_2_id as vehicule_id FROM comparisons WHERE vehicule_2_id IS NOT NULL
                UNION ALL
                SELECT vehicule_3_id as vehicule_id FROM comparisons WHERE vehicule_3_id IS NOT NULL
                UNION ALL
                SELECT vehicule_4_id as vehicule_id FROM comparisons WHERE vehicule_4_id IS NOT NULL
            ) AS all_vehicles
            GROUP BY vehicule_id
            ORDER BY occurrence_count DESC";


    const getMostComparedVehiculePairs = "SELECT vehicule_id_A, vehicule_id_B, COUNT(*) AS pair_occurrence_count
        FROM (
            SELECT
                LEAST(vehicule_1_id, vehicule_2_id) AS vehicule_id_A,
                GREATEST(vehicule_1_id, vehicule_2_id) AS vehicule_id_B
            FROM comparisons
            WHERE vehicule_1_id IS NOT NULL AND vehicule_2_id IS NOT NULL
            UNION ALL
            SELECT
                LEAST(vehicule_1_id, vehicule_3_id) AS vehicule_id_A,
                GREATEST(vehicule_1_id, vehicule_3_id) AS vehicule_id_B
            FROM comparisons
            WHERE vehicule_1_id IS NOT NULL AND vehicule_3_id IS NOT NULL
            UNION ALL
            SELECT
                LEAST(vehicule_1_id, vehicule_4_id) AS vehicule_id_A,
                GREATEST(vehicule_1_id, vehicule_4_id) AS vehicule_id_B
            FROM comparisons
            WHERE vehicule_1_id IS NOT NULL AND vehicule_4_id IS NOT NULL
            UNION ALL
            SELECT
                LEAST(vehicule_2_id, vehicule_3_id) AS vehicule_id_A,
                GREATEST(vehicule_2_id, vehicule_3_id) AS vehicule_id_B
            FROM comparisons
            WHERE vehicule_2_id IS NOT NULL AND vehicule_3_id IS NOT NULL
            UNION ALL
            SELECT
                LEAST(vehicule_2_id, vehicule_4_id) AS vehicule_id_A,
                GREATEST(vehicule_2_id, vehicule_4_id) AS vehicule_id_B
            FROM comparisons
            WHERE vehicule_2_id IS NOT NULL AND vehicule_4_id IS NOT NULL
            UNION ALL
            SELECT
                LEAST(vehicule_3_id, vehicule_4_id) AS vehicule_id_A,
                GREATEST(vehicule_3_id, vehicule_4_id) AS vehicule_id_B
            FROM comparisons
            WHERE vehicule_3_id IS NOT NULL AND vehicule_4_id IS NOT NULL
        ) AS all_vehicle_pairs
        GROUP BY vehicule_id_A, vehicule_id_B
        ORDER BY pair_occurrence_count DESC
        LIMIT 5";
}