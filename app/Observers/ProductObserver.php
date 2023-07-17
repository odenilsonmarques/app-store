<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    public function creating(Product $product)
    {
        //antes de inserir um registro essa classe junto com esse metodo vão inserir um valor dinamico no campo uuid
        $product->uuid = (string) Str::uuid();
    }
}
