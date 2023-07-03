<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image',
    ];

    public function Products()
    {
        return $this->belongsTo('App\Models\Products','product_id');
    }

}
