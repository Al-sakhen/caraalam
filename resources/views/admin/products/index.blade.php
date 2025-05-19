@extends('admin.layout.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/select2/css/select2.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('dashboard/plugins/select2/js/select2.full.min.js') }}"></script>
@endpush

@section('breadcrumb')
    @include('admin.layout.partials.page-header', [
        'title' => 'Products',
        'links' => [
            [
                'name' => 'Dashboard',
                'url' => route('dashboard'),
            ],
            [
                'name' => 'Products',
                'url' => '#',
            ],
        ],
    ])
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <a href="{{ route('dashboard.products.create') }}" class="btn btn-primary">
                    Add new Product
                </a>
            </div>
        </div>
        <div class="card-body">
            <livewire:tables.product-table />
        </div>
    </div>


    {{-- Create Offcanvas --}}
    <div class="offcanvas offcanvas-start" tabindex="-1" id="createProductModal" aria-labelledby="createProductModalLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="createProductModalLabel">
                Create Product
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        {{-- <livewire:dashboard.products.create-product-modal /> --}}
    </div>

    {{-- Edit Offcanvas --}}
    <div class="offcanvas offcanvas-start" tabindex="-1" id="editProductModal" aria-labelledby="editProductModalLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="editProductModalLabel">
                Edit Product
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        {{-- <livewire:dashboard.products.edit-product-modal /> --}}
    </div>
@endsection


@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            // ============== Close Create Modal ==============
            Livewire.on('closeCreateModal', (event) => {
                bootstrap.Offcanvas.getInstance(document.getElementById('createProductModal')).hide();
            });

            // ============== Open Edit Modal ==============
            Livewire.on('openEditProductModal', (event) => {
                new bootstrap.Offcanvas(document.getElementById('editProductModal')).show();
                let product = event[0];
                console.log(product);
                Livewire.dispatch('setEditProduct', product);
            });

            // ============== Close Edit Modal ==============
            Livewire.on('closeEditModal', (event) => {
                bootstrap.Offcanvas.getInstance(document.getElementById('editProductModal')).hide();
            });

        });
    </script>
@endpush
