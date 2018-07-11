@extends('layout')

@section('title', 'Bibliotecas - Novo Usuário')

@section('content')

<script type="text/javascript" src="{{ asset('js/user/password_app.js') }}"></script>

<div ng-app="bus" ng-controller="UserControll">

<div class="container">
<br/>
<h2>Novo Usuário</h2>
<br/>

<input type="hidden" name="cod" id="cod" value="{{$id}}">

<form method="post" enctype="multipart/form-data" name="usform" id="usform" ng-submit="save(usform.$valid)" novalidate>
  @csrf

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Senha:</label> <div class="col-sm-10">
  <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a Senha" ng-model="user.senha" maxlength="8" autocomplete="off" required="">
  <div ng-if="usform.senha.$invalid && usform.senha.$touched" style="color:red">
    <div ng-if="usform.senha.$error.required">Campo Senha Obrigatório.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Senha:</label> <div class="col-sm-10">
  <input type="password" class="form-control" id="senha1" name="senha1" placeholder="Digite Novamente a Senha" ng-model="user.senha1" maxlength="8" autocomplete="off" required="">
  <div ng-if="usform.senha1.$invalid && usform.senha1.$touched" style="color:red">
    <div ng-if="usform.senha1.$error.required">Campo Senha Obrigatório.</div>
  </div>
  </div>
 </div>

 <button type="submit" class="btn btn-primary mb-2" id="btncl" ng-disabled="usform.$invalid">Registrar</button>

<!-- Modal de Confirmação de Registro-->

<div class="modal fade" id="ModalConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header" align="center">
        <h5 class="modal-title" id="myModalLabel">&nbsp;&nbsp;Senha Trocada com Sucesso!</h5>
      </div>

      <div class="modal-body" align="center">
          <button type="button" class="btn btn-secondary" id="btn-close" data-dismiss="modal" ng-click="resetForm('usform')">Fechar</button>
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
          <button type="button" class="btn btn-secondary" id="btn-close1" data-dismiss="modal" ng-click="resetForm('usform')">Fechar</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal de Senhas -->

<div class="modal fade" id="ModalSenha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header" align="center">
        <h5 class="modal-title" id="myModalLabel">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Senhas Não Conferem!</h5>
      </div>

      <div class="modal-body" align="center">
          <button type="button" class="btn btn-secondary" id="btn-close1" data-dismiss="modal" ng-click="resetForm('usform')">Fechar</button>
      </div>

    </div>
  </div>
</div>

</div>

</div>

@stop
