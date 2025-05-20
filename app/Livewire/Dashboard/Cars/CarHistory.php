<?php

namespace App\Livewire\Dashboard\Cars;

use App\Models\Car;
use Livewire\Attributes\On;
use Livewire\Component;

class CarHistory extends Component
{
    public $car;
    public $countries = [];
    public function mount($id)
    {
        $this->car = Car::find($id);
        if (!$this->car) {
            return redirect()->route('dashboard.cars.index')->with('error', 'Car not found.');
        }

        $this->car->load('countries');
        $this->countries = $this->car->countriesWithCategories()->get();
    }

    public function openAddCategoryModal($contryId)
    {
        $this->dispatch('openAddCategoryModal', [
            'countryId' => $contryId,
            'carId' => $this->car->id,
        ]);
    }

    #[On('refreshCarHistory')]
    public function refreshCarHistory()
    {
        $this->car->load('countries');
    }

    public function updateCountryOrder($orderedCountries)
    {
        foreach ($orderedCountries as $item) {
            $countryId = $item['value'];
            $order = $item['order'];

            // Assuming pivot table is car_country with 'order' column
            $this->car->countries()->updateExistingPivot($countryId, ['order' => $order]);
        }

        // Refresh the countries after updating the order
        $this->dispatch('success', 'Countries order updated successfully.');
    }
    public function render()
    {
        $this->countries = $this->car->countriesWithCategories()->get();

        return view('livewire.dashboard.cars.car-history');
    }
}
