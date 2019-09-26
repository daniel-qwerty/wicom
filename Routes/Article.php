<?php

class Routes_Article extends Com_Application_Route {

    public $pattern = "/^(\w+|-)+\/note/";
    public $result = "_0_/Index/Notes/Note/";
}