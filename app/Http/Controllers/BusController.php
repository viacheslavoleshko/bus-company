<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBusRequest;
use App\Models\Bus;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use App\Http\Requests\BusRequest;
use App\UseCases\Services\BusService;
use App\Http\Requests\CreateBusRequest;

class BusController extends Controller
{
    public $busService;

    public function __construct(BusService $busService)
    {
        $this->busService = $busService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'buses.index',
            [
                'buses' => Bus::with('carBrand', 'user')->get(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buses.create', [
            'brands' => \App\Models\CarBrand::all(),
            'drivers' => \App\Models\User::role('driver')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBusRequest $request)
    {
        $validatedData = $request->validated();
        $this->busService->create($validatedData);

        return redirect()->route('buses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bus $bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bus $bus)
    {
        return view('buses.edit', [
            'bus' => $bus,
            'brands' => \App\Models\CarBrand::all(),
            'drivers' => \App\Models\User::role('driver')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBusRequest $request, Bus $bus)
    {
        $validatedData = $request->validated();
        $this->busService->update($validatedData, $bus);

        return redirect()->route('buses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus)
    {
        $this->busService->delete($bus);

        return redirect()->route('buses.index');
    }
}
