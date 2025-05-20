<?php

namespace App\Livewire\Dashboard\Modals;

use App\Models\Car;
use App\Models\CarCountryHistoryCategory;
use App\Models\Country;
use App\Models\HistoryCategory;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class LinkCategoryToCarCountryModal extends Component
{
    public $car;
    public $country;

    public $selectedCategories = [];

    #[On('setCountry')]
    public function setCountry($countryId, $carId)
    {
        $this->reset();
        $this->country = Country::find($countryId);
        if (!$this->country) {
            return redirect()->route('dashboard.cars.index')->with('error', 'Country not found.');
        }

        $this->car = Car::find($carId);
        if (!$this->car) {
            return redirect()->route('dashboard.cars.index')->with('error', 'Car not found.');
        }

        $this->selectedCategories = CarCountryHistoryCategory::where('car_id', $this->car->id)
            ->where('country_id', $this->country->id)
            ->pluck('history_category_id')
            ->toArray();
    }

    #[Computed()]
    public function categories()
    {
        return HistoryCategory::where('status', 1)
            ->get();
    }

    public function toggleCategoreis($categoryId)
    {
        if (in_array($categoryId, $this->selectedCategories)) {
            $this->selectedCategories = array_diff($this->selectedCategories, [$categoryId]);
        } else {
            $this->selectedCategories[] = $categoryId;
        }
    }

    public function save()
    {
        if (!$this->country) {
            return redirect()->route('dashboard.cars.index')->with('error', 'Country not found.');
        }

        if (empty($this->selectedCategories)) {
            return redirect()->route('dashboard.cars.index')->with('error', 'Please select at least one category.');
        }

        // Delete categories that are no longer selected
        CarCountryHistoryCategory::where('car_id', $this->car->id)
            ->where('country_id', $this->country->id)
            ->whereNotIn('history_category_id', $this->selectedCategories)
            ->delete();

        // Add or update selected categories
        foreach ($this->selectedCategories as $categoryId) {
            CarCountryHistoryCategory::updateOrCreate(
                [
                    'car_id' => $this->car->id,
                    'country_id' => $this->country->id,
                    'history_category_id' => $categoryId,
                ],
                [
                    'car_id' => $this->car->id,
                    'country_id' => $this->country->id,
                    'history_category_id' => $categoryId,
                ]
            );
        }
        $this->dispatch('success', 'Categories linked successfully.');
        $this->dispatch('closeLinkModal');
        $this->dispatch('refreshCarHistory');
    }
    public function render()
    {
        return view('livewire.dashboard.modals.link-category-to-car-country-modal');
    }
}
