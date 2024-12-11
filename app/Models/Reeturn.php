<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reeturn extends Model
{
    use HasFactory;

    protected $table = 'returns'; // Laravel may interpret this wrong without specifying

    protected $fillable = [
        'product_id',
        'quantity',
        'reason',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
