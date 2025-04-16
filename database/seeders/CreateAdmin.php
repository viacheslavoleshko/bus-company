<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\UseCases\Enums\UserStatus;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;


class CreateAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $role = Role::where(['name' => 'admin'])->first();           

            $user = User::factory()->create([
                'firstname' => 'Admin',
                'lastname' => 'bus-company',
                'email' => 'admin@bus-company.com',
                'password' => 'password',
            ]);

            $user->assignRole($role);
        });
    }
}
