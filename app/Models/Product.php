<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'quantity',
        'confirm_quantity',
        'minimum_quantity',
        'cost_price',
        'sale_price',
        'photo',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


     /*
     utilizando o recurso mutators para especificar os padrões que desejo inserir na banco de dados
     utilizei o nome das variaveis igual do campo, mas poderia ser outro nome

     Lembrar que o nome da funcao deve corresponder ao nome do campo
     */
  
     public function setCostPriceAttribute($cost_price)
    {
        $this->attributes['cost_price'] = str_replace(['.',','],['','.'],$cost_price);
    }

    public function setSalePriceAttribute($sale_price)
    {
        $this->attributes['sale_price'] = str_replace(['.',','],['','.'],$sale_price);
    }

    //  public function setCostPriceAttribute($cost_price)
    //  {
    //      $this->attributes['cost_price'] = str_replace(['.',','],['','.'],$cost_price);
    //  }
     


}
