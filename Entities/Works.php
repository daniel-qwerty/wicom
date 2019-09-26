<?php

class Entities_Works extends Com_Database_Entity_Language{

    public $tableName = "Works";
    public $keyField = "SerId";
    public $lanField = "SerLanId";
    
    public $SerId;
    public $SerLanId;
    public $SerTitle;
    public $SerDescription;
    public $SerImage;
    public $SerStatus;
    public $SerResume;

}
