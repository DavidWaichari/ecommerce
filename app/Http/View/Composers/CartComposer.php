<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class CartComposer
{
    public function compose(View $view)
    {

        // Retrieve the cart from the session
        $cart = session()->get('cart', []);

        $cart_items = collect($cart);

        $view->with('cart_items', $cart_items);
    }
}
