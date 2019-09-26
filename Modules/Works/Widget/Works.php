<?php

class Works_Widget_Works extends Com_Object
{

    private $lan;
    private $parent = 0;

    /**
     *
     * @static
     * @access public
     * @return Works_Widget_Works
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

        $list = Works_Model_Work::getInstance()->getListService($this->lan->LanId);

//print_r($list);
        foreach ($list as $item) {

            ?>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 Construction Digging Tiling">
                <div class="featured-box">
                    <div class="overlay">
                        <div class="overlay-top">
                            <h3><a href="#"><?= $item->SerTitle ?></a></h3>
                        </div>
                        <a href="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?= $item->SerImage ?>" class="zoom" rel="gal"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                    </div>
                    <a href="#"><img src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?= $item->SerImage ?>" alt="<?= $item->SerTitle ?>"></a>
                </div>
            </div>






            <?PHP


        }
    }


}

?>
