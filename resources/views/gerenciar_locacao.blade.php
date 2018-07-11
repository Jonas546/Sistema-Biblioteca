@extends('layout')

@section('title', 'Bibliotecas - Gerenciar Locações')

@section('content')

<script type="text/javascript" src="{{ asset('js/jquery.mask.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/fc_mask.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/locacao/locacao_app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dirPagination.js') }}"></script>

<div ng-app="blc" ng-controller="LocacaoControll">

<style type="text/css">input.ng-invalid.ng-touched{border-color: red;}</style>

<div class="container">
<br/>
<h2>Gerenciar Locações</h2>
<br/>

<form method="post" enctype="multipart/form-data" role="form" id="lc_search">
  @csrf
  <div class="row">
    <div class="col">
      <input type="text" id='lc_buscar' name='lc_buscar' class="form-control" placeholder="Digite Aqui o Código da Locação" ng-model="search">
    </div>
    <div class="col">
      <button class="btn btn-primary mb-2" id="brsearch" type='submit' ng-click="buscar()">Buscar</button>
    </div>
  </div>
</form>

</br>

<input type="hidden" name="row" ng-model="row">

<div ng-if="row > 0">
<table class="table table-striped">
  <tr>
    <td>Código</td>
    <td>Livro</td>
    <td>Cliente</td>
    <td colspan="2">Opção</td>
  </tr>

  <tr dir-paginate="lc in locacao2|filter:lc_buscar|orderBy:sortKey:reverse|itemsPerPage:5">
    <td><% lc.id %></td>
    <td><% lc.titulo %></td>
    <td><% lc.nome %></td>
    <td><button class="btn btn-info mb-2" id="ed" data-toggle="modal" ng-click="mais(lc.id)">+ Mais</button>&nbsp;
    <button class="btn btn-secondary mb-2" id="ed" data-toggle="modal" ng-click="prorrogar(lc.id)">Prorrogar</button>&nbsp;
    <button class="btn btn-danger mb-2" id="ed" data-toggle="modal" ng-click="finalizar(lc.id, lc.cod_livro)">Finalizar</button></td>
  </tr>

</table>
<dir-pagination-controls max-size="5" boundary-links="true"></dir-pagination-controls>
</div>
<br/>

<div ng-if="row == 0" id="danger" class="alert alert-danger">Locação Não Encontrada.</div>
<br/>

<!-- Modal de Confirmação de Prorrogação -->

<div class="modal fade" id="Modal_Pro_Confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header" align="center">
        <h5 class="modal-title" id="myModalLabel">&nbsp;&nbsp;Prorrogação Feita com Sucesso!</h5>
      </div>

      <div class="modal-body" align="center">
          <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal" ng-click="resetForm('lcpform')">Fechar</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal para Mais -->

<div class="modal fade" id="modal_mais" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Dados da Locação</h5>
      </div>

      <div class="modal-body">
        @include('locacao_mais')
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Prorrogação -->

<div class="modal fade" id="modal_prorrogar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Prorrogar Locação</h5>
      </div>

      <div class="modal-body">
        @include('prorrogar')
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal" ng-click="resetForm('lcpform')">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Finalização de Locação -->

<div class="modal fade" id="modal_fim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Finalizar Locação</h5>
      </div>

      <div class="modal-body">
        @include('finalizar_locacao')
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
          <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal"  ng-click="resetForm('lvform')">Fechar</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal de Confirmação de Encerramento -->

<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header" align="center">
        <h5 class="modal-title" id="myModalLabel">&nbsp;&nbsp;Locação Fechada com Sucesso!</h5>
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
