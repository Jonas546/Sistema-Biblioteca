<form method="post" enctype="multipart/form-data" name="lcpform" id="lcpform" ng-submit="prorrogar_save(lcpform.$valid)" novalidate>
  @csrf

 <input type="hidden" name="cod_loc" ng-model='cod_loc'> 

 <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Data de Locação:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="data_loc1" name="data_loc1" ng-model="data_loc1" autocomplete="off" required readonly>  
  </div>
 </div>

 <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Nova Data de Devolução:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="data_dev" name="data_dev" readonly placeholder="Data de Devolução" autocomplete="off" ng-model="prorrogacao.data_dev" required>
  <div ng-if="lcpform.data_dev.$invalid && lcpform.data_dev.$touched" style="color:red">
    <div ng-if="lcpform.data_dev.$error.required">Campo Data de Devolução Obrigatório.</div>
  </div>
        <script>
        $('#data_dev').datepicker({
          uiLibrary: 'bootstrap4'
        });
      </script>
  </div>
 </div>

 <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Valor:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="valor" name="valor" placeholder="Digite o Valor Atualizado" ng-model="prorrogacao.valor" autocomplete="off" required="" maxlength="7">
  <div ng-if="lcpform.valor.$invalid && lcpform.valor.$touched" style="color:red">
    <div ng-if="lcpform.valor.$error.required">Campo Valor Obrigatório.</div>
  </div>
  </div>
 </div>

 <button type="submit" class="btn btn-primary mb-2" id="btnlcp" ng-disabled="lcpform.$invalid">Registrar</button>

</form>
