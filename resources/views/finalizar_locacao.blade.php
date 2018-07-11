<form method="post" enctype="multipart/form-data" name="lcfform" id="lcfform" ng-submit="finalizar_save(lcfform.$valid)" novalidate>
  @csrf

 <input type="hidden" name="cod_loc1" ng-model='cod_loc1'> 
 <input type="hidden" name="cod_livro1" ng-model='cod_livro1'> 
 <input type="hidden" name="qtde1" ng-model='qtde1'>
 <input type="hidden" name="cli1" ng-model="cli1">

 <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Data de Locação:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="data_loc2" name="data_loc2" ng-model="data_loc2" autocomplete="off" required readonly>  
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Data de Devolução:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="data_dev2" name="data_dev2" ng-model="data_dev2" autocomplete="off" required readonly>  
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Atraso:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="atraso" name="atraso" ng-model="finalizar.atraso" autocomplete="off" required readonly>  
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Multa:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="multa" name="multa" ng-model="finalizar.multa" autocomplete="off" required readonly>  
  </div>
 </div>

 <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Valor Final:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="valor" name="valor" ng-model="finalizar.valor" autocomplete="off" required="" maxlength="7" readonly="">
  </div>
 </div>

 <button type="submit" class="btn btn-primary mb-2" id="btnlcf" ng-disabled="lcfform.$invalid">Finalizar</button>

</form>
