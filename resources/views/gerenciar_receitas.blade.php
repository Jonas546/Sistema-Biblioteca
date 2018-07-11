@extends('layout')

@section('title', 'Bibliotecas - Gerenciar Receitas')

@section('content')

<style type="text/css">
  
#data_inicio1:focus, #data_fim1:focus {

border-radius:4px;
-moz-border-radius:4px;
-webkit-border-radius:4px;
-webkit-box-shadow: 0px 0px 15px 1px #ffffff;
-moz-box-shadow: 0px 0px 15px 1px #ffffff;
box-shadow: 0px 0px 5px 0px #ffffff;
border:1px solid #ffffff;
outline:none; 

}


</style>

<script type="text/javascript" src="{{ asset('js/jquery.mask.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/fc_mask.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/financeiro/financeiro_rc_app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dirPagination.js') }}"></script>

<div ng-app="bdp" ng-controller="FinanceiroControll">

<style type="text/css">input.ng-invalid.ng-touched{border-color: red;}</style>

<style type="text/css">
.input-red {
    border: 3px solid red;
}
</style>

<div class="container">
<br/>
<h2>Gerenciar Receitas</h2>
<br/>

<form method="post" enctype="multipart/form-data" name="fcdsform" id="fcdsform" novalidate>
  @csrf
  <div class="row">
    <div class="col">
      <input type="text" id='data_inicio' name='data_inicio' class="form-control" readonly placeholder="Data Inicial" ng-model="receita.inicial" required="">
      <script>
        $('#data_inicio').datepicker({
          uiLibrary: 'bootstrap4'
        });
      </script>
    </div>
    <div class="col">
      <input type="text" class="form-control" readonly id='data_fim' name='data_fim' placeholder="Data Final" ng-model="receita.final" required="">
      <script>
        $('#data_fim').datepicker({
          uiLibrary: 'bootstrap4'
        });
      </script>
    </div>
    <div class="col">
      <button class="btn btn-primary mb-2" ng-click="listar_rc(fcdsform.$valid)" id="listar_rc" ng-disabled="fcdsform.$invalid">Buscar</button>&nbsp;
    </div>
  </div>
</form>

</br>

<input type="hidden" name="row" ng-model="row">

<div ng-if="row > 0">
<table class="table table-striped">
  <tr>
    <td>#</td>
    <td>Cliente</td>
    <td>Livro</td>
    <td>Valor</td>
  </tr>

  <tr dir-paginate="dp in receita1|orderBy:sortKey:reverse|itemsPerPage:5">
    <td><% dp.id %></td>
    <td><% dp.nome %></td>
    <td><% dp.titulo %></td>
    <td><% dp.valor | currency: 'R$' %></td>
  </tr>

</table>
<dir-pagination-controls max-size="5" boundary-links="true"></dir-pagination-controls>
</div>
<br/>

<div ng-if="row == 0" id="danger" class="alert alert-danger">Dados Não Encontrados.</div>
<br/>

<div ng-if="row > 0">
  
  <form method="post" action="/rel_receitas" target="_blank" enctype="multipart/form-data" role="form"> 
    @csrf
    <div class="form-group row">
      <input type="text" class="form-control-plaintext" name="data_inicio1" id="data_inicio1" ng-model="data_inicio1" style="color: #ffffff;" readonly="">
      <input type="text" name="data_fim1" id="data_fim1" class="form-control-plaintext" ng-model="data_fim1" style="color: #ffffff;" readonly="">
    </div>
    <button class="btn btn-primary mb-2" id="relatorio" type="submit">Relatório PDF</button>
  </form>

</div>

</div>

</div>

@stop
