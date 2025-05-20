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
                'url' => '#',
            ],
        ],
    ])
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <a href="{{ route('dashboard.cars.create') }}" type="button" class="btn btn-primary">
                    Add new Car
                </a>
            </div>
        </div>
        <div class="card-body">
            <livewire:tables.car-table />
        </div>
    </div>
@endsection

@push('scripts')
@endpush
