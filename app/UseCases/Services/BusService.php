<?php

namespace App\UseCases\Services;

use App\Models\Bus;
use App\Models\CarBrand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;


class BusService
{
    public function create(array $validatedData): Bus
    {        
        $bus = Bus::create([
            'brand_id' => $validatedData['brand_id'],
            'license_plate' => Str::upper($validatedData['license_plate']),
            'user_id' => $validatedData['user_id'],
        ]);

        return $bus;
    }

    public function update(array $validatedData, Bus $bus): Bus
    {     
        $bus->update([
            'brand_id' => $validatedData['brand_id'],
            'license_plate' => Str::upper($validatedData['license_plate']),
            'user_id' => $validatedData['user_id'],
        ]);

        return $bus;
    }

    public function delete(Bus $bus): void
    {
        $bus->delete();
    }
}