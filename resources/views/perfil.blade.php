@extends('adminlte::page')

@section('title', 'UniFone')

@section('content_header')
    
@stop

@section('content')
<style>
select.basic {
  width: 130px;
  height: 35px;
}
</style>

<div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab" aria-expanded="true">Perfil</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="settings">
                <form class="form-horizontal" action="{{route('alterarper')}}">
                  <div class="form-group">
                        <input name="idusuario" type="hidden" class="form-control" id="idusuario" placeholder="" value={{$usuario->id}}>
                        <label for="inputusuario" class="col-sm-2 control-label">Usuário</label>
                        <div class="col-sm-4">
                            <input name="usuario" type="name" class="form-control" id="inputusuario" value={{$usuario->usuario}} required>
                        </div>
                        <label for="inputsenha" class="col-sm-1 control-label">Senha</label>
                        <div class="col-sm-4">
                            <input name="senha" type="password" class="form-control" id="inputsenha" value={{$usuario->senha}} required>
                        </div>
                     </div>
                  <div class="form-group">
                    <label for="inputnome" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                      <input name="nome" type="name" class="form-control" id="inputnome" placeholder="" value={{$usuario->nome}} required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputRazao" class="col-sm-2 control-label">Ramal</label>
                    <div class="col-sm-3">
                      <input name="ramal" type="name" class="form-control" id="inputramal" value="{{$usuario->ramal}}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-warning">Alterar</button>
                    </div>
                  </div>
                  </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>

@stop