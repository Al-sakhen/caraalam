<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="editCountryLabel">
            Add Category To ({{ $country?->name_en }})
        </h1>
    </div>
    <form wire:submit.prevent='save' enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                <div class="row">
                    @forelse ($this->categories as $category)
                        <div class="col-md-4 mb-2">
                            <div @class([
                                'card h-100',
                                'shadow  border-success' => in_array(
                                    $category->id,
                                    $this->selectedCategories),
                            ])>
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div>

                                        <h6 class="card-text">{{ $category->name_en }}</h6>
                                        <p class="card-text">
                                            {{ $category->description_en }}
                                        </p>
                                    </div>

                                    <button @class([
                                        'btn mt-2 btn-sm',
                                        'btn-primary' => in_array($category->id, $this->selectedCategories),
                                        'btn-danger' => !in_array($category->id, $this->selectedCategories),
                                    ]) type="button" wire:loading.attr="disabled"
                                        wire:click="toggleCategoreis({{ $category->id }})">
                                        @if (in_array($category->id, $this->selectedCategories))
                                            <i class="fas fa-check"></i>
                                        @else
                                            <i class="fas fa-plus"></i>
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="col-md-12">
                            <div class="alert alert-warning" role="alert">
                                No dealer found!
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled"
                wire:loading.class="btn-secondary" wire:target="save,images,video">
                Update
            </button>

        </div>
    </form>
</div>
