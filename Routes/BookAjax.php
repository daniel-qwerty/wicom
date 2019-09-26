<?php

class Routes_BookAjax extends Com_Application_Route {

    public $pattern = "/^(\w+|-)+\/b-ajax/";
    public $result = "_0_/Index/Books/Ajax/";
}