<?php

namespace App\Http\Controllers;

use App\Models\Car;

use App\Models\Brand;

use App\Models\Engine;

use App\Models\Extra;

use Illuminate\Http\Request;

use App\Http\Requests\StoreCarRequest;

class CarController extends Controller
{
    public function __construct() {

        $this->middleware("auth")->except("index", "show");

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();

        //dd($cars);

        return view("cars.index", compact("cars"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titlePage = "Aggiungi Automobile";

        $action = route("cars.store");

        $typeForm = "";

        $buttoName = "Aggiungi";

        $brands = Brand::all();

        $engines = Engine::all();

        $extras = Extra::all();

        $car = new Car;

        return view("cars.form", compact("titlePage", "action", "typeForm", "buttoName", "brands", "engines", "car", "extras"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        $car = Car::create(array_merge($request->all(), ["user_id" => auth()->user()->id]));

        if($request->hasFile("image") && $request->file("image")->isValid()) {

            $extension = $request->file("image")->extension();

            $randomName = uniqid("img_car_") . "$extension";

            $imgPath = $request->file("image")->storeAs("public/image" . $car->id, $randomName);

            $car->image = $imgPath;

            $car->save();

        }

        $car->extras()->attach($request->extras);

        return redirect()->route("cars.index")->with(["success" => "Automobile aggiunta alla lista"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $extrasTotalPrice = 0;

        foreach($car->extras as $extra){

            $extrasTotalPrice += $extra->price;

        }
        return view("cars.show", compact("car", "extrasTotalPrice"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $titlePage = "Modifica Automobile";

        $action = route("cars.update", $car);

        //dd($car->model);

        $typeForm = "PUT";

        $buttoName = "Modifica";

        $brands = Brand::all();

        $engines = Engine::all();

        $extras = Extra::all();

        return view("cars.form", compact("titlePage", "action", "typeForm", "buttoName", "car", "brands", "engines", "extras"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCarRequest $request, Car $car)
    {

        $car->update($request->all());

        if($request->hasFile("image") && $request->file("image")->isValid()) {

            $extension = $request->file("image")->extension();

            $randomName = uniqid("img_car_") . "$extension";

            $imgPath = $request->file("image")->storeAs("public/image" . $car->id, $randomName);

            $car->image = $imgPath;

            $car->save();

        }

        $car->extras()->detach();

        $car->extras()->attach($request->extras);

        return redirect()->route("cars.show", $car)->with(["success" => "Annuncio modificato con successo"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route("cars.index")->with(["success" => "Annuncio modificato con successo"]);

    }
}
