@extends('layout')

@section('title', 'Bibliotecas - Gerenciar Despesas')

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
<script type="text/javascript" src="{{ asset('js/financeiro/financeiro_app.js') }}"></script>
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
<h2>Gerenciar Despesas</h2>
<br/>

<form method="post" enctype="multipart/form-data" name="fcdsform" id="fcdsform" novalidate>
  @csrf
  <div class="row">
    <div class="col">
      <input type="text" id='data_inicio' name='data_inicio' class="form-control" readonly placeholder="Data Inicial" ng-model="despesa.inicial" required="">
      <script>
        $('#data_inicio').datepicker({
          uiLibrary: 'bootstrap4'
        });
      </script>
    </div>
    <div class="col">
      <input type="text" class="form-control" readonly id='data_fim' name='data_fim' placeholder="Data Final" ng-model="despesa.final" required="">
      <script>
        $('#data_fim').datepicker({
          uiLibrary: 'bootstrap4'
        });
      </script>
    </div>
    <div class="col">
      <button class="btn btn-primary mb-2" ng-click="listar_dp(fcdsform.$valid)" id="listar_dp" ng-disabled="fcdsform.$invalid">Buscar</button>&nbsp;
      <button class="btn btn-primary mb-2" id="registrar" ng-click="create_dp()">Registrar</button>
    </div>
  </div>
</form>

</br>

<input type="hidden" name="row" ng-model="row">

<div ng-if="row > 0">
<table class="table table-striped">
  <tr>
    <td>Desc.</td>
    <td>Tipo</td>
    <td>Data</td>
    <td>Qtde</td>
    <td>Valor</td>
    @if($permission == 2)
    <td>Opção</td>
    @endif
  </tr>

  <tr dir-paginate="dp in despesa1|orderBy:sortKey:reverse|itemsPerPage:5">
    <td><% dp.descricao %></td>
    <td><% dp.tipo %></td>
    <td><% dp.data_registro | date: 'dd/MM/yyyy' %></td>
    <td><% dp.qtde %></td>
    <td><% dp.valor | currency: 'R$' %></td>
    @if($permission == 2)
    <td><button class="btn btn-danger mb-2" id="ed" data-toggle="modal" ng-click="excluir(dp.id)">Excluir</button>&nbsp;</td>
    @endif
  </tr>

</table>
<dir-pagination-controls max-size="5" boundary-links="true"></dir-pagination-controls>
</div>
<br/>

<div ng-if="row == 0" id="danger" class="alert alert-danger">Dados Não Encontrados.</div>
<br/>

<div ng-if="row > 0">
  
  <form method="post" action="/rel_gastos" target="_blank" enctype="multipart/form-data" role="form"> 
    @csrf
    <div class="form-group row">
      <input type="text" class="form-control-plaintext" name="data_inicio1" id="data_inicio1" ng-model="data_inicio1" style="color: #ffffff;" readonly="">
      <input type="text" name="data_fim1" id="data_fim1" class="form-control-plaintext" ng-model="data_fim1" style="color: #ffffff;" readonly="">
    </div>
    <button class="btn btn-primary mb-2" id="relatorio" type="submit">Relatório PDF</button>
  </form>

</div>

<!-- Modal de Confirmação -->

<div class="modal fade" id="ModalConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header" align="center">
        <h5 class="modal-title" id="myModalLabel">&nbsp;&nbsp;Despesa Registrada com Sucesso!</h5>
      </div>

      <div class="modal-body" align="center">
          <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal" ng-click="resetForm('fcdform')">Fechar</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal de Confirmação e Exclusão -->

<div class="modal fade" id="ModalConfirmEx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header" align="center">
        <h5 class="modal-title" id="myModalLabel">&nbsp;&nbsp;Dados Excluídos com Sucesso!</h5>
      </div>

      <div class="modal-body" align="center">
          <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal">Fechar</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal para Mais -->

<div class="modal fade" id="modal_mais" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Dados do Cliente</h5>
      </div>

      <div class="modal-body">
        @include('cliente_mais')
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Editar Dados de Cliente -->

<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Editar Dados do Cliente</h5>
      </div>

      <div class="modal-body">
        @include('cliente_update')
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Registrar Despesas -->

<div class="modal fade" id="modal_insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Registrar Despesa</h5>
      </div>

      <div class="modal-body">
        @include('registrar_gastos')
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal" ng-click="resetForm('fcdform')">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Erro -->

<div class="modal fade" id="ModalErro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header" align="center">
        <h5 class="modal-title" id="myModalLabel">&nbsp;&nbsp;Problemas no Servidor!</h5>
      </div>

      <div class="modal-body" align="center">
          <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal" ng-click="resetForm('fcdform')">Fechar</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal de Exclusão -->

<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header" align="center">
        <h5 class="modal-title" id="myModalLabel">&nbsp;&nbsp;Dados Excluídos com Sucesso!</h5>
      </div>

      <div class="modal-body" align="center">
          <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal">Fechar</button>
      </div>

    </div>
  </div>
</div>

</div>

</div>

@stop
