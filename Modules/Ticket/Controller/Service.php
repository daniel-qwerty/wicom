<?php

class Ticket_Controller_Service extends Com_Module_Controller_Json {

    public function Save() {
        if ($this->isPost()) {
            $obj = $this->getPostObject();
            Ticket_Model_Ticket::getInstance()->doInsert($obj, null);
            $this->sendEmail($obj->Email, $obj->Name, $obj->Resume, $obj->action, $obj->serial );
            echo json_encode(true);
        }
    }

    private function sendEmail($emailClient, $nameClient, $resumenClient, $actionsClient, $serialClient) {

        $to = Configurations_Helper_Configuration::getInstance()->getKey('EMAIL_CONTACT');
        $subject = 'Nuevo Ticket de Soporte Técnico';
        $message = '<html><body>';
        $message .= '<h3>Nombre: </h3>'.$nameClient.'<br> <h3>Email: </h3>'.$emailClient.'<br> <h3>Serial: </h3>'.$serialClient.'<br> <h3>Resumen: </h3>'.$resumenClient.'<br> <h3>Acciones: </h3>'.$actionsClient;
        $message .= '</body></html>';
        $headers = 'From:'.$emailClient . "\r\n" .
                'Reply-To:'.$emailClient. "\r\n" .
                'Content-Type: text/html; charset=ISO-8859-1\r\n';
                'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

    }

}
