<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepository
{
    public static function getProduct()
    {
        $product = Product::all();
        if ($product) {
            return $product;
        } else {
            return "No Product Found";
        }
    }
    public static function addProduct(array $input)
    {
        try {
            // dd($input);
            $product = new Product;
            $product->name = $input['name'];
            $product->salt_composition = $input['salt_composition'];
            $product->packsize = $input['packsize'];
            $product->price = $input['price'];
            $product->slug = $input['slug'];
            // dd($product);
            // $product->images = ($input['images'][0]);
            $product->save();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public static function updateProduct(array $input, $id)
    {
        try {
            if ($id == null) {
                return "ID is NULL!!";
            } elseif ($id) {
                $product = Product::find($id);
                $product->name = $input['name'];
                $product->salt_composition = $input['salt_composition'];
                $product->packsize = $input['packsize'];
                $product->price = $input['price'];
                $product->slug = $input['slug'];
                // $product->images = json_encode($input->images);
                $product->save();
                return true;
            } else {
                return "ID not found";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public static function deleteProduct($id)
    {
        try {
            if ($id == null) {
                return "ID is NULL!!";
            } elseif ($id) {
                Product::find($id)->delete();
                return true;
            } else {
                return "ID not found";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
