<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $guarded = ["id"];
    protected $fillable = [ 'user_id', 'payment_method_id', 'total_order', 'comment'];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id'); // Specify the correct foreign key column
    }
}
