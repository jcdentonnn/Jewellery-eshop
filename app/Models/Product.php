<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 *
 * Tabulka Product
 */
class Product extends Model {
    protected $fillable = ['productname', 'productdesc', 'price', 'imagename'];
}