<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specifications extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'username',
        'phone',
        'whatsapp',
        'adsress',
        'discount',
        'category ',
        'sub_category',
        'type ',
        'status',
        'use',
        'brand',
        'origin',
        'seller_type',
        'fuel_type',
        'wheel_position',
        'color',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];

    public function Brand()
    {
        return $this->belongsTo('App\Models\Brand','brand');
    }

    public function Category()
    {
        return $this->belongsTo('App\Models\Category','category ');
    }

    public function FuelType()
    {
        return $this->belongsTo('App\Models\FuelType','fuel_type');
    }

    public function Origin()
    {
        return $this->belongsTo('App\Models\Origin','origin');
    }

    public function SellerType()
    {
        return $this->belongsTo('App\Models\SellerType','seller_type');
    }

    public function Statu()
    {
        return $this->belongsTo('App\Models\Statu','status');
    }

    public function SubCategory()
    {
        return $this->belongsTo('App\Models\SubCategory','sub_category');
    }

    public function Type()
    {
        return $this->belongsTo('App\Models\Type','type');
    }

    public function Uses()
    {
        return $this->belongsTo('App\Models\Uses','use');
    }

    public function WheelPosition()
    {
        return $this->belongsTo('App\Models\WheelPosition','wheel_position');
    }

    public function products()
    {
        return $this->belongsTo('App\Models\products','product_id');
    }
}
