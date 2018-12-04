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
              <li class="active"><a href="#settings" data-toggle="tab" aria-expanded="true">Alterar Cliente</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="settings">
                <form class="form-horizontal" action="{{route('alterarcli')}}">
                  <div class="form-group">
                  <div>
                        <input name="idcliente" type="hidden" class="form-control" id="idcliente" placeholder="" value="">
                  </div>
                        <label for="inputcnpj" class="col-sm-2 control-label">CNPJ</label>
                        <div class="col-sm-4">
                            <input name="cnpj" type="number" class="form-control" id="inputcnpj" maxlength = "3" min = "1" max = "999" required>
                        </div>
                     </div>
                  <div class="form-group">
                    <label for="inputnome" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                      <input name="nome" type="name" class="form-control" id="inputnome" placeholder="" value="" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputRazao" class="col-sm-2 control-label">Razão Social</label>
                    <div class="col-sm-10">
                      <input name="razaosocial" type="name" class="form-control" id="inputrazao" placeholder="" value="" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputmunicipio" class="col-sm-2 control-label">Município</label>
                        <div class="col-sm-5">
                            <input name="municipio" type="name" class="form-control" id="inputmunicipio" placeholder="" maxlength='255' required>
                        </div> 
                        <label for="cbestados" class="col-sm-2 control-label">Estados</label>
                            <select id=cbestados class="simple basic" name="estados">
                                <option value="Acre" selected="selected"  >Acre</option>
                                <option value="Alagoas" >Alagoas</option>
                                <option value="Amapá"   >Amapá</option>
                                <option value="Amazonas">Amazonas</option>
                                <option value="Bahia"   >Bahia</option>
                                <option value="Ceará"   >Ceará</option>
                                <option value="Distrito Federal" >Distrito Federal</option>
                                <option value="Espírito Santo"   >Espírito Santo</option>
                                <option value="Goiás"    >Goiás</option>
                                <option value="Maranhão" >Maranhão</option>
                                <option value="Mato Grosso" >Mato Grosso</option>
                                <option value="Mato Grosso do Sul" >Mato Grosso do Sul</option>
                                <option value="Minas Gerais" >Minas Gerais</option>
                                <option value="Pará" >Pará</option>
                                <option value="Paraíba" >Paraíba</option>
                                <option value="Paraná" >Paraná</option>
                                <option value="Pernambuco" >Pernambuco</option>
                                <option value="Piauí" >Piauí</option>
                                <option value="Rio de Janeiro" >Rio de Janeiro</option>
                                <option value="Rio Grande do Sul" >Rio Grande do Sul</option>
                                <option value="Rondônia" >Rondônia</option>
                                <option value="Roraima" >Roraima</option>
                                <option value="Santa Catarina" >Santa Catarina</option>
                                <option value="São Paulo" >São Paulo</option>
                                <option value="Sergipe" >Sergipe</option>
                                <option value="Tocantins" >Tocantins</option>
                            </select> 
                  </div>
                  <div class="form-group">
                        <label for="inputtelefone1" class="col-sm-2 control-label">Telefone 1</label>
                        <div class="col-sm-4">
                            <input name="telefone1" type="tel" class="form-control" id="inputtelefone1" required >        
                        </div>
                        <label for="inputtelefone2" class="col-sm-2 control-label">Telefone 2</label>
                        <div class="col-sm-4">
                            <input name="telefone2" type="tel" class="form-control" id="inputtelefone2" required>
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