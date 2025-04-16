<?php

namespace App\UseCases\Services;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;


class UserService
{
    public function create(array $validatedData): User
    {
        return DB::transaction(function () use ($validatedData) {
            $role = Role::where(['name' => 'driver'])->first();           

            $user = User::factory()->create([
                'email' => $validatedData['email'],
                'firstname' => Str::lower($validatedData['firstname']),
                'lastname' => Str::lower($validatedData['lastname']),
                'birth_date' => $validatedData['birth_date'],
                'salary' => $validatedData['salary'],
            ]);

            $user->assignRole($role);

            return $user;
        });
    }

    public function update(array $validatedData, User $user): User
    {     
        $user->update([
            'email' => $validatedData['email'],
            'firstname' => Str::lower($validatedData['firstname']),
            'lastname' => Str::lower($validatedData['lastname']),
            'birth_date' => $validatedData['birth_date'],
            'salary' => $validatedData['salary'],
        ]);

        return $user;
    }

    public function delete(User $user): void
    {
        $user->delete();
    }
}