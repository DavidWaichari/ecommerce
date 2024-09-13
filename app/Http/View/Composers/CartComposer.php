<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class CartComposer
{
    public function compose(View $view)
    {
        $cart = session()->get('cart', []);
        $cartCount = 0;
        $cartTotal = 0;

        if (is_array($cart)) {
            foreach ($cart as $item) {
                if (is_array($item) && isset($item['quantity'])) {
                    $cartCount += $item['quantity'];
                }
                if (is_array($item) && isset($item['price']) && isset($item['quantity'])) {
                    $cartTotal += $item['price'] * $item['quantity'];
                }
            }
        }

        $view->with('cart', $cart);
        $view->with('cartCount', $cartCount);
        $view->with('cartTotal', $cartTotal);
    }
}
