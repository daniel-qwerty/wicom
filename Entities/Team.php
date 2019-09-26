<?php

class Entities_Team extends Com_Database_Entity_Language{

    public $tableName = "Team";
    public $keyField = "TeamId";
    public $lanField = "TeamLanId";
    
    public $TeamId;
    public $TeamLanId;
    public $TeamNombre;
    public $TeamCargo;
    public $TeamResumen;
    public $TeamThumb;
    public $TeamImage;
    public $TeamContenido;
    public $TeamInfo;
    public $TeamStatus;


}
