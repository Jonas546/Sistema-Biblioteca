@extends('layout')

@section('title', 'Bibliotecas - Gerenciar Livros')

@section('content')

<script type="text/javascript" src="{{ asset('js/jquery.mask.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/fc_mask.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/livro/livro_app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dirPagination.js') }}"></script>

<div ng-app="brl" ng-controller="LivroControll">

<style type="text/css">input.ng-invalid.ng-touched{border-color: red;}</style>
<style type="text/css">select.ng-invalid.ng-touched{border-color: red;}</style>

<div class="container">
<br/>
<h2>Gerenciar Livros</h2>
<br/>

<form method="post" enctype="multipart/form-data" role="form" id="lv_search">
  @csrf
  <div class="row">
    <div class="col">
      <input type="text" id='lv_buscar' name='lv_buscar' class="form-control" placeholder="Digite Aqui" ng-model="search">
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
    <td>Título</td>
    <td>Autor</td>
    <td>Editora</td>
    <td>Disponíveis</td>
    <td colspan="2">Opção</td>
  </tr>

  <tr dir-paginate="lv in livro2|filter:lv_buscar|orderBy:sortKey:reverse|itemsPerPage:5">
    <td><% lv.titulo %></td>
    <td><% lv.autor %></td>
    <td><% lv.editora %></td>
    <td><% lv.qtde %></td>
    <td><button class="btn btn-info mb-2" id="ed" data-toggle="modal" ng-click="mais(lv.titulo)">+ Mais</button>&nbsp;
    <button class="btn btn-secondary mb-2" id="ed" data-toggle="modal" ng-click="locacao(lv.titulo)">Locação</button>&nbsp;
    <button class="btn btn-primary mb-2" id="ed" data-toggle="modal" ng-click="edit(lv.titulo)">Editar</button>&nbsp;
    <button class="btn btn-danger mb-2" id="ed" data-toggle="modal" ng-click="delete(lv.id)">Excluir</button></td>
  </tr>

</table>
<dir-pagination-controls max-size="5" boundary-links="true"></dir-pagination-controls>
</div>
<br/>

<div ng-if="row == 0" id="danger" class="alert alert-danger">Livro Não Encontrado.</div>
<br/>

<!-- Modal de Confirmação de Cadastro e Edição de Livros -->

<div class="modal fade" id="ModalConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header" align="center">
        <h5 class="modal-title" id="myModalLabel">&nbsp;&nbsp;Livro Salvo com Sucesso!</h5>
      </div>

      <div class="modal-body" align="center">
          <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal" ng-click="resetForm('lvform')">Fechar</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal de Confirmação de Locação-->

<div class="modal fade" id="ModalConfirmLc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header" align="center">
        <h5 class="modal-title" id="myModalLabel">&nbsp;&nbsp;Locação Feita com Sucesso!</h5>
      </div>

      <div class="modal-body" align="center">
          <input type="hidden" name="codigos" ng-model="codigo">
          <h6>Código: <% codigo %></h6>
          <br/>
          <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal" ng-click="resetForm('lcform')">Fechar</button>
      </div>

    </div>
  </div>
</div>


<!-- Modal para Mais -->

<div class="modal fade" id="modal_mais" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Dados do Livro</h5>
      </div>

      <div class="modal-body">
        @include('livro_mais')
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Editar Dados de Livro -->

<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Editar Dados do Livro</h5>
      </div>

      <div class="modal-body">
        @include('livro_update')
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Locação de Livro -->

<div class="modal fade" id="modal_loc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Locação</h5>
      </div>

      <div class="modal-body">
        @include('nova_locacao')
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal" ng-click="resetForm('lcform')">Fechar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal para Cadastrar Livros -->

<div class="modal fade" id="modal_insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Cadastrar Livros</h5>
      </div>

      <div class="modal-body">
        @include('registrar_livro')
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btn-save" data-dismiss="modal" ng-click="resetForm('lvform')">Fechar</button>
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

<!-- Modal de Exclusão -->

<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header" align="center">
        <h5 class="modal-title" id="myModalLabel">&nbsp;&nbsp;Livro Excluído com Sucesso!</h5>
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
