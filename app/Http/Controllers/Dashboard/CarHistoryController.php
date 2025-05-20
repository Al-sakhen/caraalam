<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarHistoryController extends Controller
{
    public function index()
    {
        return view('admin.cars.index');
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function edit($id)
    {
        $car = Car::find($id);
        if (!$car) {
            return redirect()->route('dashboard.cars.index')->with('error', 'Car not found.');
        }
        return view('admin.cars.edit', compact('id', 'car'));
    }
}
