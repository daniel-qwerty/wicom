<?php

class Notes_Widget_Important extends Com_Object
{

    private $lan;
    private $limit;

    /**
     *
     * @return Notes_Widget_Important
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
        $count = 0;
        $list = Notes_Model_Note::getInstance()->getImportant($this->lan->LanId, $this->limit);
        foreach ($list as $new) {

            ?>

            <div class="post-news height-390 post-news-mod-3 post-important"
                 style="position:relative;background-image: url(<?= Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?PHP echo $new->NotImage; ?>);background-size: cover;">
                <div style="background:rgba(0,0,0,0.3);position:absolute;top: 0;bottom: 0;left: 0;right: 0;"></div>
                <div class="post-header"><a target="_self"
                        href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "notes/" . $new->NotCatId); ?>"
                        class="tag <?= Categories_Helper_Category::getInstance()->getId($this->lan, $new->NotCatId)->CatClass; ?>"><?= Categories_Helper_Category::getInstance()->getId($this->lan, $new->NotCatId)->CatAlias; ?></a>
                </div>
                <div class="post-body"><a target="_self"
                        href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "article/" . $new->NotId); ?>"
                        class="h4"><?= $new->NotTitle; ?></a>

                    <p style="display: none"><?= $new->NotResume; ?></p>
                </div>
                <div class="post-footer">
                    <div class="post-meta"><a
                            href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "article/" . $new->NotId); ?>">
                            <time datetime="2015"><?= $new->NotDate; ?></time>
                        </a></div>
                    <a target="_self" href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "article/" . $new->NotId); ?>"
                       class="btn btn-transparent">
                        <i class="fa fa-arrow-right"
                           style="font-size: 24px;display: inline-block;text-align: center;vertical-align: middle;transition: .4s;padding-top: 5px;"></i>
                        <span>read more</span>
                    </a>
                </div>
            </div>

            <?php

        }
    }

}
