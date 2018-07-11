<input type="hidden" name="row2" ng-model='row2'>

<div ng-if="row2 > 0">
<table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Livro</th>
        <th>Autor</th>
        <th>Editora</th>
        <th>Valor</th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="hc in historicos">
        <td><% hc.codigo %></td>
        <td><% hc.titulo %></td>
        <td><% hc.autor %></td>
        <td><% hc.editora %></td>
        <td><% hc.valor | currency: 'R$' %></td>
      </tr>
    </tbody>
</table>
</div>

<div ng-if="row2 == 0 || row2 == ''">
  <h4>Nenhum Registro de Locação.</h4>
</div>