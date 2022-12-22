<?php

namespace App\DataTables;

use App\Http\Services\LocalizationService;
use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BlogCategoriesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('actions', 'BlogCategories.action')
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BlogCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BlogCategory $model): QueryBuilder
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
        {
            return $this->builder()
                ->columns($this->getColumns())
                ->minifiedAjax()
                ->dom('Bfrtip')
                ->orderBy(1);
        }
    }

    public function getColumns(): array
    {
        $localizations =  LocalizationService::getLocalizationDatatable((new BlogCategory)->translatable);
        $columns = array_merge([
            ['name' => 'id',                  'data' => 'id',                  'title' => 'ID'],
//           ['name' => 'actions',             'data' => 'actions',             'title' => 'Actions', 'exportable' => false, 'printable' => false, 'orderable' => false, 'searchable' => false],
       ], $localizations,
            [
                ['name' => 'actions',             'data' => 'actions',             'title' => 'Actions', 'exportable' => false, 'printable' => false, 'orderable' => false, 'searchable' => false],
            ]
        );

//        $columns =  array_merge($columns,
//            ['name' => 'actions',             'data' => 'actions',             'title' => 'Actions', 'exportable' => false, 'printable' => false, 'orderable' => false, 'searchable' => false],
//        );

        return $columns;
    }


    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'BlogCategories_' . date('YmdHis');
    }
}
