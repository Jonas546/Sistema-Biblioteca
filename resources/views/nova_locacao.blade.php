<h6>Cliente</h6>

<form method="post" enctype="multipart/form-data" role="form" id="cl_search">
  @csrf
  <div class="row">
    <div class="col">
      <input type="text" id='cl_buscar' name='cl_buscar' class="form-control" placeholder="Digite Aqui" ng-model="cl_search">
    </div>
    <div class="col">
      <button class="btn btn-primary mb-2" id="brsearch" type='submit' ng-click="buscar_cl()">Buscar</button>
    </div>
  </div>
</form>

<input type="hidden" name="row1" ng-model="row1">

<div ng-if="row1 > 0">
<table class="table">

  <tr>
    <td colspan="2"><h6>Selecione um Cliente</h6></td>
  </tr>  

  <tr dir-paginate="cl in cliente2|filter:cl_buscar|orderBy:sortKey:reverse|itemsPerPage:5">
    <td><input type="radio" name="cod_cli" value="<% cl.id %>" ng-model="locacao.cod"></td>
    <td><% cl.nome %></td>
    <td></td>
  </tr>

</table>
</div>

<div ng-if="row1 == 0" id="danger" class="alert alert-danger">Cliente Não Encontrado.</div>

 <hr>

<h6>Dados da Locação</h6>

<br/>

<form method="post" enctype="multipart/form-data" name="lcform" id="lcform" ng-submit="save_loc(lcform.$valid)" novalidate>
  @csrf

  <input type="hidden" name="id_livro" ng-model="locacao.id_livro">
  <input type="hidden" name="cod_cli" ng-model="locacao.cod" required>
  <input type="hidden" name="qtde" ng-model="livros2.qtde">

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Título:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="titulo" name="titulo" ng-model="livros2.titulo" readonly>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Autor:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="autor" name="autor" ng-model="livros2.autor" readonly>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Editora:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="editora" name="editora" ng-model="livros2.editora" readonly>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Data de Locação:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="data_loc" name="data_loc" ng-model="locacao.data_loc" readonly placeholder="Digite a Data de Locação" autocomplete="off" required>
  <div ng-if="lcform.data_loc.$invalid && lcform.data_loc.$touched" style="color:red">
    <div ng-if="lcform.data_loc.$error.required">Campo Data de Locação Obrigatório.</div>
  </div>
        <script>
        $('#data_loc').datepicker({
          uiLibrary: 'bootstrap4'
        });
      </script>
  </div>
 </div>

  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Data de Devolução:</label>  
  <div class="col-sm-10">
  <input type="text" class="form-control" id="data_dev" name="data_dev" ng-model="locacao.data_dev" readonly placeholder="Digite a Data de Locação" autocomplete="off" required>
  <div ng-if="lcform.data_dev.$invalid && lcform.data_dev.$touched" style="color:red">
    <div ng-if="lcform.data_dev.$error.required">Campo Data de Devolução Obrigatório.</div>
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
  <input type="text" class="form-control" id="valor" name="valor" ng-model="locacao.valor" placeholder="Digite a Endereço Completo" autocomplete="off" required="" maxlength="7">
  <div ng-if="lcform.valor.$invalid && lcform.valor.$touched" style="color:red">
    <div ng-if="lcform.valor.$error.required">Campo Valor Obrigatório.</div>
  </div>
  </div>
 </div>

 <button type="submit" class="btn btn-primary mb-2" id="btnlc" ng-disabled="lcform.$invalid">Registrar</button>

</form>
