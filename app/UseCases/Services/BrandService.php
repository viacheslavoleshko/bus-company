<?php

namespace App\UseCases\Services;

use App\Models\CarBrand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;


class BrandService
{
    public function create(string $name): CarBrand
    {        
        $brand = CarBrand::create([
            'brand_name' => Str::lower($name),
        ]);

        return $brand;
    }

    public function update(string $name, CarBrand $brand): CarBrand
    {     
        $brand->update([
            'brand_name' => Str::lower($name),
        ]);

        return $brand;
    }

    public function delete(CarBrand $brand): void
    {
        $brand->delete();
    }
}