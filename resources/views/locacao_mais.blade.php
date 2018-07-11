<div ng-repeat="lc1 in locacao1">  

  <form>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Código:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="lc1_id" value="<% lc1.id %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Cliente:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="lc1_cliente" value="<% lc1.nome %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Livro:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="lc1_titulo" value="<% lc1.titulo %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Autor:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="lc1_autor" value="<% lc1.autor %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Localização:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="lc1_localizacao" value="<% lc1.localizacao %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Data de Retirada:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="lc1_retirada" value="<% lc1.retirada | date: 'dd/MM/yyyy' %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Data de Devolução:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="lc1_devolucao" value="<% lc1.devolucao | date: 'dd/MM/yyyy' %>">
    </div>
  </div>

   <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Valor:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="lc1_valor" value="<% lc1.valor | currency: 'R$' %>">
    </div>
  </div>

</form>

</div>