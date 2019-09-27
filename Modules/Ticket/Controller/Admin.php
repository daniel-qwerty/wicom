<?PHP

class Ticket_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Ticket";
        Com_Helper_BreadCrumbs::getInstance()->add("Contacto", "/Admin/Ticket");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Ticket/Add");
        $languages = Language_Model_Language::getInstance()->getList();

        if ($this->isPost()) {
            $id = Ticket_Model_Ticket::getInstance()->doInsert($this->getPostObject(), $languages);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Ticket/Edit/id/' . $id);
        }
        $this->assign('Email');
        $this->assign('Name');
        $this->assign('Serial');
        $this->assign('Resume');
        $this->assign('Action');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Ticket/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);

        if ($this->isPost()) {
            Ticket_Model_Ticket::getInstance()->doUpdate(get('id'), $this->getPostObject());
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Ticket/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Ticket_Model_Ticket::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->TikId);
        $this->assign("Language", $entity->TikLanId);
        $this->assign('Date', $entity->TikDate);
        $this->assign('Email', $entity->TikEmail);
        $this->assign('Name', $entity->TikName);
        $this->assign('Serial', $entity->TikSerial);
        $this->assign('Resume', $entity->TikResume);
        $this->assign('Action', $entity->TikAction);
        $this->assign('Status', "1");

        $this->assign("languages", $languages);
        
        
    }

    public function Delete() {
        Ticket_Model_Ticket::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Ticket');
    }

    public function Export() {
        Com_Helper_BreadCrumbs::getInstance()->add("Exportar", "/Admin/Ticket/Export");
        Com_Helper_Style::getInstance()->addFile("report.css");
        $list = Ticket_Model_Ticket::getInstance()->getList();
        $this->assign("list", $list);
    }

    public function Reply() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Ticket/Reply");


        if ($this->isPost()) {
            $to = $_POST['To'];
            $subject = $_POST['Subject'];
            $headers = "From: " . strip_tags($_POST['From']) . "\r\n";
            $headers .= "Reply-To: " . strip_tags($_POST['From']) . "\r\n";
            $headers .= "CC: daniel@neblux.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $message = '<html><body>';
            $message .= $_POST['Message'];
            $message .= '</body></html>';
            
            mail($to, $subject, $message, $headers);
            
            Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Mensaje enviado con exito");
        }
        $this->assign('To');
        $this->assign('From');
        $this->assign('Message');
        $this->assign('Subject');
    }

}

?>