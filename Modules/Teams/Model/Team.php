<?php

class Teams_Model_Team extends Com_Module_Model {

    /**
     *
     * @return Teams_Model_Team
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages, $image, $thumb) {

        $db = new Entities_Team();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->TeamId = $id;
            $db->TeamLanId = $language->LanId;
            $db->TeamNombre = $obj->Nombre;
            $db->TeamCargo = $obj->Cargo;
            $db->TeamImage = $image;
            $db->TeamThumb = $thumb;
            $db->TeamResumen = $obj->Resumen;
            $db->TeamContenido = $obj->Contenido;
            $db->TeamInfo = $obj->Info;
            $db->TeamStatus = $obj->Status;

            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $image, $thumb) {
        $db = new Entities_Team();
        $db->TeamId = $intId;
        $db->TeamLanId = $obj->Language;
        $db->TeamNombre = $obj->Nombre;
        $db->TeamCargo = $obj->Cargo;

        if ($image != "") {
            $db->TeamImage = $image;
        }
        if ($thumb != "") {
            $db->TeamThumb = $thumb;
        }

        $db->TeamResumen = $obj->Resumen;
        $db->TeamContenido = $obj->Contenido;
        $db->TeamInfo = $obj->Info;
        $db->TeamStatus = $obj->Status;
        
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Team();
        $db->TeamId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Team();
        $db->TeamId = $intId;
        $db->TeamLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getList() {
        $text = new Entities_Team();
        return $text->getAll($text->getList());
    }
    
    public function getListTeam($lanId) {
        $db = new Entities_Team();
        return $db->getAll($db->getList()->where("TeamLanId={$lanId} and TeamStatus = 1"));
    }

    public function getListTeamCargo($lanId, $cargoId) {
        $db = new Entities_Team();
        $result = Com_Database_Query::getInstance()->select()->from("Team")->where("TeamLanId={$lanId} and TeamCat={$cargoId} and TeamStatus = 1");

        return $db->getAll($result);
    }





}
