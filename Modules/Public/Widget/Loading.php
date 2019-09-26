<?php

class Public_Widget_Loading extends Com_Object
{

    public $lan;

    /**
     *
     * @static
     * @access public
     * @return Public_Widget_Loading
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

    public function render()
    {
        ?>
        <style>
            body {
                padding: 0;
                margin: 0
            }

            #preload {
                position: absolute;
                top: 0;
                width: 100%;
                height: 100vh;
                z-index: 9000;
                background: black;
                text-align: center;
            }

            #preloader {
                position: absolute;
                left: 50%;
                top: 50%;
                width: 180px;
                transform: translate(-50%, -50%);
            }

            .preloader-item {
                width: 50px;
                height: 50px;
                margin: 5px;
                background: #CCCCCC;
                border-radius: 10px;
                float: left;
                display: block;
            }
            @media (max-width: 600px) {
                #preloader {
                    position: absolute;
                    left: 50%;
                    top: 50%;
                    width: 150px;
                    transform: translate(-50%, -50%);
                }

                .preloader-item {
                    width: 40px;
                    height: 40px;
                    margin: 5px;
                    background: #CCCCCC;
                    border-radius: 5px;
                    float: left;
                    display: block;
                }
            }

            .preloader-item1 {
                animation-name: pulse;
                animation-duration: 1.5s;
                animation-delay: 0.3s;
                animation-iteration-count: infinite;
            }

            .preloader-item2 {
                animation-name: pulse;
                animation-duration: 1.5s;
                animation-delay: 0.6s;
                animation-iteration-count: infinite;
            }

            .preloader-item3 {
                animation-name: pulse;
                animation-duration: 1.5s;
                animation-delay: 0.9s;
                animation-iteration-count: infinite;
            }

            @keyframes pulse {
                0% {
                    background-color: #FEED01;
                }
                33% {
                    background-color: #4EC4B8;
                }
                66%{
                    background-color: #951B80;
                }
                100% {
                    background-color: #D5043A;
                }
            }
        </style>
        <?PHP

    }

}
