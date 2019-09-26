<?php

class Notes_Widget_News extends Com_Object {

    private $lan;
    private $limit;
    private $category;

    /**
     *
     * @return Notes_Widget_News
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setLan($lan) {
        $this->lan = $lan;
        return $this;
    }

    public function setLimit($limit) {
        $this->limit = $limit;
        return $this;
    }
    
    public function setCategory($category) {
        $this->category = $category;
        return $this;
    }

    public function renderImportant() {

        $list = Notes_Model_Note::getInstance()->getImportant($this->lan->LanId, 1);
        foreach ($list as $new) {
            $date = date_create($new->NotDate);
            ?>

            <div class="inner-news-3-box-top">
                <div class="news-published">
                    <p class="news-date"><?=date_format($date, 'd');?> <br> <?=date_format($date, 'M');?></p>
                    <p class="news-year"><?=date_format($date, 'Y');?></p>
                </div>
                <img class="img-responsive" src="<?= Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?PHP echo $new->NotImage; ?>" alt="<?PHP echo $new->NotTitle; ?>">
            </div>
            <div class="inner-news-3-box-bottom">
                <h4><a href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "note/" . $new->NotId); ?>" title=""><?PHP echo $new->NotTitle; ?></a></h4>
                <p><?PHP echo $new->NotResume; ?></p>
            </div>

            <?php
        }
    }
    public function render() {

        $list = Notes_Model_Note::getInstance()->getList($this->lan->LanId, 2);
        foreach ($list as $new) {
            $date = date_create($new->NotDate);
            ?>

            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 margin-b-30">
                <div class="inner-news-3-box-top fixed-width pull-left">
                    <div class="news-published">
                        <p class="news-date"><?=date_format($date, 'd');?> <br> <?=date_format($date, 'M');?></p>
                        <p class="news-year"><?=date_format($date, 'Y');?></p>
                    </div>
                    <img class="img-responsive" src="<?= Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?PHP echo $new->NotImage; ?>" alt="<?PHP echo $new->NotTitle; ?>">
                </div>
                <div class="inner-news-3-box-bottom fixed-width pull-left">
                    <h4><a href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "note/" . $new->NotId); ?>" title=""><?PHP echo $new->NotTitle; ?></a></h4>
                    <p style="height: 55px;font-size: 12px;overflow: hidden;text-overflow: ellipsis;"><?PHP echo $new->NotResume; ?></p>
                </div>
            </div>

            <?php
        }
    }

    public function renderRecientes() {

        $list = Notes_Model_Note::getInstance()->getListRecientes($this->lan->LanId, 3);
        foreach ($list as $new) {
            $date = date_create($new->NotDate);
            ?>

            <div class="media solid-underline">
                <a class="pull-left" href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "note/" . $new->NotId); ?>">
                    <img class="media-object" src="<?= Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?PHP echo $new->NotImage; ?>" alt="<?PHP echo $new->NotTitle; ?>">
                </a>
                <div class="media-body">
                    <p><span><?=date_format($date, 'd M Y');?></span></p>
                    <p><?PHP echo $new->NotTitle; ?></p>
                </div>
            </div>


            <?php
        }
    }

    public function renderNews() {

        $list = Notes_Model_Note::getInstance()->getList($this->lan->LanId, 20);
        foreach ($list as $new) {
            $date = date_create($new->NotDate);
            ?>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="inner-page-news-box">
                    <div class="inner-news-box-top">
                        <div class="news-published">
                            <p class="news-date"><?=date_format($date, 'd');?> <br> <?=date_format($date, 'M');?></p>
                            <p class="news-year"><?=date_format($date, 'Y');?></p>
                        </div>
                        <img class="img-responsive" src="<?= Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?PHP echo $new->NotImage; ?>" alt="<?PHP echo $new->NotTitle; ?>">
                    </div>
                    <div class="inner-news-box-bottom">
                        <h4><a href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "note/" . $new->NotId); ?>" title=""><?PHP echo $new->NotTitle; ?></a></h4>
                        <p style="height: 55px;font-size: 12px;overflow: hidden;text-overflow: ellipsis;"><?PHP echo $new->NotResume; ?></p>
                        <a class="btn-read-more" href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "note/" . $new->NotId); ?>"><?= Texts_Helper_Text::getInstance()->get($this->lan, "txtReadMore")->TxtDescription; ?><i aria-hidden="true" class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>




            <?php
        }
    }

}
