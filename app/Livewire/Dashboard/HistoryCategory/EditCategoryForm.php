<?php

namespace App\Livewire\Dashboard\HistoryCategory;

use App\Models\HistoryCategory;
use App\Traits\UploadImageTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditCategoryForm extends Component
{
    use WithFileUploads, UploadImageTrait;


    public $category, $name_en, $name_ar, $description_en, $description_ar, $image, $status = 1;

    protected $rules = [
        'name_en' => 'required|string|max:255',
        'name_ar' => 'required|string|max:255',
        'description_en' => 'nullable|string',
        'description_ar' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
        'status' => 'boolean',
    ];

    public function mount($id)
    {
        $this->category = HistoryCategory::findOrFail($id);
        $this->name_en = $this->category->name_en;
        $this->name_ar = $this->category->name_ar;
        $this->description_en = $this->category->description_en;
        $this->description_ar = $this->category->description_ar;
        $this->status = $this->category->status;
    }

    public function submit()
    {
        $this->validate();
        $oldImage = $this->category->image;

        $this->category->update($this->except('image', 'category'));


        if ($this->image) {
            $this->category->update([
                'image' => $this->saveImage($this->image, 'categories'),
            ]);

            if (file_exists($oldImage) && $oldImage != null) {
                unlink($oldImage);
            }
        }

        $this->reset();
        return redirect()->route('dashboard.history-categories.index')->with('success', 'History category updated successfully.');
    }

    public function render()
    {
        return view('livewire.dashboard.history-category.edit-category-form');
    }
}
