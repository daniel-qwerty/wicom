<?php

class Public_Controller_Index extends Com_Module_Controller_Language {

    public $lan;
    public $translator;
    public $country;

    public function init() {

        if (get('sessionCliente') == '0') {
            set('cliente','0', "SESSION");
        }  else {
            set('cliente','1', "SESSION");
        }        
        $this->setLayout("index");
        $this->lan = Language_Model_Language::getInstance()->getByCode($this->language);
        $fileDir = Com_Helper_Url::getInstance()->physicalDirectory . '/Languages/' . $this->lan->LanCode . ".language";

//        if (!(file_exists($fileDir))) {
//            $this->redirect(Com_Helper_Url::getInstance()->generateUrl("es", "error"));
//            exit;
//        }
//
//        if($this->lan->LanCode!="es"){
//            $this->redirect(Com_Helper_Url::getInstance()->generateUrl("es", "error"));
//            exit;
//        }

        $this->translator = json_decode(file_get_contents($fileDir));

        if (get("publicCountry") == "") {
            $ip = get('REMOTE_ADDR');
            if ($ip != "::1") {
                $geoData = Com_Helper_GeoCode::getInstance()->getData($ip);
                $countryCode = $geoData->country_code;
            } else {
                $countryCode = "BO";
            }
            $this->country = Public_Model_Country::getInstance()->getByCode($countryCode);
            set('publicCountry', $this->country, "SESSION");
        } else {
            $this->country = get("publicCountry");
        }

        //Tracking_Model_Tracking::getInstance()->doInsert($_SERVER['REMOTE_ADDR'], Com_Helper_Url::getInstance()->getUrl(), isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '', $_SERVER['PHP_SELF'], date("Y-m-d"), date("H:i:s"), $_SERVER['HTTP_USER_AGENT']);

        //Statistics_Model_Visit::getInstance()->doInsert(get('REMOTE_ADDR'), date("Y-m-d"), date("H:i:s"), Com_Helper_Url::getInstance()->getUrl(), $this->lan->LanId, $this->country->co);
        //validate Search
        if ($this->isPost()) {
            //Redireccionamos al metodo search
            $obj = $this->getPostObject();
            if (isset($obj->pattern)) {
                $this->redirect(Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "Index/Public/Search/pattern/" . $obj->pattern));
            }
        }

        $this->assign("languages", Language_Model_Language::getInstance()->getList());
    }

    public function Index() {
        $obj = Pages_Model_Pages::getInstance()->getByHome($this->lan->LanId);
        if ($obj->PagId > 0) {
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/' . $this->lan->LanCode . '/page/' . $obj->PagUrl);
        } else {
            Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_WARNING, "No existen paginas registradas");
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin');
        }
    }

    public function Login() {
        $this->setLayout("public_login");
    }

    private function sendEmail($emailClient, $nameClient, $messageClient, $doc, $docName, $image, $imageName) {
        $email = new Com_Wizard_Mail();
        $strTitle = strtoupper("Nuevo Registro de Historia");
        $strLogo = Com_Helper_Url::getInstance()->getImage() . "/Public/logo.jpg";
        $email->setSubject($strTitle);
        $email->setFrom(EMAIL_USERNAME, EMAIL_FROM);
        $strMessage = file_get_contents(Com_Helper_Url::getInstance()->physicalDirectory . "/Resources/Layouts/email/contact.phtml");
        $strMessage = str_replace("{Logo}", $strLogo, $strMessage);
        $strMessage = str_replace("{Title}", $strTitle, $strMessage);
        $strMessage = str_replace("{Contact.Date}", date("d/m/Y H:i:s"), $strMessage);
        $strMessage = str_replace("{Contact.Name}", $nameClient, $strMessage);
        $strMessage = str_replace("{Contact.Email}", $emailClient, $strMessage);
        $strMessage = str_replace("{Contact.Content}", $messageClient, $strMessage);
        $strMessage = str_replace("{Footer}", "", $strMessage);
        $list = Configurations_Helper_Configuration::getInstance()->getKey("EMAIL_CONTACT");
        $list = explode(",", $list);
        foreach ($list as $obj) {
            $email->addAddress($obj, $obj);
        }
        $email->addAttachment($doc, $docName);
        $email->addAttachment($image, $imageName);

        $email->setMessage($strMessage);
        $email->send();
    }

    public function Error() {
        $this->setLayout("error");
    }

}
