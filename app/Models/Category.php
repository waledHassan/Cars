<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function Specifications()
    {
        return $this->hasMany('App\Models\Specifications','category');
    }

    public function SubCategory()
    {
        return $this->hasOne('App\Models\SubCategory','category');
    }

    public function Type()
    {
        return $this->hasOne('App\Models\Type','category');
    }
}
