<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleStoreRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(Request $request) {
        $vehicles = $request->user()->vehicles;

        return response()->json([
            "message" => "Список автомобилей успешно получен",
            "data" => $vehicles
        ]);
    }

    public function store(VehicleStoreRequest $request) {
        $fields = $request->validated();
        $fields['user_id'] = $request->user()->id;

        $vehicle = Vehicle::create($fields);

        return response()->json([
            "message" => "Автомобиль успешно добавлен",
            "data" => $vehicle
        ], 201);
    }

    public function show(Request $request, $vehicle) {
        $user = $request->user();
        $vehicles = $user->vehicles;

        $vehicle = $vehicles->find($vehicle);

        if(!$vehicle) {
            return response()->json([
                "message" => "Информация о данном автомобиле не найдена",
                "data" => null
            ], 404);
        }
        
        return response()->json([
            "message" => "Информация об автомобиле успешно получена",
            "data" => $vehicle
        ]);
    }

    public function update(VehicleStoreRequest $request, $vehicle) {
        $user = $request->user();
        $vehicles = $user->vehicles;

        $vehicle = $vehicles->find($vehicle);

        if(!$vehicle) {
            return response()->json([
                "message" => "Информация о данном автомобиле не найдена",
                "data" => null
            ], 404);
        }

        $fields = $request->validated();

        $vehicle->update($fields);

        return response()->json([
            "message" => "Информация об автомобиле успешно обновлена",
            "data" => $vehicle
        ]);
    }

    public function destroy(Request $request, $vehicle) {
        $user = $request->user();
        $vehicles = $user->vehicles;

        $vehicle = $vehicles->find($vehicle);

        if(!$vehicle) {
            return response()->json([
                "message" => "Информация о данном автомобиле не найдена",
                "data" => null
            ], 404);
        }

        $vehicle->delete();

        return response()->json([
            "message" => "Автомобиль успешно удален",
            "data" => []
        ]);

    }
}
