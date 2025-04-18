<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CartItem
 * @package App\Models
 *
 * Prechodova tabulka CartItems medzi ShoppingCart a Product
 */
class CartItem extends Model {
    protected $table = 'cartitems'; //tabulka v DB

    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['cartid', 'productid', 'amount', 'type']; //povolene attr pre mass-assignment

    public function cart(){
        return $this->belongsTo(Cart::class, 'cartid');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'productid');
    }
}
