<?php

require_once('PDOConnection.php');
require_once('Alert.php');

class ModelPanel extends PDOConnection
{

    private $viewAlert;

    public function __construct()
    {
        $this->viewAlert = new Alert;
    }

    // Dashboard
    public function getCountUsers() {
        $stmt = parent::$db->prepare("SELECT COUNT(*) FROM User");
        $stmt->execute();
        $stmtResult = $stmt->fetch();
        return $stmtResult[0];
    }

    public function getCountShows() {
        $stmt = parent::$db->prepare("SELECT COUNT(*) FROM Show");
        $stmt->execute();
        $stmtResult = $stmt->fetch();
        return $stmtResult[0];
    }

    public function getCountComments() {
        $stmt = parent::$db->prepare("SELECT count(*) FROM Comment");
        $stmt->execute();
        $stmtResult = $stmt->fetch();
        return $stmtResult[0];
    }

    public function getCountShowsInList() {
        $stmtCount1 = parent::$db->prepare("SELECT count(*) FROM ToWatchLaterShows");
        $stmtCount1->execute();
        $count1 = $stmtCount1->fetch();

        $stmtCount2 = parent::$db->prepare("SELECT count(*) FROM FollowedShows");
        $stmtCount2->execute();
        $count2 = $stmtCount2->fetch();

        return $count1[0] + $count2[0];
    }
}


/*
ShowBizFlex - 2022/12/05
GNU GPL CopyLeft 2022-2032
Initiated by Rachid ABDOULALIME - Steven CHING - Yanis HAMANI
WebSite : <https://dev.showbizflex.com/>
*/