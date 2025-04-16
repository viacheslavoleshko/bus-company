<?php

namespace App\Models;

use App\Models\Bus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarBrand extends Model
{
    protected $fillable = [
        'brand_name',
    ];

    public function buses(): HasMany
    {
        return $this->hasMany(Bus::class, 'brand_id');
    }
}
