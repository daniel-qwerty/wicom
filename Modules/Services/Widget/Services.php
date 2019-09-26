<?php

class Services_Widget_Services extends Com_Object
{

    private $lan;
    private $parent = 0;

    /**
     *
     * @static
     * @access public
     * @return Services_Widget_Services
     */
    public static function getInstance()
    {
        return self::_getInstance(__CLASS__);
    }

    public function setParent($id)
    {
        $this->parent = $id;
        return $this;
    }

    public function setLan($lan)
    {
        $this->lan = $lan;
        return $this;
    }

    /**
     * @access public
     */
    public function render()
    {

        $list = Services_Model_Service::getInstance()->getListService($this->lan->LanId);


        foreach ($list as $item) {

            ?>



            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="page-services-2-box">
                    <div class="media">
                        <a href="#" class="pull-left">
                            <i class="<?= $item->SerIcono ?>"></i>
                        </a>
                        <div class="media-body">
                            <h3 class="section-sub-title"><a href="#"><?= $item->SerTitle ?></a></h3>
                            <p><?= $item->SerDescription ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <?PHP


        }
    }


}

?>
