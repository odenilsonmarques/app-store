<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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

         $this->updateCartQuantity();

        return redirect()->route('carts.index')->with('messageCreate', 'Produto adicionado ao carrinho com sucesso!');   
     }
    
    // this method display datas in cart
     public function index()
    {
        //recuperando o carrinho de compras da sessao atual. O session_get é usado para obter um valor especifico da sessao, caso nao exista retorna um array vazio
        $cart = session()->get('cart', []);
        $productId = array_keys($cart);
        //Aqui, estamos usando o Eloquent ORM do Laravel para buscar os produtos no banco de dados cujos IDs estão presentes no array $productId. O método whereIn() é usado para filtrar os registros no banco de dados com base nos IDs especificados no array $productId.
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
            // Remove o produto do carrinho usando unset()
            unset($cart[$productId]);
            // Atualiza o carrinho na sessão com o produto removido
            session()->put('cart', $cart);
        }

        $this->updateCartQuantity();

        return redirect()->back()->with('messageCreate', 'Produto removido com sucesso');
    }

    //this method to update product quantity  in cart
    private function updateCartQuantity()
    {
        $totalProductsInCart = 0;
        if(session()->has('cart')){
            foreach(session('cart') as $quantity){
                $totalProductsInCart += $quantity;
            }
        }
        
        session()->put('cart_quantity', $totalProductsInCart);    
    } 
}
