<?php

namespace App\Http\Controllers\User;

use App\Enums\MediaGroup;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserService $service)
    {
        $orders = $service->getOrders();
        return view('user.order.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('user.order.show', compact('order'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function download(Order $order, Product $product)
    {
        $media  = $product->getFirstMedia(MediaGroup::PRODUCTS);
        return response()->download($media->getPath(), $media->file_name);
    }
}
