<?php

namespace App\DataTables;

use App\Models\ArticleBlog;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Models\CategoryBlog;

class ArticleBlogDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function getCategoryname($fk_category)
    {
        $model = CategoryBlog::class;
        //$tes = $model::where("id",$fk_category)->first()->value("category_name");
        $tes = "tes";
        return $tes;
    }

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
    
        $model = CategoryBlog::class;

        return (new EloquentDataTable($query))
        ->addColumn('action', ' <a href="{{route("ArticleBlog.show",$id)}}" title="show" class="mr-1"><span class="fa-regular fa-eye"></span></a>
        <a href="{{route("ArticleBlog.edit",$id)}}" title="update" class="mr-1"><span class="fa-regular fa-pen-to-square"></span></a>
        <a onclick="deletef(\'{{route("ArticleBlog.destroy",$id)}}\',{{$id}})" href="#" class="mr-1"><span class="fa-solid fa-trash-can"></span></a>')
        ->addColumn('category','$model::where("id",{{$fk_category}})->first()->value("category_name")')
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ArticleBlog $model): QueryBuilder
    {
        return $model->newQuery()->with(['category']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('articleblog-table')
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
           
            Column::make('id'),
            Column::make('title'),
            Column::make('description'),
            Column::make('fk_category'),
            Column::computed('category'),
            Column::make('thumbnail'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
           
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ArticleBlog_' . date('YmdHis');
    }
}
