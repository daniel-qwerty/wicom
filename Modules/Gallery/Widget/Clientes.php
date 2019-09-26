<?php

class Gallery_Widget_Clientes extends Com_Object
{

    private $lan;
    private $limit;


    /**
     *
     * @return Gallery_Widget_Clientes
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

    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }


    public function render()
    {

        $list = Gallery_Model_Gallery::getInstance()->getList($this->lan->LanId, 20);
        foreach ($list as $new) {
            ?>
            <div class="brand-box">
                <a target="_blank" href="<?PHP echo $new->GalName; ?>"><img class="img-responsive" src="<?= Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?PHP echo $new->GalFile; ?>" alt="<?PHP echo $new->GalName; ?>"></a>
            </div>

        <?php } ?>

        <?PHP
    }

}
