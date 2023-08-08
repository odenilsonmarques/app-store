<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\UpdateStoreProduct;

class ControllerProduct extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::all();
        return view('product.index',compact('products'));
    }

    public function create()
    {

        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateStoreProduct $request)
    {
        $data = $request->merge(['category_id']); 
        $data = $request->except('photo');

        
        
        if($request->photo)
        {
            $data['photo'] = $request->photo->store('img-product');
        }
        // dd($data);
        Product::create($data);
        return redirect()->route('products.index')
        ->with('messageCreate', 'Produto cadastrado com sucesso !');


        
    }

    /**
     * usando o parametro $identify para pegar um produto por vez, poderia ser o ID
     */
    public function show($uuid)
    {
        if(!$products = Product::where('uuid', $uuid)->first())
            return redirect()->route('home');

        return view('product.detail',compact('products'));


        // $products = Product::find($identify);
        // if($pro){
        //     return view('denunciationIdentification.details',['data' => $data]);
        // }else{
        //     return redirect()->back();
        // }
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
