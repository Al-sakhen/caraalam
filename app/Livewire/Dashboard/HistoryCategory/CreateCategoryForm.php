<?php

namespace App\Livewire\Dashboard\HistoryCategory;

use App\Models\HistoryCategory;
use App\Traits\UploadImageTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCategoryForm extends Component
{
    use WithFileUploads, UploadImageTrait;

    public $name_en, $name_ar, $description_en, $description_ar, $image, $status = 1;

    protected $rules = [
        'name_en' => 'required|string|max:255',
        'name_ar' => 'required|string|max:255',
        'description_en' => 'nullable|string',
        'description_ar' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
        'status' => 'boolean',
    ];

    public function submit()
    {
        $validated = $this->validate();
        if ($this->image) {
            $validated['image'] = $this->saveImage($this->image, 'categories');
        }
        HistoryCategory::create($validated);
        $this->reset();

        return redirect()->route('dashboard.history-categories.index')->with('success', 'History category created successfully.');
    }

    public function render()
    {
        return view('livewire.dashboard.history-category.create-category-form');
    }
}
