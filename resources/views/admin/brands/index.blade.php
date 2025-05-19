@extends('admin.layout.app')

@section('breadcrumb')
    @include('admin.layout.partials.page-header', [
        'title' => 'Brands',
        'links' => [
            [
                'name' => 'Dashboard',
                'url' => route('dashboard'),
            ],
            [
                'name' => 'Brands',
                'url' => '#',
            ],
        ],
    ])
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBrandModal">
                    Add new Brand
                </button>

            </div>
        </div>
        <div class="card-body">
            <livewire:tables.brand-table />
        </div>
    </div>


    {{-- Create Modal --}}
    <div class="modal fade" id="createBrandModal" tabindex="-1" aria-labelledby="createBrandModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createBrandModalLabel">
                        Create Brand
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <livewire:dashboard.brands.create-brand-modal />
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    <div class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="editBrandModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editBrandModalLabel">
                        Edit Brand
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <livewire:dashboard.brands.edit-brand-modal />
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            // ============== Close Create Modal ==============
            Livewire.on('closeCreateModal', (event) => {
                bootstrap.Modal.getInstance(document.getElementById('createBrandModal')).hide();
            });

            // ============== Open Edit Modal ==============
            Livewire.on('openEditBrandModal', (event) => {
                new bootstrap.Modal(document.getElementById('editBrandModal')).show();
                let brand = event[0];
                console.log(brand);
                Livewire.dispatch('setEditBrand', brand);
            });

            // ============== Close Edit Modal ==============
            Livewire.on('closeEditModal', (event) => {
                bootstrap.Modal.getInstance(document.getElementById('editBrandModal')).hide();
            });

        });
    </script>
@endpush
