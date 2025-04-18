<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart
 * @package App\Models
 *
 * Tabulka ShoppingCart
 */
class Cart extends Model {
    protected $table = 'shoppingcarts'; //tabulka v DB
    protected $fillable = ['userid', 'playment', 'delivery', 'emailadress','firstname','lastname',
        'address1','address2','city','zipcode', 'state','phonenumber']; //povolene attr pre mass-assignment

    public function items(){
        return $this->hasMany(CartItem::class, 'cartid');
    }
}
