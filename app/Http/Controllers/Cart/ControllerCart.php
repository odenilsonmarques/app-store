<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ControllerCart extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
    {
        $cart = session()->get('cart', []);
        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get();

        // dd($products);

        return view('cart.index', compact('products'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    // tenho esse método, mas a pagina que exibe os produto no carrinho contihua em barnco
    public function store(Request $request)
    {
        $productId = $request->input('product_id');
        $prdQtd = $request->input('product_quantity');

        $cart = session()->get('cart', []);

        if(isset($cart[$productId])){
            $cart[$productId] += $prdQtd;
        }else{
            $cart[$productId] = $prdQtd;
        }

        // dd($cart);
        session()->put('cart',$cart);
       

        return redirect()->back()->with('messageCreate', 'Produto adicionado ao carrinho com sucesso!');   
    }

   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
