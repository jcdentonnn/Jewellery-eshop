<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 *
 * Tabulka Product
 */
class Product extends Model {
    use HasFactory;

    protected $table = 'products';
    //protected $primaryKey = 'products_pkey';
    //public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'productname',
        'productdesc',
        'price',
        'imagename',
        'imagename2',
        'imagename3',
        'imagename4',
        'type',
        'paving',
    ];
}