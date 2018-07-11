<form method="post" enctype="multipart/form-data" name="lv1form" id="lv1form" ng-submit="update(lv1form.$valid)" novalidate>
  @csrf

  <input type="hidden" ng-model="livros.id" id="id" name="id">

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Título:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="titulo" name="titulo" ng-model="livros.titulo" placeholder="Digite o Título do Livro" autocomplete="off" required>
  <div ng-if="lv1form.titulo.$invalid && lv1form.titulo.$touched" style="color:red">
    <div ng-if="lv1form.titulo.$error.required">Campo Título Obrigatório.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Gênero:</label>  
  <div class="col-sm-10">
  <select class="form-control" id="genero" name="genero" ng-model="livros.genero" required>
    <option selected>Aventura</option>
    <option>Ação</option>
    <option>Biografia</option>
    <option>Didático</option>
    <option>Ficção</option>
    <option>Poesia</option>
    <option>Romance</option>
  </select>
   <div ng-if="lv1form.genero.$invalid && lv1form.genero.$touched" style="color:red">
    <div ng-if="lv1form.genero.$error.required">Selecione um Gênero.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Autor:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="autor" name="autor" ng-model="livros.autor" placeholder="Digite o Nome do Autor" required>
  <div ng-if="lv1form.autor.$invalid && lv1form.autor.$touched" style="color:red">
    <div ng-if="lv1form.autor.$error.required">Campo Autor Obrigatório.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Editora:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="editora" name="editora" ng-model="livros.editora" placeholder="Digite o Nome da Editora" autocomplete="off" required=>
  <div ng-if="lv1form.editora.$invalid && lv1form.editora.$touched" style="color:red">
    <div ng-if="lv1form.editora.$error.required">Campo Editora Obrigatório.</div>
  </div>
  </div>
 </div>

   <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Local:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="localizacao" name="localizacao" ng-model="livros.localizacao" placeholder="Digite a Localização" autocomplete="off" required="">
  <div ng-if="lv1form.localizacao.$invalid && lv1form.localizacao.$touched" style="color:red">
    <div ng-if="lv1form.localizacao.$error.required">Campo E-mail Obrigatório.</div>
  </div>
  </div>
 </div>

 <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Qtde:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="qtde" name="qtde" ng-model="livros.qtde" placeholder="Digite a Endereço Completo" autocomplete="off" required="" maxlength="4">
  <div ng-if="lv1form.qtde.$invalid && lv1form.qtde.$touched" style="color:red">
    <div ng-if="lv1form.qtde.$error.required">Campo Quantidade Obrigatório.</div>
  </div>
  </div>
 </div>

 <button type="submit" class="btn btn-primary mb-2" id="btnlv" ng-disabled="lv1form.$invalid">Registrar</button>

</form>
