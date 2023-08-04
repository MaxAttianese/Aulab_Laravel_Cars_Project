<?php

namespace App\Http\Controllers;

use App\Models\Extra;
use Illuminate\Http\Request;

use App\Http\Requests\StoreExtraRequest;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extras = Extra::all();

        return view("extras.index", compact("extras"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typeForm = "";

        $action = route("extras.store");

        $titlePage = "Crea accessorio";

        $buttoName = "Crea";

        $extra = new Extra;

        return view("extras.form", compact("extra","typeForm", "action", "titlePage", "buttoName"));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExtraRequest $request)
    {
        Extra::create($request->all());

        return redirect()->route("extras.index")->with(["success" => "Optional aggiunto con successo"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Extra $extra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extra $extra)
    {
        $typeForm = "PUT";

        $action = route("extras.update", $extra);

        $titlePage = "Modifica accessorio";

        $buttoName = "Modifica";

        return view("extras.form", compact("extra","typeForm", "action", "titlePage", "buttoName"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreExtraRequest $request, Extra $extra)
    {
        $extra->update($request->all());

        return redirect()->route("extras.index")->with(["success" => "Optional modificato con successo"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extra $extra)
    {
        $extra->delete();

        return redirect()->route("extras.index")->with(["success" => "Optional eliminato con successo"]);

    }
}
