<?php

namespace App\DataTables;

use App\Manufact;
use Yajra\DataTables\Services\DataTable;

class ManufactDataTable extends DataTable
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
            ->addColumn('edit', 'admin.manufact.btn.edit')
            ->addColumn('delete', 'admin.manufact.btn.delete')
            ->addColumn('checkbox', 'admin.manufact.btn.checkbox')
            ->addColumn('logo', 'admin.manufact.btn.logo')
           
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
       return Manufact::query();
     
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
                                window.location.href = "'.aurl("manufact/create").'"
                            }','className'=>'btn btn-danger','text'=>'<i class="fa fa-plus" >'.trans("admin.addmanufact").'</i>'],
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
            'name'=>'name_ar',
            'data'=>'name_ar',
            'title'=>trans('admin.name_ar')
    
    ],
    [
        'name'=>'name_en',
        'data'=>'name_en',
        'title'=>trans('admin.name_en')

],

[
    'name'=>'website',
    'data'=>'website',
    'title'=>trans('admin.website')

],
[
'name'=>'contact_name',
'data'=>'contact_name',
'title'=>trans('admin.contact_name')

],
[
    'name'=>'adress',
    'data'=>'adress',
    'title'=>trans('admin.adress')

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
        return 'manufact_' . date('YmdHis');
    }
}
