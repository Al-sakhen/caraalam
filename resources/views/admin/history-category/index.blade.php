@extends('admin.layout.app')

@section('breadcrumb')
    @include('admin.layout.partials.page-header', [
        'title' => 'History Categories',
        'links' => [
            [
                'name' => 'Dashboard',
                'url' => route('dashboard'),
            ],
            [
                'name' => 'History Categories',
                'url' => '#',
            ],
        ],
    ])
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <a href="{{ route('dashboard.history-categories.create') }}" type="button" class="btn btn-primary">
                    Add new History Category
                </a>
            </div>
        </div>
        <div class="card-body">
            <livewire:tables.history-category-table />
        </div>
    </div>
@endsection

@push('scripts')
@endpush
