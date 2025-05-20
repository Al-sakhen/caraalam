@extends('admin.layout.app')

@section('breadcrumb')
    @include('admin.layout.partials.page-header', [
        'title' => 'Cars',
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
                'name' => 'Edit Car',
                'url' => '#',
            ],
        ],
    ])
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>
                Edit Car
            </h4>
        </div>
        <div class="card-body">
            <livewire:dashboard.cars.edit-car-form :id="$id" />
        </div>
    </div>
@endsection

@push('scripts')
@endpush
