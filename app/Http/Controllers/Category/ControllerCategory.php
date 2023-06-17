<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\UpdateStoreCategory;


class ControllerCategory extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

   
    public function store(updateStoreCategory $request)
    {
        $categories = Category::create($request->all());
        // dd($categories);
        return redirect()->route('categories.index')
        ->with('messageCreate', 'Categoria cadastrada com sucesso !');
    }

    
    public function show(string $id)
    {
        //
    }

   
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        //
    }
}
