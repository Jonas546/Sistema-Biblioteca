<form method="post" enctype="multipart/form-data" name="fcdform" id="fcdform" ng-submit="save_dp(fcdform.$valid)" novalidate>
  @csrf

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Descrição:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="descricao" name="descricao" ng-model="despesa.descricao" placeholder="Descreva aqui a Despesa" autocomplete="off" required>
  <div ng-if="fcdform.descricao.$invalid && fcdform.descricao.$touched" style="color:red">
    <div ng-if="fcdform.descricao.$error.required">Campo Descrição Obrigatório.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Tipo:</label>  
  <div class="col-sm-10">
  <select class="form-control" id="tipo" name="tipo" ng-model="despesa.tipo" required>
    <option selected>Conta</option>
    <option>Equipamento</option>
    <option>Livro</option>
    <option>Material</option>
    <option>Móvel</option>
    <option>Outros</option>
  </select>
   <div ng-if="fcdform.tipo.$invalid && fcdform.tipo.$touched" style="color:red">
    <div ng-if="fcdform.tipo.$error.required">Selecione um Tipo.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Data:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="data1" name="data1" ng-model="despesa.data1" readonly placeholder="Digite a Data" autocomplete="off" required>
  <div ng-if="fcdform.data1.$invalid && fcdform.data1.$touched" style="color:red">
    <div ng-if="fcdform.data1.$error.required">Campo Data Obrigatório.</div>
  </div>
        <script>
        $('#data1').datepicker({
          uiLibrary: 'bootstrap4'
        });
      </script>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Qtde:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id='qtde' name="qtde" ng-model="despesa.qtde" placeholder="Digite o Nome do Autor" required>
  <div ng-if="fcdform.qtde.$invalid && fcdform.qtde.$touched" style="color:red">
    <div ng-if="fcdform.qtde.$error.required">Campo Quantidade Obrigatório.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Valor:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="valor" name="valor" ng-model="despesa.valor" placeholder="Digite o Valor da Despesa" autocomplete="off" required=>
  <div ng-if="fcdform.valor.$invalid && fcdform.valor.$touched" style="color:red">
    <div ng-if="fcdform.valor.$error.required">Campo Valor Obrigatório.</div>
  </div>
  </div>
 </div>

 <button type="submit" class="btn btn-primary mb-2" id="btndp" ng-disabled="fcdform.$invalid">Registrar</button>

</form>
