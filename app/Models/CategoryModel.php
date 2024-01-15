<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    public $table = "category";


    public function Products()
    {
        return $this->hasMany(ProductModel::class, 'category_id', 'id');
    }
}
