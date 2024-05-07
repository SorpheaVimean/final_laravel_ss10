<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
