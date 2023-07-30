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
        //recuperando esses valores enviados pelo formulário através do objeto request. Que contém os dados da requisição HTTP
        $productId = $request->input('product_id');
        $prdQtd = $request->input('product_quantity');

        //aqui, estamos recuperando o carrinho de compras da sessão atual. O session()->get() é usado para obter um valor específico da sessão, caso não exista valor na sessão é passado o segundo parametro um array vazio
        $cart = session()->get('cart', []);

        
 
         if(isset($cart[$productId])){
             $cart[$productId] += $prdQtd;
         }else{
             $cart[$productId] = $prdQtd;
         }
        //  dd($cart);

        //armazenando um valor na sessao com a chave 'cart'
        session()->put('cart',$cart);
        return redirect()->route('carts.index')->with('messageCreate', 'Produto adicionado ao carrinho com sucesso!');   
     }
    
    // this method display datas in cart
     public function index()
    {
        //recuperando os dados do carrinho na sessao. 
        $cart = session()->get('cart', []);
        // usada para obter as chaves (neste caso, os IDs dos produtos) do array $cart.
        $productId = array_keys($cart);
        // buscando os produtos no banco de dados com base nos IDs dos produtos presentes no carrinho.
        // O método whereIn() é usado para filtrar os registros no banco de dados com base nos IDs especificados no array $productId.
        $products = Product::whereIn('id', $productId)->get();
        
        //calculando o valor total da compra no carrinho
        $valueTotalShopping = 0;

        //neste loop foreach, estamos percorrendo todos os itens presentes no carrinho. O carrinho é representado por um array associativo
        foreach ($cart as $productId => $prdQtd) {
            $valuesProducts = Product::find($productId);
            if ($valuesProducts) {
                $valorTotalProduct = $valuesProducts->sale_price * $prdQtd;
                $valueTotalShopping += $valorTotalProduct;
            }
        }
        return view('cart.index', compact('products','cart','valueTotalShopping','productId'));
    }

    
    // metodo para excluir
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
