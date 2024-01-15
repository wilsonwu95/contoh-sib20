<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;



    public $table="product";

    protected $fillable = [
        'product_code',
        'product_name',
        'price',
        'description',
        'status',
        'category_id'
    ];

    public function Category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id', 'id');
    }

    function TransDetail()
    {
        return $this->hasMany(TransactionDetailsModel::class, 'products_id', 'id');
    }
}
