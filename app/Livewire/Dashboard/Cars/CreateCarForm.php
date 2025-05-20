<?php

namespace App\Livewire\Dashboard\Cars;

use Livewire\Component;
use App\Models\Car;
use App\Models\Country;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;

class CreateCarForm extends Component
{
    public $name_en, $name_ar, $chassis_number, $rating = 0, $engine_capacity, $color, $country, $height, $width, $length, $seats, $manufacturer, $made_in, $model, $car_class, $engine, $steering_mode, $anti_lock_brake_system, $extra_urban_cnsumption, $in_urban_cnsumption, $registeration_status, $used_for;

    #[Validate([
        'selectedCountries' => 'required|array',
        'selectedCountries.*' => 'required|integer|exists:countries,id',
    ])]
    public $selectedCountries = [];

    public $countries = [];

    protected $rules = [
        'name_en' => 'nullable|string|max:255',
        'name_ar' => 'required|string|max:255',
        'chassis_number' => 'required|string|unique:cars,chassis_number',
        'rating' => 'nullable|integer|min:0',
        'engine_capacity' => 'nullable|string|max:255',
        'color' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:255',
        'height' => 'nullable|numeric',
        'width' => 'nullable|numeric',
        'length' => 'nullable|numeric',
        'seats' => 'nullable|integer|min:1',
        'manufacturer' => 'nullable|string|max:255',
        'made_in' => 'nullable|string|max:255',
        'model' => 'nullable|string|max:255',
        'car_class' => 'nullable|string|max:255',
        'engine' => 'nullable|string|max:255',
        'steering_mode' => 'nullable|string|max:255',
        'anti_lock_brake_system' => 'nullable|string|max:255',
        'extra_urban_cnsumption' => 'nullable|numeric',
        'in_urban_cnsumption' => 'nullable|numeric',
        'registeration_status' => 'nullable|string|max:255',
        'used_for' => 'nullable|string|max:255',
    ];

    public function mount()
    {
        $this->dispatch('setCountries', [
            'countries' => $this->getCountries,
        ]);
    }

    public function store()
    {
        $this->validate();
        Car::create($this->only(array_keys($this->rules)))
            // Attach selected countries to the car
            ->countries()->attach($this->selectedCountries);

        $this->reset();
        return redirect()->route('dashboard.cars.index')->with('success', 'Car created successfully!');
    }

    #[Computed()]
    public function getCountries()
    {
        return Country::where('status', 1)->get(['id', 'name_en']);
    }

    public function render()
    {
        return view('livewire.dashboard.cars.create-car-form');
    }
}
