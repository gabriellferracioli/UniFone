@extends('adminlte::page')

@section('title', 'UniFone')

@section('content_header')
    
@stop

@section('content')
<div class="box">
   <div class="box-header">
      <h3 class="box-title">Ligações</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
      <div id="example1_wrapper" class="dataTables_wrapper form-inline">
         <div class="row">
            <div class="col-sm-6">
               <div class="dataTables_length" id="botoes">
               <a href="{{route('cadligacao')}}"  class="btn btn-success" >Incluir</a>
               </div>
            </div>
            <div class="col-sm-6">
               <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-12">
               <table id="tabligacoes" class="table table-bordered table-hover dataTable ">
                  <thead>
                     <tr role="row">
                        <th  tabindex="0" aria-controls="controls" rowspan="1" colspan="1" style="width: 30px;">ID</th>
                        <th  tabindex="0" aria-controls="controls" rowspan="1" colspan="1" style="width: 80px;">ADM</th>
                        <th  tabindex="0" aria-controls="controls" rowspan="1" colspan="1" style="width: 230px;">Cliente</th>
                        <th  tabindex="0" aria-controls="controls" rowspan="1" colspan="1" style="width: 500px;">Assunto</th>
                     </tr>
                  </thead>                  
                  <tbody>
                  @foreach($ligacoes as $ligacao)
                     <tr role="row">
                        <td>{{$ligacao->id}}</td>
                        <td>{{$ligacao->cod}}</td>
                        <td>{{$ligacao->cnome}}</td>
                        <td>{{$ligacao->assunto}}</td>
                     </tr>
                 @endforeach                    
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <!-- /.box-body -->
</div>

@stop