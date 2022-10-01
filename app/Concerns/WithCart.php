<?php

namespace App\Concerns;

use Darryldecode\Cart\Facades\CartFacade as Cart;

trait WithCart
{
    // https://github.com/jantinnerezo/livewire-alert
    use \Jantinnerezo\LivewireAlert\LivewireAlert;

    public $sessionKey = 'default';

    public $cart_id;

    public function queryString()
    {
        return [
            'cart_id'
        ];
    }

    public function isEditCart(): bool
    {
        return isset($this->cart_id);
    }

    public function getCart()
    {
        return Cart::session($this->sessionKey)->get($this->cart_id);
        return Cart::get($this->cart_id);
    }

    public function getCarts()
    {
        return Cart::session($this->sessionKey)->getContent()->sort()->values();
        return Cart::getContent()->sort()->values();
    }

    public function isCartEmpty(): bool
    {
        return Cart::session($this->sessionKey)->isEmpty();
        return Cart::isEmpty();
    }

    public function getTotal()
    {
        return Cart::session($this->sessionKey)->getTotal();
        return Cart::getTotal();
    }

    /**
     * 加入購物車
     *
     * @param  mixed $data
     * @return void
     */
    public function addCart($data, $quantity = 1, $attributes = [])
    {
        Cart::session($this->sessionKey)->add(array(
            'id'            => $data['id'], // inique row ID
            'name'          => $data['name'],
            'price'         => $data['price'] ?? 0,
            'quantity'      => $quantity,
            'attributes'    => $attributes,
            'associatedModel' => $data->getModel(),
        ));
        return;
        Cart::add(array(
            'id'            => $data['id'], // inique row ID
            'name'          => $data['name'],
            'price'         => $data['price'] ?? 0,
            'quantity'      => $quantity,
            'attributes'    => $attributes,
            'associatedModel' => $data->getModel(),
        ));
    }

    /**
     * 更新購物車
     *
     * @param  mixed $id
     * @param  mixed $qty
     * @return void
     */
    public function updateCart($id, $quantity)
    {
        Cart::session($this->sessionKey)->update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $quantity
            ),
        ));
        return;
        Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $quantity
            ),
        ));
    }

    /**
     * 移除購物車
     *
     * @param  mixed $id
     * @return void
     */
    public function removeCart($id)
    {
        Cart::session($this->sessionKey)->remove($id);
        return;
        Cart::remove($id);
    }

    /**
     * 清空全部購物車
     *
     * @return void
     */
    public function clearAllCart()
    {
        Cart::session($this->sessionKey)->clear();
        Cart::session($this->sessionKey)->clearCartConditions();
        return;
        Cart::clear();
        Cart::clearCartConditions();
    }
}
