<div ng-repeat="cl1 in clientes">  

  <form>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Código:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="cl_id" value="<% cl1.id %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Cliente:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="cl_cliente" value="<% cl1.nome %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Rg:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="cl_rg" value="<% cl1.rg %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Cpf:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="cl_end" value="<% cl1.cpf %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Tel:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="cl_tel" value="<% cl1.tel %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">E-mail:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="cl_email" value="<% cl1.email %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Data de Nascimento:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="cl_nasc" value="<% cl1.nasc | date: 'dd/MM/yyyy' %>">
    </div>
  </div>

   <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Endereço:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="cl_end" value="<% cl1.endereco %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Cep:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="cl_cep" value="<% cl1.cep %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Cidade:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="cl_cidade" value="<% cl1.cidade %>">
    </div>
  </div>

   <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Uf:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="cl_uf" value="<% cl1.uf %>">
    </div>
  </div>

</form>

</div>