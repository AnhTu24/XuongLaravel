<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';

    // Khai báo các thuộc tính có thể được gán hàng loạt
    protected $fillable = [
        'category_name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
