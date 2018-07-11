<form method="post" enctype="multipart/form-data" name="lvform" id="lvform" ng-submit="save(lvform.$valid)" novalidate>
  @csrf

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Título:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="titulo" name="titulo" ng-model="livro.titulo" placeholder="Digite o Título do Livro" autocomplete="off" required>
  <div ng-if="lvform.titulo.$invalid && lvform.titulo.$touched" style="color:red">
    <div ng-if="lvform.titulo.$error.required">Campo Título Obrigatório.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Gênero:</label>  
  <div class="col-sm-10">
  <select class="form-control" id="genero" name="genero" ng-model="livro.genero" required>
    <option selected>Aventura</option>
    <option>Ação</option>
    <option>Biografia</option>
    <option>Didático</option>
    <option>Ficção</option>
    <option>Poesia</option>
    <option>Romance</option>
  </select>
   <div ng-if="lvform.genero.$invalid && lvform.genero.$touched" style="color:red">
    <div ng-if="lvform.genero.$error.required">Selecione um Gênero.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Autor:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="autor" name="autor" ng-model="livro.autor" placeholder="Digite o Nome do Autor" required>
  <div ng-if="lvform.autor.$invalid && lvform.autor.$touched" style="color:red">
    <div ng-if="lvform.autor.$error.required">Campo Autor Obrigatório.</div>
  </div>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Editora:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="editora" name="editora" ng-model="livro.editora" placeholder="Digite o Nome da Editora" autocomplete="off" required=>
  <div ng-if="lvform.editora.$invalid && lvform.editora.$touched" style="color:red">
    <div ng-if="lvform.editora.$error.required">Campo Editora Obrigatório.</div>
  </div>
  </div>
 </div>

   <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Local:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="localizacao" name="localizacao" ng-model="livro.localizacao" placeholder="Digite a Localização" autocomplete="off" required="">
  <div ng-if="lvform.localizacao.$invalid && lvform.localizacao.$touched" style="color:red">
    <div ng-if="lvform.localizacao.$error.required">Campo E-mail Obrigatório.</div>
  </div>
  </div>
 </div>

 <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Qtde:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="qtde" name="qtde" ng-model="livro.qtde" placeholder="Digite a Endereço Completo" autocomplete="off" required="" maxlength="4">
  <div ng-if="lvform.qtde.$invalid && lvform.qtde.$touched" style="color:red">
    <div ng-if="lvform.qtde.$error.required">Campo Quantidade Obrigatório.</div>
  </div>
  </div>
 </div>

 <button type="submit" class="btn btn-primary mb-2" id="btnlv" ng-disabled="lvform.$invalid">Registrar</button>

</form>
