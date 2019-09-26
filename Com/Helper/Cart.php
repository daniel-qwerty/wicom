<?php

/**
 * Created by PhpStorm.
 * User: csuaznabar
 * Date: 4/5/17
 * Time: 11:12 AM
 */
class Com_Helper_Cart extends Com_Object
{

    /**
     * @return Com_Helper_Cart
     */

    private $arg_cart = "cart-items";


    public static function getInstance()
    {

        return self::_getInstance(__CLASS__);
    }

    public function getCart()
    {
        return $_SESSION[$this->arg_cart];
    }

    public function getCartCount()
    {
//        unset($_SESSION[$this->arg_cart]);
        if (isset($_SESSION[$this->arg_cart]))
            return count($_SESSION[$this->arg_cart]);
        else
            return 0;
    }

    public function addItem($id, $producto, $precio, $cantidad, $total)
    {
        if (isset($_SESSION[$this->arg_cart][$id])) {
            $_SESSION[$this->arg_cart][$id]['cantidad']++;
            $_SESSION[$this->arg_cart][$id]['precio'] = $precio;
            $_SESSION[$this->arg_cart][$id]['total'] = $_SESSION[$this->arg_cart][$id]['cantidad'] * $_SESSION[$this->arg_cart][$id]['precio'];

        } else {
            $_SESSION[$this->arg_cart][$id] = [
                'id' => $id,
                'producto' => $producto,
                'precio' => $precio,
                'cantidad' => $cantidad,
                'total' => $total,
                'tipo' => 1,
            ];
        }

        print_r($_SESSION[$this->arg_cart]);
    }

    public function removeItem($id)
    {
        unset($_SESSION[$this->arg_cart][$id]);
    }

    public function getTotal()
    {
        $total = 0;
        if (!empty($_SESSION[$this->arg_cart]))
            foreach ($_SESSION[$this->arg_cart] as $key => $item) {
                $total += $_SESSION[$this->arg_cart][$key]['precio'] * $_SESSION[$this->arg_cart][$key]['cantidad'];
            }
        return $total;
    }

    public function clear()
    {
        unset($_SESSION[$this->arg_cart]);
    }

}
