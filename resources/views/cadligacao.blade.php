@extends('adminlte::page')

@section('title', 'UniFone')

@section('content_header')
    
@stop

@section('content')
<style>
select.basic {
  width: 120px;
  height: 35px;
}
</style>

<div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab" aria-expanded="true">Cadastrar Ligacão</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="settings">
                <form class="form-horizontal" action="{{route('inserirlig')}}">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">ADM</label>
                    <div class='row'>
                        <div class="col-sm-2">
                        <input name="ADM" type="nome" class="form-control" id="=" placeholder="" value="" maxlength='5' >        
                        </div>
                        <div>
                        <a id="btnADM" class="btn btn-success" >Buscar</a>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputNome" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-8">
                      <input name="Nome" type="name" class="form-control" id="inputnome" placeholder="" value="" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputRazao" class="col-sm-2 control-label">Razão Social</label>
                    <div class="col-sm-10">
                      <input name="razaosocial" type="name" class="form-control" id="inputrazao" placeholder="" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAssunto" class="col-sm-2 control-label">Assunto</label>
                        <div class="col-sm-6">
                            <input name="assunto" type="name" class="form-control" id="inputassunto" placeholder="" maxlength='255'>
                        </div> 
                        <label for="cbUrgencia" class="col-sm-2 control-label">Urgência</label>
                            <select id=cbUrgencia class="simple basic" name="Urgencia">
                                <option value="Normal" selected="selected"  >Normal</option>
                                <option value="Urgente" >Urgente</option>
                                <option value="Critico" >Critico</option>
                            </select> 
                  </div>
                  <div class="form-group">
                    <label for="observacoes" class="col-sm-2 control-label">Observações</label>
                    <div class="col-sm-10">
                        <textarea name='observacoes' class="form-control" rows="5" id="inputObservacoes" maxlength='255'></textarea>
                    </div>
                  </div>           
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Confirmar</button>
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