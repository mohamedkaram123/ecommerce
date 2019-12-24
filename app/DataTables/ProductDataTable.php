<?php

namespace App\DataTables;

use App\Product;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
            ->addColumn('edit', 'admin.product.btn.edit')
            ->addColumn('delete', 'admin.product.btn.delete')
            ->addColumn('checkbox', 'admin.manufact.btn.checkbox')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
       return Product::query();
     
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
                 //   ->addAction(['width' => '80px'])
                    ->parameters([
                        'dom'=>'Blfrtip',
                        'lengthMenu'=>[[10,25,50,100,-1],[10,25,50,'All Records']],
                        'buttons'=>[
                            ['action'=>'function(){
                                window.location.href = "'.aurl("product/create").'"
                            }','className'=>'btn btn-danger','text'=>'<i class="fa fa-plus" >'.trans("admin.addproduct").'</i>'],
                            ['extend'=>'print','className'=>'btn btn-primary','text'=>'<i class="fa fa-print" ></i>'],
                            ['extend'=>'csv','className'=>'btn btn-info','text'=>'<i class="fa fa-file" >'.trans("admin.exportcsv").'</i>'],
                            ['extend'=>'excel','className'=>'btn btn-success','text'=>'<i class="fa fa-file" >'.trans("admin.exportexcel").'</i>'],
                            ['extend'=>'reload','className'=>'btn btn-default','text'=>'<i class="fas fa-sync-alt" ></i>'],
                            ['className'=>'btn btn-danger delBtn','text'=>'<i class="fa fa-trash" >'.trans("admin.delete").'</i>'],
                
                        
                        ],
                        'initComplete'=>"function(){
                            this.api().columns([1,2,3,4]).every(function(){
                            var column = this;
                            var input = document.createElement('input');
                            $(input).appendTo($(column.footer()).empty())
                            .on('change',function(){
                                
                                column.search($(this).val(),false,false,true).draw();
                            });
                            });
                        }",
                        'language'=>datatable_lang()
                        
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name'=>'checkbox',
                'data'=>'checkbox',
                'title'=>'<input type="checkbox" class="checkall"   />',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false
        
        ],
            [
                'name'=>'id',
                'data'=>'id',
                'title'=>'ID'
        
        ],
        [
            'name'=>'title',
            'data'=>'title',
            'title'=>trans('admin.titleProduct')
    
    ],
    [
        'name'=>'content',
        'data'=>'content',
        'title'=>trans('admin.contentProduct')

],
[
    'name'=>'department_id',
    'data'=>'department_id',
    'title'=>trans('admin.department_idProduct')

],
[
    'name'=>'trademarkt_id',
    'data'=>'trademarkt_id',
    'title'=>trans('admin.trademarkt_idProduct')

],
[
    'name'=>'manufact_id',
    'data'=>'manufact_id',
    'title'=>trans('admin.manufact_idProduct')

],
[
    'name'=>'price',
    'data'=>'price',
    'title'=>trans('admin.priceProduct')

],
[
    'name'=>'stock',
    'data'=>'stock',
    'title'=>trans('admin.stockProduct')

],



[
    'name'=>'edit',
    'data'=>'edit',
    'title'=>trans('admin.edit'),
    'exportable'=>false,
    'printable'=>false,
    'orderable'=>false,
    'searchable'=>false

],
[
    'name'=>'delete',
    'data'=>'delete',
    'title'=>trans('admin.delete'),
    'exportable'=>false,
    'printable'=>false,
    'orderable'=>false,
    'searchable'=>false

],

            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Contries_' . date('YmdHis');
    }
}
