<?php

class Teams_Widget_Team extends Com_Object
{

    private $lan;
    private $parent = 0;

    /**
     *
     * @static
     * @access public
     * @return Teams_Widget_Team
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

        $list = Teams_Model_Team::getInstance()->getListTeam($this->lan->LanId);

        foreach ($list as $item) {

            ?>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 margin-b-30">
                <div class="team-box">
                    <div class="overlay-box">
                        <div class="overlay">
                            <?= $item->TeamInfo ?>
                        </div>
                        <div class="img-back-side">
                            <a href="#"><img class="img-responsive" src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?= $item->TeamThumb ?>" alt="<?= $item->TeamNombre ?>"></a>
                        </div>
                    </div>
                    <h3><a href="#"><?= $item->TeamNombre ?></a></h3>
                    <p><?= $item->TeamCargo ?></p>
                </div>
            </div>



            <?PHP


        }
    }



}

?>
