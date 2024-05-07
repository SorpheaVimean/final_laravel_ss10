<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $guarded = ["id"];
    protected $fillable = [ 'category_id', 'name', 'description', 'price', 'status', 'image'];

    // public function carts()
    // {
    //     return $this->hasMany(Carts::class, 'product_id');
    // }
}
