<div ng-repeat="lv1 in livros">  

  <form>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Código:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="lv_id" value="<% lv1.id %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Título:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="lv_titulo" value="<% lv1.titulo %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Gênero:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="lv_genero" value="<% lv1.genero %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Autor:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="lv_autor" value="<% lv1.autor %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Editora:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="lv_editora" value="<% lv1.editora %>">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Localização:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="lv_localizacao" value="<% lv1.localizacao %>">
    </div>
  </div>

   <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Quantidade:</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="lv_qtde" value="<% lv1.qtde %>">
    </div>
  </div>

</form>

</div>