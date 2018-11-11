@extends('adminlte::page')

@section('title', 'UniFone')

@section('content_header')
    
@stop

@section('content')
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ultimas Chamadas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 10px">ADM</th>
                  <th style="width: 40px">Nome</th>
                </tr>
                @foreach($ultimasligacoes as $ultima)
                <tr>
                  <td>{{$ultima->adm}}</td>
                  <td>{{$ultima->cnome}}</td>
                </tr>
                <tr>
                @endforeach
              </tbody></table>
            </div>
        </div>
        </div>
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Clientes com mais ligações</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 10px">ADM</th>
                  <th style="width: 40px">Nome</th>
                </tr>
                @foreach($clientesligacoes as $ligacoes)
                <tr>
                  <td>{{$ligacoes->adm}}</td>
                  <td>{{$ligacoes->cnome}}</td>
                </tr>
                @endforeach
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
@stop