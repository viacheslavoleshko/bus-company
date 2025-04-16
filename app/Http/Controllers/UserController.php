<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\UseCases\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'users.index',
            [
                'drivers' => User::role('driver')->with('bus.carBrand')->get(), // с использованием локального! Scope scopeLatest для сортировки новее - выше
                // 'mostCommented' => $mostCommented, // выборка топ 5 постов с наибольшим количеством комментариев с использованием локального Scope scopeMostCommented
                // 'mostActive' => $mostActive, // выборка топ 5 юзеров с наибольшим количеством постов  с использованием локального Scope scopeWithMostBlogPosts
                // 'mostActiveLastMonth' => $mostActiveLastMonth, // за последний месяц
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        return view('users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $validatedData = $request->validated();
        $createdDomain = $this->userService->create($validatedData);

        return redirect()->route('drivers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    public function edit(User $driver)
    {
        return view('users.edit', ['driver' => $driver]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $driver)
    {
        $validatedData = $request->validated();
        $createdDomain = $this->userService->update($validatedData, $driver);

        return redirect()->route('drivers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $driver)
    {
        $this->userService->delete( $driver);
        return redirect()->route('drivers.index');
    }
}
