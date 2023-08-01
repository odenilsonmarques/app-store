<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ControllerCart extends Controller
{

     // this method persist datas in cart
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

        session()->put('cart',$cart);
        return redirect()->route('carts.index')->with('messageCreate', 'Produto adicionado ao carrinho com sucesso!');   
     }
    
    // this method display datas in cart
     public function index()
    {
        $cart = session()->get('cart', []);
        $productId = array_keys($cart);
        $products = Product::whereIn('id', $productId)->get();
        
        $valueTotalShopping = 0;
        foreach ($cart as $productId => $prdQtd) {
            $valuesProducts = Product::find($productId);
            if ($valuesProducts) {
                $valorTotalProduct = $valuesProducts->sale_price * $prdQtd;
                $valueTotalShopping += $valorTotalProduct;
            }
        }
        
        return view('cart.index', compact('products','cart','valueTotalShopping','productId'));
    }

    // this method to remove cart product
    public function destroy($productId)
    {
        $cart = session()->get('cart', []);

        if (array_key_exists($productId, $cart)) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('messageCreate', 'Produto removido com sucesso');
    }

}
