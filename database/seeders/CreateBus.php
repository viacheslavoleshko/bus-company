<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\CarBrand;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateBus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $drivers = User::role('driver')->get();
            $carBrand = CarBrand::inRandomOrder()->first()->id;
            
            foreach ($drivers as $driver) {
                $bus = Bus::factory()->create([
                    'user_id' => $driver->id,
                    'brand_id' => $carBrand,
                ]);
            }
        });
    }
}
