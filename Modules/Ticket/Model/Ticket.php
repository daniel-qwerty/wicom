<?php

class Ticket_Model_Ticket extends Com_Module_Model {

    /**
     *
     * @return Contact_Model_Contact 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $language) {

        $db = new Entities_Ticket();

        $id = $db->getNextId();
        $db->TikId = $id;
        $db->TikLanId = "1";
        $db->TikDate = date("Y-m-d H:i:s");
        $db->TikName = $obj->Name;
        $db->TikEmail = $obj->Email;
        $db->TikSerial = $obj->Serial;
        $db->TikResume = $obj->Resume;
        $db->TikAction = $obj->Action;
        $db->TikStatus = "1";
        $db->action = ACTION_INSERT;
        $db->save();

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj) {
        $db = new Entities_Ticket();
        $db->TikId = $intId;
        $db->TikLanId = $obj->Language;
        $db->TikName = $obj->Name;
        $db->TikEmail = $obj->Email;
        $db->TikSerial = $obj->Serial;
        $db->TikResume = $obj->Resume;
        $db->TikAction = $obj->Action;
        $db->TikStatus = $obj->Status;
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Ticket();
        $db->TikId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Ticket();
        $db->TikId = $intId;
        $db->TikLanId = $lanId;
        $db->get();
        return $db;
    }

       
    public function getListByLan($limit = 1000) {
        $text = new Entities_Ticket();
        return $text->getAll($text->getList()->where("TikLanId= 7")->orderBy("TikDate desc")->limit(0, $limit));
    }
    
    public function countAll() {
        $db = new Entities_Ticket();
        return $db->getAll("select count(*) as number from {$db}");
    }

}
