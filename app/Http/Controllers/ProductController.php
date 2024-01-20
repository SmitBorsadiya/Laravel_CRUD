<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Repository\ProductRepository;

class ProductController extends Controller
{
    protected $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = $this->productRepository->getProduct();
        if (isset($product['status']) && isset($product['data']) && isset($product['message'])) {
            if ($product['status'] >= 200 && $product['status'] < 400) {
                return $this->sucResponse($product['status'], $product['data'], $product['message']);
            }
            if ($product['status'] >= 400 && $product['status'] <= 500) {
                return $this->errResponse($product['status'], $product['data'], $product['message']);
            }
        }
        return response()->json(['message' => true, 'data' => $product]);

        // return $product;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        $input = $request->all();
        // dd($input);
        $product = productRepository::addProduct($input);
        return response()->json(['message' => 'Product created successfully', 'data' => $product]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        //
        $input = $request->all();
        // dd($input);
        // dd($id);
        $product = productRepository::updateProduct($input, $id);
        return response()->json(['message' => 'Product updated successfully', 'data' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = productRepository::deleteProduct($id);
        return response()->json(['message' => 'Product deleted successfully', 'data' => $product]);

    }
}
