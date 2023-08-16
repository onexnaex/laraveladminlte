<?php

namespace App\DataTables;

use App\Models\CategoryBlog;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryBlogDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
                ->addColumn('action', ' <a href="{{route("CategoryBlog.show",$id)}}" title="show" class="mr-1"><span class="fa-regular fa-eye"></span></a>
                <a href="{{route("CategoryBlog.edit",$id)}}" title="update" class="mr-1"><span class="fa-regular fa-pen-to-square"></span></a>
                <a onclick="deletef(\'{{route("CategoryBlog.destroy",$id)}}\',{{$id}})" href="#" class="mr-1"><span class="fa-solid fa-trash-can"></span></a>')
                ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(CategoryBlog $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('categoryblog-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('category_name'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->addClass('text-center'),
           
            
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'CategoryBlog_' . date('YmdHis');
    }
}
