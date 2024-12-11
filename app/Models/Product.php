<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'lot_number',
        'expiration_date',
        'quantity',
        'section_id',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function pallets()
    {
        return $this->belongsToMany(Pallet::class)->using(PalletProduct::class);
    }

    public function cycleCounts()
    {
        return $this->hasMany(CycleCount::class);
    }
}
