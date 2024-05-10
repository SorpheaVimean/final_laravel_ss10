<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = "order_details";
    protected $guarded = ["id"];
    protected $fillable = [ 'order_id', 'product_id', 'quantity', 'price', 'total_price'];
    
    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id'); // Specify the correct foreign key column
    }

    public function getproduct(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

}
