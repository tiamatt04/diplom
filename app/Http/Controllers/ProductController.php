<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductEditRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function ProductView()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('products.products', compact('products', 'categories'));
    }

    public function AddProductPost(ProductAddRequest $request)
    {
        $requests = $request->validated();
        $photo = $request->file('product_photo')->store('public');
        $requests['photo']= explode('/', $photo)[1];
        $data = [
          'product_name' => $requests['product_name'],
          'product_country' => $requests['product_country'],
          'category_id' => $requests['category_id'],
          'product_photo' => $requests['photo'],
          'product_count' => $requests['product_count'],
          'product_price' => $requests['product_price'],
          'product_description' => $requests['product_description'],
        ];
        Product::create($data);
        return back()->with(['add_product'=> $requests['product_name']]);
    }
    public function DeleteProductPost(Product $product)
    {
        $name = $product->product_name;
        $product->delete();
        return back()->with(['delete_product'=>$name]);
    }
    public function EditProductPost(ProductEditRequest $request, Product $product)
    {
        $request->validated();
        $old_edit_product = $product->product_name;
        if ($request->product_photo) {
            $product->product_photo = explode('/', $request->file('product_photo')->store('public'))[1];
        }
        $product->product_name = $request->input('product_name');
        $product->product_country = $request->input('product_country');
        $product->category_id = $request->input('category_id');
        $product->product_price = $request->input('product_price');
        $product->product_description = $request->input('product_description');
        $product->product_count = $request->input('product_count');
        $product->save();
        return back()->with(['edit_product' => $product->product_name, 'old_edit_product' => $old_edit_product]);
    }
}
