@extends('adminlte::page')

@section('title', 'UniFone')

@section('content_header')
    
@stop

@section('content')
    <div class="col-md-4">
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
                <tr>
                  <td>1.</td>
                  <td>Update software</td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Clean database</td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Cron job running</td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Fix and squish bugs</td>
                </tr>
              </tbody></table>
            </div>
        </div>
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
                <tr>
                  <td>1.</td>
                  <td>Update software</td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Clean database</td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Cron job running</td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Fix and squish bugs</td>
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
@stop