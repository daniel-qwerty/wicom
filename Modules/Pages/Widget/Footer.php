<?php

class Pages_Widget_Footer extends Com_Object {



    /**
     *
     * @static
     * @access public
     * @return Pages_Widget_Footer
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }



    public function render() {
        ?>
<footer>
    <div class="footer-area-top section-space-b-less-30"
        style=" background: url(<?= Com_Helper_Url::getInstance()->getImage(); ?>/Public/lineas.png); background-repeat: repeat-y; background-size: contain; background-color: #002b5a; ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-b-30">
                    <h3>Acerca de la compañía</h3>
                    <p>Wicom es una empresa de diseño de soluciones llave en mano, ofreciendo también consultorías en
                        proyectos referidos a nuestro campo de trabajo, para cualquier institución o empresa de
                        tecnología.</p>
                    <ul class="footer-social hidden">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-b-30">
                    <h3 class="hidden">Twitter Feed</h3>
                    <ul class="twitter-feed hidden">
                        <li>
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                            <p>Looking for an awesome CREATIVE WordPress Theme? Esquise run even better.</p>
                            <a href="#">http://t.co/0WWEMQEQ48</a>
                            <p><span>3 Days ago</span></p>
                        </li>
                        <li>
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                            <p>Looking for an awesome CREATIVE WordPress Theme? Esquise run even better.</p>
                            <a href="#">http://t.co/0WWEMQEQ48</a>
                            <p><span>3 Days ago</span></p>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-b-30">
                    <h3 class="hidden">Flickr Photos</h3>
                    <ul class="flickr-photos hidden">
                        <li><a href="#"><img class="img-responsive" src="img/flickr/1.jpg" alt="flickr1"></a></li>
                        <li><a href="#"><img class="img-responsive" src="img/flickr/2.jpg" alt="flickr2"></a></li>
                        <li><a href="#"><img class="img-responsive" src="img/flickr/3.jpg" alt="flickr3"></a></li>
                        <li><a href="#"><img class="img-responsive" src="img/flickr/4.jpg" alt="flickr4"></a></li>
                        <li><a href="#"><img class="img-responsive" src="img/flickr/5.jpg" alt="flickr5"></a></li>
                        <li><a href="#"><img class="img-responsive" src="img/flickr/6.jpg" alt="flickr6"></a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-b-30">
                    <h3>Casa Matriz</h3>
                    <ul class="corporate-address">
                        <li>Calle A. Patiño Nro. 105 Edif. Torre
                            Empresarial Titanium </li>
                        <li>Piso 7 Of. 704 Zona Calacoto, La Paz -
                            Bolivia</li>
                        <li>info@wicom.com.bo</li>
                        <li>Telf: 591-2-2791050 - Cel: 79506414</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-area-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p>Copyrights Wicom <?= date('Y')?>. All Rights Reserved. &nbsp; Powered by<a
                            style="color: lightslategray" href="http://neblux.com" target="_blank"> Neblux Bolivia</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<?PHP
    }

}