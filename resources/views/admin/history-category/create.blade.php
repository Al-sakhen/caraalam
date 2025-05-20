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
            <h4>
                Add new
            </h4>
        </div>
        <div class="card-body">
            <livewire:dashboard.history-category.create-category-form />
        </div>
    </div>
@endsection

@push('scripts')
@endpush
