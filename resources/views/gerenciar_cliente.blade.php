@extends('layout')

@section('title', 'Bibliotecas - Gerenciar Clientes')

@section('content')

<script type="text/javascript" src="{{ asset('js/jquery.mask.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/fc_mask.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/cliente/cliente_app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dirPagination.js') }}"></script>

<div ng-app="brc" ng-controller="ClienteControll">

<style type="text/css">input.ng-invalid.ng-touched{border-color: red;}</style>

<style type="text/css">
.input-red {
    border: 3px solid red;
}
</style>

<div class="container">
<br/>
<h2>Gerenciar Clientes</h2>
<br/>

<form method="post" enctype="multipart/form-data" role="form" id="cl_search">
  @csrf
  <div class="row">
    <div class="col">
      <input type="text" id='cl_buscar' name='cl_buscar' class="form-control" placeholder="Digite Aqui" ng-model="search">
    </div>
    <div class="col">
      <button class="btn btn-primary mb-2" id="brsearch" type='submit' ng-click="buscar()">Buscar</button>&nbsp;
      <button class="btn btn-primary mb-2" id="brinsert" ng-click='create();'>Cadastrar</button>
    </div>
  </div>
</form>

</br>

<input type="hidden" name="row" ng-model="row">

<div ng-if="row > 0">
<table class="table table-striped">
  <tr>
    <td>Nome</td>
    <td>Rg</td>
    <td>Endereço</td>
    <td colspan="2">Opção</td>
  </tr>

  <tr dir-paginate="cl in cliente2|filter:cl_buscar|orderBy:sortKey:reverse|itemsPerPage:5">
    <td><% cl.nome %></td>
    <td><% cl.rg %></td>
    <td><% cl.endereco %>, <% cl.cidade %> - <% cl.uf %></td>
    <td><button class="btn btn-info mb-2" id="ed" data-toggle="modal" ng-click="mais(cl.nome)">+ Mais</button>&nbsp;
    <button class="btn btn-secondary mb-2" id="ed" data-toggle="modal" ng-click="historico(cl.id)">Histórico</button>&nbsp;
    <button class="btn btn-primary mb-2" id="ed" data-toggle="modal" ng-click="edit(cl.nome)">Editar</button>&nbsp;</td>
  </tr>

</table>
<dir-pagination-controls max-size="5" boundary-links="true"></dir-pagination-controls>
</div>
<br/>

<div ng-if="row == 0" id="danger" class="alert alert-danger">Cliente Não Encontrado.</div>
<br/>

<!-- Modal de Confirmação -->

<div class="modal fade" id="ModalConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header" align="center">
        <h5 class="modal-title" id="myModalLabel">&nbsp;&nbsp;Cliente Salvo com Sucesso!</h5>
      </div>

      <div class="modal-body" align="center">
          <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal" ng-click="resetForm('clform')">Fechar</button>
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

<!-- Modal para Cadastrar Clientes -->

<div class="modal fade" id="modal_insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Cadastrar Cliente</h5>
      </div>

      <div class="modal-body">
        @include('registrar_cliente')
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal" ng-click="resetForm('clform')">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Histórico -->

<div class="modal fade" id="modal_historico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Histórico de Locações</h5>
      </div>

      <div class="modal-body">
        @include('historico')
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal">Fechar</button>
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
          <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal">Fechar</button>
      </div>

    </div>
  </div>
</div>

</div>

</div>

@stop
