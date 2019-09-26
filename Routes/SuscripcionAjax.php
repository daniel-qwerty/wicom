<?php

class Routes_SuscripcionAjax extends Com_Application_Route {

    public $pattern = "/^(\w+|-)+\/s-ajax/";
    public $result = "_0_/Index/Suscription/Ajax/";
}