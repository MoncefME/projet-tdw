<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/models/comparisionModel.php");
class ComparisionController
{
    public function getComparisionById($comparisionId)
    {
        $comparisionModel = new ComparisionModel();
        return $comparisionModel->getComparisionById($comparisionId);
    }
    public function getAllComparisions()
    {
        $comparisionModel = new ComparisionModel();
        return $comparisionModel->getAllComparisions();
    }

    public function addComparison($user_id, $vehicule_1_id, $vehicule_2_id, $vehicule_3_id, $vehicule_4_id)
    {
        $comparisionModel = new ComparisionModel();
        return $comparisionModel->addComparision($user_id, $vehicule_1_id, $vehicule_2_id, $vehicule_3_id, $vehicule_4_id);
    }

    public function getMostComparedVehiculePairs()
    {
        $comparisionModel = new ComparisionModel();
        return $comparisionModel->getMostComparedVehiculePairs();
    }

}