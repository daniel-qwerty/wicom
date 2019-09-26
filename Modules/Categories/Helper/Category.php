<?php

class Categories_Helper_Category extends Com_Object
{

    /**
     *
     * @return Categories_Helper_Category
     */
    public static function getInstance()
    {
        return self::_getInstance(__CLASS__);
    }

    public function get($lan, $alias)
    {
        return Categories_Model_Category::getInstance()->getByAlias($lan->LanId, $alias);
    }

    public function getId($lan, $id)
    {
        return Categories_Model_Category::getInstance()->getById($lan->LanId, $id);
    }

    public function getHexa($lan, $id)
    {
        $color = Categories_Model_Category::getInstance()->getById($lan->LanId, $id)->CatClass;
        switch ($color) {
            case 'm_amarillo':
                return '247, 200, 0';
            case 'm_esmeralda':
                return '78,196,184';
            case 'm_purpura':
                return '149,27,128';
            case 'm_lila':
                return '69,43,139';
            case 'm_rojo':
                return '213,4,58';
            case 'm_mostaza':
                return '176,191,56';
            case 'm_naranja':
                return '236,102,37';
            case 'm_gris':
                return '73,73,73';
            default:
                return '127,127,127';
        }
    }

}
