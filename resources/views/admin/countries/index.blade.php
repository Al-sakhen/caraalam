@extends('admin.layout.app')

@section('breadcrumb')
    @include('admin.layout.partials.page-header', [
        'title' => 'Countries',
        'links' => [
            [
                'name' => 'Dashboard',
                'url' => route('dashboard'),
            ],
            [
                'name' => 'Countries',
                'url' => route('dashboard.countries.index'),
            ],
        ],
    ])
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <livewire:tables.country-table />
        </div>
    </div>
@endsection
