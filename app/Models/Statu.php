<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function Specifications()
    {
        return $this->hasMany('App\Models\Specifications','status');
    }
}
