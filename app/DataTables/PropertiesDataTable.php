<?php

namespace App\DataTables;

use App\Models\Property;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PropertiesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable($query): EloquentDataTable
    {
        $properties = Property::withTrashed()->with(['landlords']);
        
        return datatables()
            ->eloquent($properties)
            ->addColumn('status', function ($properties) {
                if ($properties->deleted_at)
                    return '<span class="badge rounded-pill bg-secondary" style="color:white"> Deactivated </span>';
                else
                    return '<span class="badge rounded-pill bg-info" style="color:white"> Available </span>';
            })
            ->addColumn('Action', function ($row) {
                if ($row->deleted_at)
                    return '<a href="' . route('property.restore', $row->id) . '" class="btn bg-gradient-info">Restore</a>';
                else
                    return
                    '<form action="' . route('property.destroy', $row->id) . '" method="POST">' . csrf_field() . '
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-outline-danger float-end" type="submit">Delete</button>
                    </form>
                    <form action="' . route('property.deactivate', $row->id) . '" method="POST">' . csrf_field() . '
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn bg-gradient-danger" type="submit">Deactivate</button>
                    </form>';
            })
            ->addColumn('image', function ($properties) {
                return '<img src="' . asset($properties->imagePath) . '" width="80"height="80" class="rounded" >';
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at->format('m/d/Y - h:m A');
            })
            ->escapeColumns([]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Property $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Property $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('properties-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('area')->title('Area'),
            Column::make('garage')->title('Garage'),
            Column::make('bathroom')->title('Bathroom'),
            Column::make('bedroom')->title('Bedroom'),
            Column::make('rent')->title('Rental fee'),
            Column::make('city')->title('City'),
            Column::make('state')->title('State'),
            Column::make('address')->title('Address'),
            Column::make('description')->title('Description'),
            Column::make('status'),
            Column::make('image'),
            Column::make('created_at'),
            Column::computed('Action')
                ->exportable(false)
                ->printable(false)
                ->width(250)
                ->addClass('text-center'),
        ];
    }
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Properties_' . date('YmdHis');
    }
}