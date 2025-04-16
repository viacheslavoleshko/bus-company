<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\UseCases\Enums\UserStatus;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;


class CreateManager extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $role = Role::where(['name' => 'manager'])->first();           

            $user = User::factory()->create([
                'firstname' => 'Manager',
                'lastname' => 'bus-company',
                'email' => 'manager@bus-company.com',
                'password' => 'password',
            ]);

            $user->assignRole($role);
        });
    }
}
