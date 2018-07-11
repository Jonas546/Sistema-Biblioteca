<form method="post" enctype="multipart/form-data" name="cl1form" id="cl1form" ng-submit="update(cl1form.$valid)" novalidate>
  @csrf

  <input type="hidden" ng-model="clientes.id" id="id">

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Nome:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="nome" name="nome" ng-model="clientes.nome" placeholder="Digite o Nome" required>
  <div ng-if="cl1form.nome.$invalid && cl1form.nome.$touched" style="color:red">
    <div ng-if="cl1form.nome.$error.required">Campo Nome Obrigatório.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">RG:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="rg" name="rg" ng-model="clientes.rg" placeholder="Digite o RG" required maxlength="12">
  <div ng-if="cl1form.rg.$invalid && cl1form.rg.$touched" style="color:red">
    <div ng-if="cl1form.rg.$error.required">Campo RG Obrigatório.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">CPF:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="cpf" name="cpf" ng-model="clientes.cpf" placeholder="Digite o CPF" required maxlength="14">
  <div ng-if="cl1form.cpf.$invalid && cl1form.cpf.$touched" style="color:red">
    <div ng-if="cl1form.cpf.$error.required">Campo CPF Obrigatório.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Telefone:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="tel" name="tel" ng-model="clientes.tel" placeholder="Digite o Telefone" required maxlength="11">
  <div ng-if="cl1form.tel.$invalid && cl1form.tel.$touched" style="color:red">
    <div ng-if="cl1form.tel.$error.required">Campo Telefone Obrigatório.</div>
  </div>
  </div>
 </div>

   <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">E-mail:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="email" name="email" ng-model="clientes.email" placeholder="Digite o email" required="">
  <div ng-if="cl1form.email.$invalid && cl1form.email.$touched" style="color:red">
    <div ng-if="cl1form.email.$error.required">Campo E-mail Obrigatório.</div>
    <div ng-if="cl1form.email.$error.email">Formato Inválido de E-mail.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Data de Nascimento:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="nasc1" name="nasc1" ng-model="clientes.nasc" readonly placeholder="Digite a Data de Nascimento" required>
  <div ng-if="cl1form.nasc.$invalid && cl1form.nasc.$touched" style="color:red">
    <div ng-if="cl1form.nasc.$error.required">Campo Data de Nascimento Obrigatório.</div>
  </div>
        <script>
        $('#nasc1').datepicker({
          uiLibrary: 'bootstrap4'
        });
      </script>
  </div>
 </div>

 <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Endereço:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="end" name="end" ng-model="clientes.end" placeholder="Digite a Endereço Completo" required="">
  <div ng-if="cl1form.end.$invalid && cl1form.end.$touched" style="color:red">
    <div ng-if="cl1form.end.$error.required">Campo Endereço Obrigatório.</div>
  </div>
  </div>
 </div>

 <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Cep:</label> <div class="col-sm-10">
  <input type="text" class="form-control" id="cep" name="cep" ng-model="clientes.cep" placeholder="Digite o Cep" required maxlength="9">
  <div ng-if="cl1form.cep.$invalid && cl1form.cep.$touched" style="color:red">
    <div ng-if="cl1form.cep.$error.required">Campo Cep Obrigatório.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Cidade:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="cidade" name="cidade" ng-model="clientes.cidade" placeholder="Digite a Cidade" required="">
  <div ng-if="cl1form.cidade.$invalid && cl1form.cidade.$touched" style="color:red">
    <div ng-if="cl1form.cidade.$error.required">Campo Cidade Obrigatório.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">UF:</label> <div class="col-sm-10">
  <input type="text" class="form-control" id="uf" name="uf" placeholder="Digite o Estado" ng-model="clientes.uf" maxlength="2" required="">
  <div ng-if="cl1form.uf.$invalid && cl1form.uf.$touched" style="color:red">
    <div ng-if="cl1form.uf.$error.required">Campo UF Obrigatório.</div>
  </div>
  </div>
 </div>

 <button type="submit" class="btn btn-primary mb-2" id="btnclup" ng-disabled="cl1form.$invalid">Salvar</button>

</form>
