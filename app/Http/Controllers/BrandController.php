<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Brand;

use App\Http\Requests\StoreBrandRequest;

class BrandController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();

        return view("brands.index", compact("brands"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typeForm = "";

        $action = route("brands.store");

        $titlePage = "Crea brand";

        $buttoName = "Crea";

        $brand = new Brand;

        return view("brands.form", compact("brand","typeForm", "action", "titlePage", "buttoName"));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        Brand::create($request->all());

        return redirect()->route("brands.index")->with(["success" => "Brand aggiunto con successo"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $typeForm = "PUT";

        $action = route("brands.update", $brand);

        $titlePage = "Modifica brand";

        $buttoName = "Modifica";

        return view("brands.form", compact("brand","typeForm", "action", "titlePage", "buttoName"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBrandRequest $request, Brand $brand)
    {
        $brand->update($request->all());

        return redirect()->route("brands.index")->with(["success" => "Brand modificato con successo"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route("brands.index")->with(["success" => "Brand eliminato con successo"]);

    }
}
