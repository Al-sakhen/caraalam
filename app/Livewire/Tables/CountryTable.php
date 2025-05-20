<?php

namespace App\Livewire\Tables;

use App\Models\Country;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable as SetUpExportable;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class CountryTable extends PowerGridComponent
{
    use WithExport;
    public string $tableName = 'countries-table-hrpps2-table';


    public function setUp(): array
    {

        return [
            PowerGrid::header()->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage(
                    $perPage = 20,
                    $perPageValues = [10, 20, 50, 100, 0]
                )
                ->showRecordCount(),
        ];
    }

    #[On('refreshCountries')]
    public function datasource(): Builder
    {
        return Country::orderBy('status', 'desc');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('key')
            ->add('name_en')
            ->add('name_ar')
            ->add('status', function ($value) {
                if ($value->status == 1) {
                    return '<span class="badge badge-success">Active</span>';
                }
                return '<span class="badge badge-danger">Inactive</span>';
            })
            ->add('cities_count', function ($value) {
                return $value->cities_count;
            })

            ->add('country_code', function ($value) {
                return $value->country_code ? strtoupper($value->country_code) : "-";
            })

            ->add('created_at');
    }

    public function columns(): array
    {
        return [

            Column::make('Name en', 'name_en')
                ->searchable(),

            Column::make('Name ar', 'name_ar')
                ->searchable(),

            // Column::make('Cities', 'cities_count')
            //     ->sortable()
            //     ->visibleInExport(false),


            // Column::make('Code', 'country_code')
            //     ->sortable()
            //     ->visibleInExport(false),




            Column::make('Status', 'status')->sortable()
                ->visibleInExport(false),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::boolean('status')
                ->label('active', 'inactive'),
        ];
    }

    #[\Livewire\Attributes\On('toggleStatus')]
    public function toggleStatus($rowId): void
    {
        $country = Country::find($rowId);
        $country->status = !$country->status;
        $country->save();
        $this->js('toastr.success("Status changed successfully")');
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->dispatch('openEditCountryModal', ['countryId' => $rowId]);
    }

    public function actions(Country $row): array
    {
        return [

            Button::add('toggleStatus')
                ->slot($row->status == 1 ? '<i class="fas fa-toggle-on"></i>' : '<i class="fas fa-toggle-off"></i>')
                ->class('btn btn-info btn-sm rounded')
                ->dispatch('toggleStatus', ['rowId' => $row->id]),

            // Button::add('edit')
            //     ->slot('<i class="fas fa-edit"></i>')
            //     ->class('btn btn-primary btn-sm rounded')
            //     ->dispatch('edit', ['rowId' => $row->id]),
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
