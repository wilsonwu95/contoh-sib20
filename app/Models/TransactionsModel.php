<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionsModel extends Model
{
    use HasFactory;


    public $table = "transactions";
    protected $fillable = [
        'invoice',
        'date'
    ];

    function TransDetail()
    {
        return $this->hasMany(TransactionDetailsModel::class, 'transactions_id', 'id');
    }
}
