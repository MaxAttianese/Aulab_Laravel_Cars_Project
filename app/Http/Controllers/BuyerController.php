<?php

namespace App\Http\Controllers;

use App\Models\Buyer;

use App\Models\Car;

use Illuminate\Http\Request;

use App\Http\Requests\StoreBuyerRequest;

class BuyerController extends Controller
{
    public function update(StoreBuyerRequest $request, Car $car)
    {
        $buyer = Buyer::create($request->all());

        //dd($car->id);

        $car->update(array_merge($request->all(), ["buyer_id" => $buyer->id]));

        return redirect()->back()->with(["success" => "Complimenti per il tuo nuovo acquisto"]);
    }

    public function destroy(Car $car)
    {
       $car->buyer_id = null;

       $car->save();

        return redirect()->back()->with(["success" => "Veicolo nuovamente pronto per la vendita"]);
    }
}
