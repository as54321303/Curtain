<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'product_id';

    public function getImages() {
        return $this->hasMany('App\Models\Image', 'product_id');
    }

    public function getcarts() {
        return $this->hasMany('App\Models\cart', 'product_id');
    }
}
