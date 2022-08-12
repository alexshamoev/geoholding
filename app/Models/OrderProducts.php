<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductStep2;

class OrderProducts extends Model
{
    use HasFactory;

    protected $table = 'orders_products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orders_id',
        'product_id',
        'product_ge',
        'product_en',
        'product_ru',
        'price',
        'quantity',
        'created_at',
        'updated_at',
    ];


    public function products() {
        return $this->hasOne(ProductStep2::class, 'id', 'product_id');
    }
}
