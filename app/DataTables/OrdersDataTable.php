<?php

namespace App\DataTables;

use App\Models\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrdersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $orderinfo = Order::with(['properties', 'tenants']);
        // $orderinfo = Order::join('orderline', 'orderline.orderinfo_id', '=', 'orderinfo.id')
        // ->join('tenants','tenants.id','=','orderinfo.tenant_id')
        // ->join('properties','properties.id','=','orderline.property_id')
        // ->select('orderinfo.*', 'properties.id as property_id', 'tenants.last_name')
        // ->get();

        // dd($orderinfo);
        return datatables()
            ->eloquent($orderinfo)
            ->addColumn('action', 'orders.action')
            ->addColumn('created_at', function ($row) {
                return $row->created_at->format('m/d/Y - h:m A');
            })
            ->addColumn('last_name', function ($row) {
                 return $row->tenants->last_name;
            })
            ->escapeColumns([]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('orders-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('last_name')->title('Tenant Name'),
            Column::make('total_days')->title('Total of Days'),
            Column::make('start_date')->title('Start Date'),
            Column::make('end_date')->title('End Date'),
            // Column::make('add your columns'),
            Column::make('created_at'),
            // Column::make('updated_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Orders_' . date('YmdHis');
    }
}
