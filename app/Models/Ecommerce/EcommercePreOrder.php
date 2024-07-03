<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcommercePreOrder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'mobile', 'address', 'quantity', 'shipping_method', 'product_name', 'product_price', 'sub_total', 'delivery_charge', 'total', 'order_note', 'status', 'comment'
    ];

}
