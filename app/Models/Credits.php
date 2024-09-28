<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credits extends Model
{
    use HasFactory;

    protected $table = 'credits';
    protected $fillable = [
        'product_id',
        'service_name',
        'credit_value',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

