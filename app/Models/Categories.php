<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categories
 * @package App\Models
 *
 * Tabulka Categories
 */
class Categories extends Model {
    protected $fillable = [
        'productid', 'category',
    ];
}