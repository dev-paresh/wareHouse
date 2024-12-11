<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PalletProduct extends Pivot
{
    protected $table = 'pallet_product';

    protected $fillable = [
        'pallet_id',
        'product_id',
        'quantity',
    ];
}
