<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
    ];

    public function Specifications()
    {
        return $this->hasMany('App\Models\Specifications','type');
    }

    public function Category()
    {
        return $this->belongsTo('App\Models\Category','category');
    }
}
