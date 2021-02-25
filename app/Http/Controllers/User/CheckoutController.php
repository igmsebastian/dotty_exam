<?php

namespace App\Http\Controllers\User;

use App\Enums\CacheKey;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Cart::content()->map(function($item){
            return [
                'id' => $item->id->id,
                'name' => $item->id->name,
                'author' => $item->id->author,
                'price' => $item->id->price,
                'media' => $item->id->getFirstMedia(\App\Enums\MediaGroup::PRODUCTS),
                'total' => $item->total,
                'qty' => $item->qty,
                'rowId' => $item->rowId
            ];
        });

        return view('user.checkout', compact('items'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);

        return redirect()->back();
    }
}
