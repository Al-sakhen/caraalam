<?php

namespace App\Livewire\Dashboard\Cars;

use Livewire\Component;
use App\Models\Car;
use App\Models\Country;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;

class EditCarForm extends Component
{
    public $car_id, $name_en, $name_ar, $chassis_number, $rating = 0, $engine_capacity, $color, $country, $height, $width, $length, $seats, $manufacturer, $made_in, $model, $car_class, $engine, $steering_mode, $anti_lock_brake_system, $extra_urban_cnsumption, $in_urban_cnsumption, $registeration_status, $used_for;

    #[Validate([
        'selectedCountries' => 'required|array',
        'selectedCountries.*' => 'required|integer|exists:countries,id',
    ])]
    public $selectedCountries = [];

    protected function rules()
    {
        return [
            'name_en' => 'nullable|string|max:255',
            'name_ar' => 'required|string|max:255',
            'chassis_number' => 'required|string|unique:cars,chassis_number,' . $this->car_id,
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
    }

    public function mount($id = null)
    {
        if ($id) {
            $car = Car::findOrFail($id);
            $this->car_id = $car->id;
            $this->name_en = $car->name_en;
            $this->name_ar = $car->name_ar;
            $this->chassis_number = $car->chassis_number;
            $this->rating = $car->rating;
            $this->engine_capacity = $car->engine_capacity;
            $this->color = $car->color;
            $this->country = $car->country;
            $this->height = $car->height;
            $this->width = $car->width;
            $this->length = $car->length;
            $this->seats = $car->seats;
            $this->manufacturer = $car->manufacturer;
            $this->made_in = $car->made_in;
            $this->model = $car->model;
            $this->car_class = $car->car_class;
            $this->engine = $car->engine;
            $this->steering_mode = $car->steering_mode;
            $this->anti_lock_brake_system = $car->anti_lock_brake_system;
            $this->extra_urban_cnsumption = $car->extra_urban_cnsumption;
            $this->in_urban_cnsumption = $car->in_urban_cnsumption;
            $this->registeration_status = $car->registeration_status;
            $this->used_for = $car->used_for;
            $this->selectedCountries = $car->countries->pluck('id')->toArray();

            $this->dispatch('setCountries', [
                'countries' => $this->getCountries,
            ]);
        } else {
            $this->reset();
            return redirect()->route('dashboard.cars.index')->with('error', 'Car not found!');
        }
    }

    #[Computed()]
    public function getCountries()
    {
        return Country::where('status', 1)->get(['id', 'name_en']);
    }


    public function update()
    {
        $this->validate();
        $car = Car::findOrFail($this->car_id);
        $car->update($this->except(['car_id', 'selectedCountries']));
        // Sync the selected countries
        $car->countries()->sync($this->selectedCountries);
        return redirect()->route('dashboard.cars.index')->with('success', 'Car updated successfully!');
    }

    public function render()
    {
        return view('livewire.dashboard.cars.edit-car-form');
    }
}
