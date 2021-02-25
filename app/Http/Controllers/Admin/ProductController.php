<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Enums\MediaGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Services\MediaService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request, MediaService $service)
    {
        $product = DB::transaction(function () use ($request, $service) {
            $product = Product::create($request->data());

            if($request->has('media')){
                $service->storeSingleFile($product, 'media', MediaGroup::PRODUCTS, 'products');
            }

            return $product;
        });

        return redirect()->route('admin.product.show', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, MediaService $service)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Product $product, MediaService $service)
    {
        $product->update($request->data());

        if($request->has('media')){
            $service->storeSingleFile($product, 'media', MediaGroup::PRODUCTS, 'products');
        }

        return redirect()->route('admin.product.show', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.product.index');
    }
}
