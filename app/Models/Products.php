<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function scopeApprove($query): void
    {
        $query->where('approve', 1);
    }
    
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'price',
        'discription',
        'image',
        'category',
        'approve',
    ];

    protected $hidden = ["created_at", "updated_at"];

    public function Image()
    {
        return $this->hasOne('App\Models\Image','product_id');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id ');
    }

    public function Wishlist()
    {
        return $this->hasMany('App\Models\Wishlist','product_id');
    }

    public function specifications()
    {
        return $this->hasOne('App\Models\Specifications','product_id');
    }
}
