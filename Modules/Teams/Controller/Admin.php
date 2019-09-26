<?PHP

class Teams_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Equipo";
        Com_Helper_BreadCrumbs::getInstance()->add("Equipo", "/Admin/Teams");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Teams/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        if ($this->isPost()) {

                   
            $image = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $image = Com_File_Handler::getInstance()->getFileName();
                }
            }

            $thumb = "";
            if (Com_File_Handler::getInstance()->setFile(get("Thumb"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $thumb = Com_File_Handler::getInstance()->getFileName();
                }
            }

            $id = Teams_Model_Team::getInstance()->doInsert($this->getPostObject(), $languages, $image, $thumb);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Teams/Edit/id/' . $id);
        }

        $this->assign('Nombre');
        $this->assign('Cargo');
        $this->assign('Resumen');
        $this->assign('Thumb');
        $this->assign('Image');
        $this->assign('Contenido');
        $this->assign('Info');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));

    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Teams/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);

        if ($this->isPost()) {

            
            
            $image = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $image = Com_File_Handler::getInstance()->getFileName();
                }
            }

            $thumb = "";
            if (Com_File_Handler::getInstance()->setFile(get("Thumb"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $thumb = Com_File_Handler::getInstance()->getFileName();
                }
            }

            Teams_Model_Team::getInstance()->doUpdate(get('id'), $this->getPostObject(), $image, $thumb);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Teams/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Teams_Model_Team::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->TeamId);
        $this->assign("Language", $entity->TeamLanId);

        $this->assign('Nombre', $entity->TeamNombre);
        $this->assign('Cargo', $entity->TeamCargo);
        $this->assign('Resumen', $entity->TeamResumen);
        $this->assign('Thumb', $entity->TeamThumb);
        $this->assign('Image', $entity->TeamImage);
        $this->assign('Contenido', $entity->TeamContenido);
        $this->assign('Info', $entity->TeamInfo);
        $this->assign('Status', $entity->TeamStatus);



        $this->assign("languages", $languages);

    }

    public function Delete() {
        Teams_Model_Team::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Teams');
    }

}

?>