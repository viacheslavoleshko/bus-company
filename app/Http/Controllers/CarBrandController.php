<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarBrandRequest;
use App\Models\CarBrand;
use App\UseCases\Services\BrandService;
use Illuminate\Http\Request;

class CarBrandController extends Controller
{
    public $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'brands.index',
            [
                'brands' => CarBrand::with('buses')->get(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarBrandRequest $request)
    {
        $brandname = $request->brand_name;
        $createdDomain = $this->brandService->create($brandname);

        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CarBrand $carBrands)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarBrand $brand)
    {
        return view('brands.edit', [
            'brand' => $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarBrandRequest $request, CarBrand $brand)
    {
        $brandname = $request->brand_name;
        $createdDomain = $this->brandService->update($brandname, $brand);

        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarBrand $brand)
    {
        $this->brandService->delete($brand);
        return redirect()->route('brands.index');
    }
}
