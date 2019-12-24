<?php

namespace App\DataTables;

use App\Contries;
use Yajra\DataTables\Services\DataTable;

class ContriesDataTable extends DataTable
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
            ->addColumn('edit', 'admin.contries.btn.edit')
            ->addColumn('delete', 'admin.contries.btn.delete')
            ->addColumn('checkbox', 'admin.contries.btn.checkbox')
            ->addColumn('logo', 'admin.contries.btn.logo')
           
            ->rawColumns([
                'edit',
                'delete',
                'checkbox',
                'logo'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
       return Contries::query();
     
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
                                window.location.href = "'.aurl("contries/create").'"
                            }','className'=>'btn btn-danger','text'=>'<i class="fa fa-plus" >'.trans("admin.addcontries").'</i>'],
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
            'name'=>'country_name_ar',
            'data'=>'country_name_ar',
            'title'=>trans('admin.country_name_ar')
    
    ],
    [
        'name'=>'country_name_en',
        'data'=>'country_name_en',
        'title'=>trans('admin.country_name_en')

],
[
    'name'=>'code',
    'data'=>'code',
    'title'=>trans('admin.code')

],
[
    'name'=>'mob',
    'data'=>'mob',
    'title'=>trans('admin.mob')

],

[
    'name'=>'currancy',
    'data'=>'currancy',
    'title'=>trans('admin.currancy')

],

[
    'name'=>'logo',
    'data'=>'logo',
    'title'=>trans('admin.logo')

],
[
    'name'=>'updated_at',
    'data'=>'updated_at',
    'title'=>trans('admin.updated_at')

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
