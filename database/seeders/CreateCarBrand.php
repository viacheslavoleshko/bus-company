<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateCarBrand extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('car_brands')->insert([
            ['brand_name' => 'Mercedes-Benz', 'created_at' => now(), 'updated_at' => now()],
            ['brand_name' => 'Volvo', 'created_at' => now(), 'updated_at' => now()],
            ['brand_name' => 'Scania', 'created_at' => now(), 'updated_at' => now()],
            ['brand_name' => 'MAN', 'created_at' => now(), 'updated_at' => now()],
            ['brand_name' => 'Iveco', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
