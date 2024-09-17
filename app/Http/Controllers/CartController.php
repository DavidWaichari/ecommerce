<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = max(1, $request->input('quantity', 1)); // Ensure quantity is at least 1

        // Find the product by ID
        $product = Product::findOrFail($productId);

        // Convert the product to an associative array to add the quantity
        $productArray = $product->toArray();

        // Get the current cart from the session as an array of objects
        $cart = session()->get('cart', []);

        // Check if the product already exists in the cart by looping through the array
        $found = false;
        foreach ($cart as &$cartItem) {
            if ($cartItem['id'] == $productId) {
                // If the product exists, increment the quantity
                $cartItem['quantity'] += $quantity;
                // Update the total for the existing item
                $cartItem['total'] = $cartItem['quantity'] * $product->discount_price;
                $found = true;
                break;
            }
        }

        // If the product does not exist, add it as a new item
        if (!$found) {
            // Add the quantity to the product array
            $productArray['quantity'] = $quantity;
            // Calculate the total price for the new item
            $productArray['total'] = $productArray['quantity'] * $product->discount_price;
            $cart[] = $productArray;
        }

        // Update the session cart
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    public function viewCart()
    {
        // Retrieve the cart from the session
        $cart = session()->get('cart', []);
        $shipping_cost = 0;
        // Render the cart view with the cart items
        return view('client.cart', ['cart_items' => $cart, 'shipping_cost'=> $shipping_cost]);
    }

    public function removeFromCart($productId)
    {

        // Retrieve the cart from the session
        $cart = session()->get('cart', []);

        // Check if the product exists in the cart and removpe it
        foreach ($cart as $key => $cartItem) {
            if ($cartItem['id'] == $productId) {
                unset($cart[$key]);
                break;
            }
        }

        // Update the session with the modified cart
        session()->put('cart', array_values($cart)); // Reindex array

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }

    public function updateCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = max(1, $request->input('quantity')); // Ensure quantity is at least 1

        // Retrieve the cart from the session
        $cart = $this->updateCartItems($productId, $quantity);
        return redirect()->back()->with('success', 'Cart updated successfully!');
    }


    public function updateCartAjax(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = max(1, $request->input('quantity')); // Ensure quantity is at least 1

        // Retrieve the cart from the session
        $cart = session()->get('cart', []);

        // If the product exists in the cart, update its quantity
        foreach ($cart as &$cartItem) {
            if ($cartItem['id'] == $productId) {
                $cartItem['quantity'] = $quantity;
                break;
            }
        }

        // Update the session with the modified cart
        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully!'
        ]);
    }

    public function updateMultiple (Request $request)
    {
        // return $request->all();
        $product_ids = $request->product_ids;
        $quantities = $request->quantities;

        //loop through the products
        foreach ($product_ids as $key => $value) {
           //update the cart items
           $this->updateCartItems($value, $quantities[$key]);
        }

        return redirect()->back()->with('success', 'Cart updated successfully!');

    }

    public function updateCartItems($productId, $quantity)
    {

        $product = Product::find($productId);
        // Retrieve the cart from the session
        $cart = session()->get('cart', []);

        // Loop through the cart to find the product
        foreach ($cart as &$cartItem) {
            if ($cartItem['id'] == $productId) {
                // Update the product's quantity
                $cartItem['quantity'] = $quantity;
                //update the total
                $cartItem['total'] = $quantity * $product->discount_price;
                break;
            }
        }

        // Update the session with the modified cart
        session()->put('cart', $cart);

        return true;
    }
}
