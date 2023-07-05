<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordered extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ordered_date',
        'status',
        'ordered_value',
        'description'
    ];

    public function user()
    {
        return this->belongsTo(User::class);
    }
}
