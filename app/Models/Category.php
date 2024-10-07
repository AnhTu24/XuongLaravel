<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    // Khai báo các thuộc tính có thể được gán hàng loạt
    protected $fillable = [
        'category_name',
    ];
}
