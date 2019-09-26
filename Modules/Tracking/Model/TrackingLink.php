<?php

class Tracking_Model_TrackingLink extends Com_Module_Model {

    /**
     *
     * @return Tracking_Model_TrackingLink
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }


    public function doInsert($link, $date, $browser) {
        $db = new Entities_LinkTracking();
        $db->link = $link;
        $db->date = $date;
        $db->browser = $browser;
        print_r($db);
        exit();

        $db->action = ACTION_INSERT;
        $db->save();
    }

    /*public function getList($dtaStart, $dtaEnd) {
        $db = new Entities_Visit();
        return $db->getAll($db->getList($dtaStart, $dtaEnd)->limit(0, 10000));
    }

    public function count() {
        $db = new Entities_Visit();
        return $db->getAll("select count(*) as number from {$db}");
    }

    public function countUnique() {
        $db = new Entities_Visit();
        return $db->getAll("select count(*) as number from (select distinct TraRemoteIp from Tracking) as number");
    }*/

}
