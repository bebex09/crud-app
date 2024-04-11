<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    public function index(){

      $products = Product::where('user_id', request()->user()->id)
                   ->orderBy('created_at', 'desc')
                   ->paginate(5);
      return view('products.index', ['products' => $products]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'required',
        ]);

        $data['user_id'] = $request->user()->id;
        $newProduct = Product::create($data);
        return redirect(route('product.index'))->with('success', $request->name . ' added Successfully');
    }

    public function edit(Product $product){
        if ($product->user_id !== request()->user()->id) {
            abort(404);
        }
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'required',
        ]);

        $data['user_id'] = $request->user()->id;
        $product->update($data);
        return redirect(route('product.index'))->with('success', $product->name . ' Successfully Updated!');
    }

    public function delete(Product $product){
       $product->delete();
       return redirect(route('product.index'))->with('success', $product->name . ' Deleted Successfully');
    }
}
