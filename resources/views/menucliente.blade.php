@extends('adminlte::page')

@section('title', 'UniFone')

@section('content_header')
    
@stop

@section('content')
<div class="box">
   <div class="box-header">
      <h3 class="box-title">Clientes</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
      <div id="example1_wrapper" class="dataTables_wrapper form-inline">
         <div class="row">
            <div class="col-sm-6">
               <div class="dataTables_length" id="botoes">
               <a href="{{route('cadcliente')}}"  class="btn btn-success" >Incluir</a>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-12">
               <table id="tabclientes" class="table table-bordered table-hover dataTable ">
                  <thead>
                     <tr role="row">
                        <th  tabindex="0" aria-controls="controls" rowspan="1" colspan="1" style="width: 80px;">ADM</th>
                        <th  tabindex="0" aria-controls="controls" rowspan="1" colspan="1" style="width: 500px;">Nome</th>
                        <th  tabindex="0" aria-controls="controls" rowspan="1" colspan="1" style="width: 230px;">Municipio</th>
                        <th  tabindex="0" aria-controls="controls" rowspan="1" colspan="1" style="width: 100px;">Telefone</th>
                     </tr>
                  </thead>                  
                  <tbody>
                  @foreach($clientes as $cliente)
                     <tr role="row">
                        <td>{{$cliente->cod}}</td>
                        <td>{{$cliente->nome}}</td>
                        <td>{{$cliente->municipio}}</td>
                        <td>{{$cliente->telefone}}</td>
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