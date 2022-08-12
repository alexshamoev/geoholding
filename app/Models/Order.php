<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_code',
        'user_id',
        'delivery_type',
        'name',
        'last_name',
        'company_name',
        'full_address',
        'email',
        'telephone',
        'details',
        'created_at',
        'updated_at'
    ];


    public function orderProducts() {
        return $this->hasMany(OrderProducts::class, 'orders_id', 'id');
    }


    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
