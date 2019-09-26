<?php

class SlideShows_Widget_Slideshow extends Com_Object {

    private $lan;



    /**
     *
     * @static
     * @access public
     * @return SlideShows_Widget_Slideshow
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setLan($lan) {
        $this->lan = $lan;
        return $this;
    }


    public function renderImages() {

        $list = SlideShows_Model_SlideShow::getInstance()->getListEnable($this->lan->LanId);
        $num = 0;
        ?>

        <div id="ensign-nivoslider" class="slides"> <?PHP
            foreach ($list as $slide) {
                $num=$num+1;
                ?>

                <img src="<?= Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $slide->SliImage; ?>" alt="" title="#slider-direction-<?= $num?>"  />

            <?PHP } ?>
        </div>

        <?PHP

    }

    public function renderSlides() {

        $list = SlideShows_Model_SlideShow::getInstance()->getListEnable($this->lan->LanId);

        foreach ($list as $slide) {?>

            <div id="slider-direction-1" class="t-cn slider-direction">
                <div class="slider-content t-cn s-tb slider-1">
                    <div class="title-container s-tb-c title-compress">
                        <h1 class="title1"><?php echo $slide->SliTitle; ?></h1>
                        <div class="details-content">
                            <p><?php echo $slide->SliDescription; ?></p>
                        </div>
                        <div class="read-more hidden">
                            <ul>
                                <li><a href="<?php echo $slide->SliLink; ?>" class="btn-read-more-transparent"><?= Texts_Helper_Text::getInstance()->get($this->lan, "txtReadMore")->TxtDescription; ?> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <?PHP
        }

    }

}
