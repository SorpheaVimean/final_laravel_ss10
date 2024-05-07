<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carts extends Model
{
    use HasFactory;
    protected $table = "carts";
    protected $guarded = ["id"];
    protected $fillable = [ 'user_id', 'product_id', 'quantity'];

    public function getproduct(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
