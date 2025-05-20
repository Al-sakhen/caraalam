<div wire:sortable="updateCountryOrder" wire:sortable.options="{ animation: 100 }">
    @forelse ($countries as $country)
        <div class="card mb-3" wire:sortable.handle wire:sortable.item="{{ $country->id }}"
            wire:key="country-{{ $country->id }}">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">
                    {{ $loop->iteration }}. {{ $country->name_en }}
                </h5>

                {{-- add category modal --}}
                <button type="button" class="btn btn-sm btn-primary ms-auto" data-bs-toggle="modal"
                    wire:click='openAddCategoryModal({{ $country->id }})'>
                    {{ __('Add Category') }}
                </button>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    @forelse ($country->historyCategories as $category)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-text">{{ $category->name_en }}</h6>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning" role="alert">
                                {{ __('No categories found!') }}
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        {{-- seleected categories --}}

    @empty
        <div class="alert alert-warning">
            {{ __('No history available') }}
        </div>
    @endforelse
</div>
