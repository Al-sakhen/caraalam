@extends('admin.layout.app')

@section('breadcrumb')
    @include('admin.layout.partials.page-header', [
        'title' => 'Car History',
        'links' => [
            [
                'name' => 'Dashboard',
                'url' => route('dashboard'),
            ],
            [
                'name' => 'Cars',
                'url' => route('dashboard.cars.index'),
            ],
            [
                'name' => 'History',
                'url' => '#',
            ],
        ],
    ])
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Car ({{ $car->name_en }}) History</h5>
        </div>
        <div class="card-body">
            <livewire:dashboard.cars.car-history :id="$id" />
        </div>
    </div>


    {{-- Add Category To The CarCountry Modal --}}
    {{-- Edit Country Modal --}}
    <div class="modal fade" id="addNewCategoryToCountry" tabindex="-1" aria-labelledby="addNewCategoryToCountryLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <livewire:dashboard.modals.link-category-to-car-country-modal :carId="$id" />
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('livewire:init', (event) => {
            // ============== Open Edit Country Modal ==============
            Livewire.on('openAddCategoryModal', (event) => {
                let modal = new bootstrap.Modal(document.getElementById('addNewCategoryToCountry'));
                modal.show();

                let countryId = event[0].countryId;
                let carId = event[0].carId;
                Livewire.dispatch('setCountry', {
                    countryId: countryId,
                    carId: carId,
                });
            });

            // ============== Close Edit Country Modal ==============
            Livewire.on('closeLinkModal', (event) => {
                bootstrap.Modal.getInstance(document.getElementById('addNewCategoryToCountry')).hide();
            });
        });
    </script>
@endpush
