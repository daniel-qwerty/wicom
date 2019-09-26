<?php

class Public_Widget_Footer extends Com_Object {

    public $lan;

    /**
     *
     * @static
     * @access public
     * @return Public_Widget_Footer
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setLan($lan) {
        $this->lan = $lan;
        return $this;
    }

    public function render() {
        ?>
        <section>
            <div class="container-fluid">
                <div class="row text-center">
                    <div class="go-up tag m_amarillo">
                        <i class="fa fa-angle-up icon-white"></i>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4 col-footer color-gray-1">
                        <h2><?= Texts_Helper_Text::getInstance()->get($this->lan, "txtNavegacion")->TxtDescription ?></h2>
                        <ul>
                            <li><a data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" > Contacto</a></li>
                            <li><a data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo"> Escribe para nosotros</a></li>
                            <li><a onclick="addViewLink('kit','12-12-12','safari');" > Kit de ventas - Bolivia</a></li> //href="http://exmamagazine.com/docs/kit-ventas-bolivia.pdf"
                        </ul>
                    </div>
                    <div class="col-sm-4 col-footer color-gray-2">
                        <h2><?= Texts_Helper_Text::getInstance()->get($this->lan, "txtRedesSociales")->TxtDescription ?></h2>

                        <ul>
                            <li><a target="_blank" href="<?PHP echo Links_Helper_Link::getInstance()->get('LinkFacebook')->LinUrl; ?>"> Facebook</a></li>
                            <li><a target="_blank" href="<?PHP echo Links_Helper_Link::getInstance()->get('LinkTwitter')->LinUrl; ?>"> Twitter</a></li>
                            <li><a target="_blank" href="<?PHP echo Links_Helper_Link::getInstance()->get('LinkInstagram')->LinUrl; ?>"> Instagram</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 text-center col-footer color-gray-1">
                        <img class="logo img-responsive"
                             src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/logo_black.png" alt=""/>

                        <p class="copy"><?= Texts_Helper_Text::getInstance()->get($this->lan, "txtCopy")->TxtDescription ?> </p>

                                <div class="row">
                                    <div class="col-md-1 col-sm-1 col-xs-1"></div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <a href="#" data-toggle="modal" data-target="#boliviaModal">
                                            <img style="width: 30px;" src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/bolivia.png" alt="Bolivia">
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <a href="#" data-toggle="modal" data-target="#colombiaModal">
                                            <img style="width: 30px;" src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/colombia.png" alt="Colombia">
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <a href="#" data-toggle="modal" data-target="#mexicoModal">
                                            <img style="width: 30px;" src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/mexico.png" alt="Mexico">
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <a href="#" data-toggle="modal" data-target="#ecuadorModal">
                                            <img style="width: 30px;" src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/ecuador.png" alt="Ecuador">
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <a href="#" data-toggle="modal" data-target="#peruModal">
                                            <img style="width: 30px;" src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/peru.png" alt="Perú">
                                        </a>
                                    </div>
                                    <div class="col-md-1 col-sm-1 col-xs-1"></div>

                                </div>
                            </div>



                    </div>
                </div>
            </div>
        </section>
        <style>
            .modal-backdrop {
                z-index: -2000;
            }

            .modal-dialog {

                margin: 50px auto;
            }
        </style>
        <div class="modal " id="exampleModal" tabindex="-99999999999" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Contacto</h4>
                    </div>
                    <div class="modal-body">
                        <form id="formContact">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><?= Texts_Helper_Text::getInstance()->get($this->lan, "txtContactNombre")->TxtDescription ?>*</label>
                                <input type="text" class="form-control" id="name">
                            </div>                            
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><?= Texts_Helper_Text::getInstance()->get($this->lan, "txtContactTelefono")->TxtDescription ?></label>
                                <input type="text" class="form-control" id="phone">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><?= Texts_Helper_Text::getInstance()->get($this->lan, "txtContactEmail")->TxtDescription ?>*</label>
                                <input type="text" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label"><?= Texts_Helper_Text::getInstance()->get($this->lan, "txtContactMensaje")->TxtDescription ?>*</label>
                                <textarea class="form-control" id="message"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?= Texts_Helper_Text::getInstance()->get($this->lan, "txtContactCancelar")->TxtDescription ?></button>
                        <button onclick="sendContact();" type="button" class="btn btn-primary"><?= Texts_Helper_Text::getInstance()->get($this->lan, "txtContactEnviar")->TxtDescription ?></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal " id="exampleModal2" tabindex="-99999999999" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Escribe para nosotros</h4>
                        <p>Aguardamos tu respuesta y será un placer ver tu propuesta.</p>
                    </div>
                    <div class="modal-body">
                        <form id="formColaborar">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nombre*</label>
                                <input type="text" class="form-control" id="nombre">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Email*</label>
                                        <input type="text" class="form-control" id="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Telefono</label>
                                        <input type="text" class="form-control" id="telefono">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Ocupación</label>
                                        <input type="text" class="form-control" id="ocupacion">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Rubro*</label>
                                        <input type="text" class="form-control" id="rubro">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message-text" class="control-label">Perfil Resumido</label>
                                <textarea class="form-control" id="perfil"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">País</label>
                                        <input type="text" class="form-control" id="pais">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Web/Blog</label>
                                        <input type="text" class="form-control" id="web">
                                    </div>
                                </div>
                            </div>                           

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">¿Sobre qué temas te gustaría escribir en Marketing News?</label>
                                <input type="text" class="form-control" id="tema">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Articulo</label>
                                <input type="text" class="form-control" id="articulo">
                            </div> 
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?= Texts_Helper_Text::getInstance()->get($this->lan, "txtContactCancelar")->TxtDescription ?></button>
                        <button onclick="sendColaborar();" type="button" class="btn btn-primary"><?= Texts_Helper_Text::getInstance()->get($this->lan, "txtContactEnviar")->TxtDescription ?></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal " id="boliviaModal" tabindex="-99999999999" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div style="background-color: rgba(51, 52, 56, 0.95);" class="modal-content">
                    <div class="modal-header">
                        <button style="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 style="color:white;" class="modal-title" id="exampleModalLabel"><img style="width: 30px;" src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/bolivia.png" alt="Bolivia"> Contacto Bolivia</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div style="position: relative;"  class="col-md-5">
                                <div style="position:relative; top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 120px;" id="mapBolivia"></div>
                            </div>
                            <div class="col-md-7">
                                <p style="color:white;">
                                    <strong>LESLIE ALAVCONI Q.</strong> <br>
                                    <small>Av. Beni entre 3er. y 4to. Anillo - Calle 7 Este, No. 5</small> <br>
                                    <small> <strong>Teléfono:</strong> +591 3 340 0487</small> <br>
                                    <small> <strong>Celular:</strong> +591 7101 1835</small> <br>
                                    <small> <strong>Santa Cruz - Bolivia</strong></small></p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="modal " id="colombiaModal" tabindex="-99999999999" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div style="background-color: rgba(51, 52, 56, 0.95);" class="modal-content">
                    <div class="modal-header">
                        <button style="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 style="color:white;" class="modal-title" id="exampleModalLabel"><img style="width: 30px;" src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/colombia.png" alt="Colombia"> Contacto Colombia</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div style="position: relative;"  class="col-md-5">
                                <div style="position:relative; top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 120px;" id="mapColombia"></div>
                            </div>
                            <div class="col-md-7">
                                <p style="color:white;">
                                    <strong>DANIEL ESCUDERO.</strong> <br>
                                    <small>CARRERA 12ª # 83 – 75</small> <br>
                                    <small> <strong>Teléfono:</strong> (571) 4824201 Ext. 111 </small> <br>
                                    <small> <strong>Celular:</strong> 3173319509 </small> <br>
                                    <small> <strong>Bogotá -Colombia</strong></small></p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="modal " id="mexicoModal" tabindex="-99999999999" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div style="background-color: rgba(51, 52, 56, 0.95);" class="modal-content">
                    <div class="modal-header">
                        <button style="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 style="color:white;" class="modal-title" id="exampleModalLabel"><img style="width: 30px;" src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/mexico.png" alt="Mexico"> Contacto Mexico</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div style="position: relative;"  class="col-md-5">
                                <div style="position:relative; top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 120px;" id="mapMexico"></div>
                            </div>
                            <div class="col-md-7">
                                <p style="color:white;">
                                    <strong>KARINA MARTINEZ MEJIA</strong> <br>
                                    <small>Temistocles 34 - PH Col. Polanco México, CDMX C.P. 11560</small> <br>
                                    <small> <strong>Teléfono:</strong>  (52) 55 5281147  </small> <br>
                                    <small> <strong>Celular:</strong> +52 55 54320822​ </small> <br>
                                    <small> <strong>México, CDMX</strong></small></p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="modal " id="ecuadorModal" tabindex="-99999999999" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div style="background-color: rgba(51, 52, 56, 0.95);" class="modal-content">
                    <div class="modal-header">
                        <button style="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 style="color:white;" class="modal-title" id="exampleModalLabel"><img style="width: 30px;" src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/ecuador.png" alt="Ecuador"> Contacto Ecuador</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div style="position: relative;"  class="col-md-5">
                                <div style="position:relative; top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 120px;" id="mapEcuador"></div>
                            </div>
                            <div class="col-md-7">
                                <p style="color:white;">
                                    <strong>ANA MA. PESANTES </strong> <br>
                                    <small>Cedros #221 y ave primera, Urdesa.</small> <br>
                                    <small> <strong>Teléfono:</strong> +593 4 600 8166  </small> <br>
                                    <small> <strong>Guayaquil - Ecuador</strong></small></p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="modal " id="peruModal" tabindex="-99999999999" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div style="background-color: rgba(51, 52, 56, 0.95);" class="modal-content">
                    <div class="modal-header">
                        <button style="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 style="color:white;" class="modal-title" id="exampleModalLabel"><img style="width: 30px;" src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/peru.png" alt="Ecuador"> Contacto Perú</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div style="position: relative;"  class="col-md-5">
                                <div style="position:relative; top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 120px;" id="mapPeru"></div>
                            </div>
                            <div class="col-md-7">
                                <p style="color:white;">
                                    <strong>ANUOR AGUILAR </strong> <br>
                                    <small>Calle 3 #295 La Molina Lima</small> <br>
                                    <small> <strong>Teléfono:</strong> +51 983842831  </small> <br>
                                    <small> <strong>+51 983842831 </strong></small></p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <script>
            function initMap() {
                var bolivia = {lat: -25.363, lng: 131.044};
                var mapBolivia = new google.maps.Map(document.getElementById('mapBolivia'), {
                    zoom: 5,
                    center: bolivia
                });

                var marker = new google.maps.Marker({
                    position: bolivia,
                    map: mapBolivia
                });

                $("#boliviaModal").on("shown.bs.modal", function () {

                    google.maps.event.trigger(mapBolivia, "resize");
                    mapBolivia.setCenter(new google.maps.LatLng(-25.363, 131.044));
                });


                var colombia = {lat: -24.363, lng: 130.044};
                var mapColombia = new google.maps.Map(document.getElementById('mapColombia'), {
                    zoom: 5,
                    center: colombia
                });

                var marker = new google.maps.Marker({
                    position: colombia,
                    map: mapColombia
                });

                $("#colombiaModal").on("shown.bs.modal", function () {

                    google.maps.event.trigger(mapColombia, "resize");
                    mapColombia.setCenter(new google.maps.LatLng(-24.363, 130.044));
                });

                var mexico = {lat: -23.363, lng: 129.044};
                var mapMexico = new google.maps.Map(document.getElementById('mapMexico'), {
                    zoom: 5,
                    center: mexico
                });

                var marker = new google.maps.Marker({
                    position: mexico,
                    map: mapMexico
                });

                $("#mexicoModal").on("shown.bs.modal", function () {

                    google.maps.event.trigger(mapMexico, "resize");
                    mapMexico.setCenter(new google.maps.LatLng(-23.363, 129.044));
                });

                var ecuador = {lat: -22.363, lng: 128.044};
                var mapEcuador = new google.maps.Map(document.getElementById('mapEcuador'), {
                    zoom: 5,
                    center: ecuador
                });

                var marker = new google.maps.Marker({
                    position: ecuador,
                    map: mapEcuador
                });

                $("#ecuadorModal").on("shown.bs.modal", function () {

                    google.maps.event.trigger(mapEcuador, "resize");
                    mapEcuador.setCenter(new google.maps.LatLng(-22.363, 128.044));
                });

                var peru = {lat: -21.363, lng: 127.044};
                var mapPeru = new google.maps.Map(document.getElementById('mapPeru'), {
                    zoom: 5,
                    center: peru
                });

                var marker = new google.maps.Marker({
                    position: peru,
                    map: mapPeru
                });

                $("#peruModal").on("shown.bs.modal", function () {

                    google.maps.event.trigger(mapPeru, "resize");
                    mapPeru.setCenter(new google.maps.LatLng(-21.363, 127.044));
                });


            }




        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmEV4l3PDfRvgIo0gC1Tep2hRu0kHyFoY&callback=initMap">
        </script>


        <?PHP
    }

}
