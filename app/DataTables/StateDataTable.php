<?php

namespace App\DataTables;

use App\State;
use Yajra\DataTables\Services\DataTable;

class StateDataTable extends DataTable
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
            ->addColumn('edit', 'admin.state.btn.edit')
            ->addColumn('delete', 'admin.state.btn.delete')
            ->addColumn('checkbox', 'admin.state.btn.checkbox')
            ->addColumn('cites_id', 'admin.state.btn.cites_id')
            ->addColumn('contries_id', 'admin.state.btn.contries_id')
          
           
            ->rawColumns([
                'edit',
                'delete',
                'checkbox',
                'cites',
                'contries_id',
                
          
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\State $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
       return State::query();
     
    

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
                                window.location.href = "'.aurl("state/create").'"
                            }','className'=>'btn btn-danger','text'=>'<i class="fa fa-plus" >'.trans("admin.addstate").'</i>'],
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
            'name'=>'state_name_ar',
            'data'=>'state_name_ar',
            'title'=>trans('admin.state_name_ar')
    
    ],
    [
        'name'=>'state_name_en',
        'data'=>'state_name_en',
        'title'=>trans('admin.state_name_en')

],
[
    'name'=>'cites_id',
    'data'=>'cites_id',
    'title'=>trans('admin.cites_belong')

],
[
    'name'=>'contries_id',
    'data'=>'contries_id',
    'title'=>trans('admin.contries_belong')

],
[
    'name'=>'created_at',
    'data'=>'created_at',
    'title'=>trans('admin.created_at')

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
        return 'State_' . date('YmdHis');
    }
}
