<?php

class Notes_Widget_Recientes extends Com_Object
{

    private $lan;
    private $limit;
    private $category;

    /**
     *
     * @return Notes_Widget_Recientes
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

    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    public function render()
    {
        $list = Notes_Model_Note::getInstance()->getList($this->lan->LanId,1, 3);
        ?>
        <?php foreach ($list as $new): ?>
            <div class="col-sm-4">
                <article class="news">
                    <a class="news-thumb" style="height: 200px;" href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "article/" . $new->NotId); ?>">
                        <img style="height: 100%;" class="img-responsive" src="<?= Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?= $new->NotImage; ?>" alt="...">
                    </a>
                    <div class="news-content">
                        <h3 class="news-title"><a href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "article/" . $new->NotId); ?>"><?PHP echo $new->NotTitle; ?></a></h3>
                        <p class="news-metas">
                            <span class="news-meta admin-meta"><i class="fa fa-user"></i> <?PHP echo $new->NotUser; ?></span>
                            <span class="news-meta calendar-meta"><i class="fa fa-calendar"></i> <?= $new->NotDate ?></span>
                        </p>
                        <p class="news-excerpt"><?PHP echo $new->NotResume; ?></p>
                    </div>
                </article>
            </div>

        <?php endforeach; ?>
        
        <?php
    }

    public function renderSmall()
    {
        $list = Notes_Model_Note::getInstance()->getListRecientes($this->lan->LanId, 5);
        ?>
<?php foreach ($list as $new): ?>
        <div class="recent-post">
            
            <div class="post-content">
                <h5 class="post-title"><a href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "article/" . $new->NotId); ?>"><?PHP echo $new->NotTitle; ?></a></h5>              
                <p class="news-metas">
                            <span class="news-meta admin-meta"><i class="fa fa-user"></i> <?PHP echo $new->NotUser; ?></span>
                            <span class="news-meta calendar-meta"><i class="fa fa-calendar"></i> <?= $new->NotDate ?></span>
                        </p>
            </div>
        </div>
<?php endforeach; ?>

        
<?php
}

public function renderColum()
{

    $url = get('REQUEST_URI');
    $url = explode("/", $url);
    $url = $url[count($url) - 1];
    $list = Notes_Model_Note::getInstance()->getListRecientesByCategory($this->lan->LanId, $url, 5);

    ?>
    <div class="sidebar-module module-post text-left hidden-sm hidden-xs">
        <h5>Post recientes</h5>
        <ul>
            <?php
            foreach ($list as $new) {
                ?>
                <li>
                    <a href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "article/" . $new->NotId); ?>">
                        <p>
                            <?= $new->NotTitle; ?>
                        </p>
                    </a>
                    <span><i class="fa fa-calendar"></i> <?= $new->NotDate; ?></span>
                </li>

                <?php } ?>
            </ul>

        </div>


        <?php
    }

}
