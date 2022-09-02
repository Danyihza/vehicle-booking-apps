<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        // $data['vehicles'] = Vehicle::where('is_active', 1)->get();
        $data['vehicles'] = Vehicle::all();
        return view('admin.vehicles', $data);
    }

    public function post(Request $request)
    {
        $newVehicle = new Vehicle;
        $newVehicle->name = $request->name;
        $newVehicle->type = $request->type;
        $newVehicle->origin = $request->origin;
        $newVehicle->is_active = $request->is_active ? 1 : 0;
        $file = $request->file('image');
        $newVehicle->image = $file->getClientOriginalName();
        $file->move(public_path('images'), $file->getClientOriginalName());
        $newVehicle->save();

        return back()->with('success', 'Data has been successfully submited');
    }

    public function delete($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();

        return back()->with('error', 'Data has been deleted');
    }

    public function update($id, Request $request)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->name = $request->name;
        $vehicle->type = $request->type;
        $vehicle->origin = $request->origin;
        $vehicle->is_active = $request->is_active ? 1 : 0;
        $file = $request->file('image');
        if($file){
            $vehicle->image = $file->getClientOriginalName();
            $file->move(public_path('images'), $file->getClientOriginalName());
        }
        $vehicle->save();

        return back()->with('success', 'Data has been successfully submited');
    }
}
