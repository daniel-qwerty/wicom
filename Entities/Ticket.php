<?php

class Entities_Ticket extends Com_Database_Entity_Language {

    public $tableName = "Ticket";
    public $keyField = "TikId";
    public $lanField = "TikLanId";
    
    public $TikId;
    public $TikLanId;
    public $TikDate;
    public $TikEmail;
    public $TikName;
    public $TikSerial;
    public $TikResume;
    public $TikAction;
    public $TikStatus;

}
