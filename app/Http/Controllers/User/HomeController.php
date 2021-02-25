<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Enums\CacheKey;
use App\Models\Product;
use App\Enums\MediaGroup;
use App\Models\OrderItem;
use App\Enums\OrderStatus;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeController extends Controller
{
    /**
     * Fetch the current user.
     *
     * @return \Illuminate\Support\Facades\Auth
     */
    protected function guard()
    {
        return Auth::guard('user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserService $service)
    {
        $products = Product::public()->get()->map(function($product){
            return [
                'id' => $product->id,
                'name' => $product->name,
                'author' => $product->author,
                'price' => $product->price,
                'media' => $product->getFirstMedia(MediaGroup::PRODUCTS)
            ];
        });

        $cartItems = $this->cartItems();

        $ownedItems = $service->getOwnedItems()->toArray();

        return view('user.index', compact('products', 'cartItems', 'ownedItems'));
    }

    /**
     * Add Instance to Cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Product $product)
    {
        if(!$this->cartItems()->contains('product_id', $product['id'])){
            Cart::add($product, $product->name, 1, $product->price, ['product_id']);
        }

        return redirect()->back();
    }

    /**
     * Perform purchase on the cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function purchase(Request $request, UserService $service)
    {
        // Get user instance.
        $user = $service->getInstance();

        // Made a purchase
        $order = Order::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'qty' => intval(Cart::count()),
            'total' => Cart::content()->sum('price'),
            'status' => OrderStatus::PENDING
        ]);

        $products = Cart::content()->map(function($item) use ($order){
            return [
                'order_id' => $order->id,
                'product_id' => $item->id->id
            ];
        });

        OrderItem::insert($products->values()->toArray());

        // Clear Cart
        Cart::destroy();

        return redirect()->route('home');
    }

    /**
     * Get Cart Contents.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function cartItems()
    {
        return Cart::content()->map(function($item){
            return [
                'product_id' => $item->id->id,
            ];
        });
    }
}
