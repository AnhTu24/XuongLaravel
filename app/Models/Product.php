<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';


    protected $fillable = [
        'category_id',
        'product_name',
        'image',
        'description',
        'view',
        'size',       
        'color',      
        'price',     
        'discount',  
        'quantity',   
        'active',
    ];
    

    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
