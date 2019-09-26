<?php

class Public_Widget_Suscribite extends Com_Object
{

    public $lan;

    /**
     *
     * @static
     * @access public
     * @return Public_Widget_Suscribite
     */
    public static function getInstance()
    {
        return self::_getInstance(__CLASS__);
    }

    public function setLan($lan)
    {
        $this->lan = $lan;
        return $this;
    }

    public function render()
    {
        ?>
        <div class="sidebar-module bg-gray module-suscribe-magazine text-left">
            <h5 style="background-color:#7d16ee; color: #f5f5f5;text-align: center;">Suscribete</h5>

            <div class="magazine-container m_esmeralda">
                <a target="_blank" href="http://exmamagazine.com/market/">
                <img src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/magazine01.jpg"
                     alt=""/></a>
            </div>
            <img style="width: 60px; margin-top: -8px;"
                 src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/suscribe-decor.png" alt="">
            <div class="magazine-container-decoration"></div>

            <p>¿Te gustó lo que leíste en nuestra web? Te invitamos a que te suscribas a nuestra revista impresa para que recibas en tus manos estos y más artículos de tu interés</p>
        </div>
        <?PHP
    }

}
