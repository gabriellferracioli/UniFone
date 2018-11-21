@extends('adminlte::page')

@section('title', 'UniFone')

@section('content_header')
    
@stop

@section('content')
<div class="box">
   <div class="box-header">
      <h3 class="box-title">Usuários</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
      <div id="example1_wrapper" class="dataTables_wrapper form-inline">
         <div class="row">
            <div class="col-sm-6">
               <div class="dataTables_length" id="botoes">
               <a href="{{route('cadusuario')}}"  class="btn btn-success" >Incluir</a>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-12">
               <table id="tabclientes" class="table table-bordered table-hover dataTable ">
                  <thead>
                     <tr role="row">
                        <th  tabindex="0" aria-controls="controls" rowspan="1" colspan="1" style="width: 50px;">ID</th>
                        <th  tabindex="0" aria-controls="controls" rowspan="1" colspan="1" style="width: 200px;">Usuário</th>
                        <th  tabindex="0" aria-controls="controls" rowspan="1" colspan="1" style="width: 500px;">Nome</th>
                        <th  tabindex="0" aria-controls="controls" rowspan="1" colspan="1" style="width: 80px;">Ramal</th>
                     </tr>
                  </thead>                  
                  <tbody>
                  @foreach($usuarios as $usuario)
                     <tr role="row">
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->usuario}}</td>
                        <td>{{$usuario->nome}}</td>
                        <td>{{$usuario->ramal}}</td>
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