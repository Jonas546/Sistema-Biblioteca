<form method="post" enctype="multipart/form-data" name="clform" id="clform" ng-submit="save(clform.$valid)" novalidate>
  @csrf

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Nome:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="nome" name="nome" ng-model="cliente.nome" placeholder="Digite o Nome" autocomplete="off" ng-class="{'input_red' : clform.nome.$error.required && clform.nome.$touched}" required>
  <div ng-if="clform.nome.$invalid && clform.nome.$touched" style="color:red">
    <div ng-if="clform.nome.$error.required">Campo Nome Obrigatório.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">RG:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="rg1" name="rg" ng-model="cliente.rg" placeholder="Digite o RG" required maxlength="12">
  <div ng-if="clform.rg.$invalid && clform.rg.$touched" style="color:red">
    <div ng-if="clform.rg.$error.required">Campo RG Obrigatório.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">CPF:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="cpf1" name="cpf" ng-model="cliente.cpf" placeholder="Digite o CPF" required maxlength="14">
  <div ng-if="clform.cpf.$invalid && clform.cpf.$touched" style="color:red">
    <div ng-if="clform.cpf.$error.required">Campo CPF Obrigatório.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Telefone:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="tel1" name="tel" ng-model="cliente.tel" placeholder="Digite o Telefone" autocomplete="off" required="" maxlength="11">
  <div ng-if="clform.tel.$invalid && clform.tel.$touched" style="color:red">
    <div ng-if="clform.tel.$error.required">Campo Telefone Obrigatório.</div>
  </div>
  </div>
 </div>

   <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">E-mail:</label>  
  <div class="col-sm-10">
  <input type="email" class="form-control" id="email" name="email" ng-model="cliente.email" placeholder="Digite o email" autocomplete="off" required="">
  <div ng-if="clform.email.$invalid && clform.email.$touched" style="color:red">
    <div ng-if="clform.email.$error.required">Campo E-mail Obrigatório.</div>
    <div ng-if="clform.email.$error.email">Formato Inválido de E-mail.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Data de Nascimento:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="nasc" name="nasc" ng-model="cliente.nasc" readonly placeholder="Digite a Data de Nascimento" autocomplete="off" required>
  <div ng-if="clform.nasc.$invalid && clform.nasc.$touched" style="color:red">
    <div ng-if="clform.nasc.$error.required">Campo Data de Nascimento Obrigatório.</div>
  </div>
        <script>
        $('#nasc').datepicker({
          uiLibrary: 'bootstrap4'
        });
      </script>
  </div>
 </div>

 <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Endereço:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="end" name="end" ng-model="cliente.end" placeholder="Digite a Endereço Completo" autocomplete="off" required="">
  <div ng-if="clform.end.$invalid && clform.end.$touched" style="color:red">
    <div ng-if="clform.end.$error.required">Campo Endereço Obrigatório.</div>
  </div>
  </div>
 </div>

 <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Cep:</label> <div class="col-sm-10">
  <input type="text" class="form-control" id="cep1" name="cep" ng-model="cliente.cep" placeholder="Digite o Cep" autocomplete="off" required="" maxlength="9">
  <div ng-if="clform.cep.$invalid && clform.cep.$touched" style="color:red">
    <div ng-if="clform.cep.$error.required">Campo Cep Obrigatório.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Cidade:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="cidade" name="cidade" ng-model="cliente.cidade" placeholder="Digite a Cidade" autocomplete="off" required="">
  <div ng-if="clform.cidade.$invalid && clform.cidade.$touched" style="color:red">
    <div ng-if="clform.cidade.$error.required">Campo Cidade Obrigatório.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">UF:</label> <div class="col-sm-10">
  <input type="text" class="form-control" id="uf" name="uf" placeholder="Digite o Estado" ng-model="cliente.uf" maxlength="2" autocomplete="off" required="">
  <div ng-if="clform.uf.$invalid && clform.uf.$touched" style="color:red">
    <div ng-if="clform.uf.$error.required">Campo UF Obrigatório.</div>
  </div>
  </div>
 </div>

 <button type="submit" class="btn btn-primary mb-2" id="btncl" ng-disabled="clform.$invalid">Registrar</button>

</form>
