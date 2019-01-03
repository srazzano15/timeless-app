<?php

namespace App\DataTables;

use App\User;
use App\ImportData;
use Yajra\DataTables\Services\DataTable;

class ImportDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', 'importdatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ImportData $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Importdata $model)
    {
        return $model->newQuery()->select('bag_id', 'bag_weight', 'created_at');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'add your columns',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Import_' . date('YmdHis');
    }
}
