<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetailsModel extends Model
{
    use HasFactory;


    public $table = "transaction_details";
    protected $fillable = [
        'price', 
        'qty', 
        'transactions_id', 
        'products_id'
    ];

    function Transaction()
    {
        return $this->belongsTo(TransactionsModel::class, 'transactions_id', 'id');
    }

    function Product()
    {
        return $this->belongsTo(ProductModel::class, 'products_id', 'id');
    }
}
