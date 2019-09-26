<?php

class Entities_LinkTracking extends Com_Database_Entity {

    public $tableName = "TrackLinks";
    public $keyField = "id";
    public $id;
    public $link;
    public $date;
    public $browser;

}