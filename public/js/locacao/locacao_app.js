var app = angular.module('blc',['angularUtils.directives.dirPagination']);

//Configuração para evitar conflitos com o blade do Laravel

angular.module('blc').config(function($interpolateProvider, $httpProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
  $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
  $httpProvider.defaults.useXDomain = true;
  delete $httpProvider.defaults.headers.common['X-Requested-With'];
});

// Factory

app.factory('locacaoService', function($http){
	return{
		listar: function(){
			return $http.get('/lc_list');
		}
	}
});
 
app.controller('LocacaoControll', function($scope, $http, locacaoService){

    //Escopo para Listar dados de Cliente

    $scope.listar = function(){
		locacaoService.listar().success(function(rs){
			$scope.locacao2 = rs;
			$scope.row= rs.length;
		});
	}

	//Carregar Dados ao Abrir a página

	$scope.listar();

  //Escopo para Buscar Locação

  $scope.buscar = function(){

    var id = $scope.search;

    if(id != ''){

      $http({
        method: 'GET',
        url:'/lc_show/'+id,
      }).success(function(rs) {
        $scope.locacao2 = rs;
        $scope.row = rs.length;
      });

    } else {

      $scope.listar();

    }

  }

	//Escopo para Paginação

	$scope.ordenar = function(keyname){
		$scope.sortKey = keyname;
    $scope.reverse = !$scope.reverse;
	}

    //Escopo para Exibir Detalhes da Locação

    $scope.mais = function(id){

    	$http({
            method: 'GET',
            url:'/lc_show/'+id,
        	}).success(function(rs) {
        		$scope.locacao1 = rs;
        		$('#modal_mais').modal('show');
       	});

    }

    //Escopo para Modal de Prorrogação

    $scope.prorrogar = function(id){

      $http({
        method: 'GET',
        url:'/lc_show/'+id,
      }).success(function(rs) {

      $scope.cod_loc = id;
      $('#modal_prorrogar').modal('show');
        
      for(var i=0; i<rs.length; i++){

        $scope.data_loc1 = dataPtBr(rs[i].retirada);

      }

      });

    }

    //Escopo para Prorrogar Locação

    $scope.prorrogar_save = function(isValid){

      var id = $scope.cod_loc;

      $scope.prorrogacao = {
        'devolucao': date_converter($scope.prorrogacao.data_dev),
        'valor': $scope.prorrogacao.valor
      };

      $http({
        method: 'POST',
        url:'lc_update/'+id,
        data: $scope.prorrogacao,
      }).success(function(rs) {

        if(rs.message == 'ok'){

          $('#modal_prorrogar').modal('hide');
          $('#Modal_Pro_Confirm').modal('show');

        }

      }).error(function(){

          $('#modal_prorrogar').modal('hide');
          $('#ModalErro').modal('show');

      });

    }

    //Escopo Modal para Finalização

    $scope.finalizar = function(id, $cod){

      $http({
        method: 'GET',
        url:'/lc_show/'+id,

      }).success(function(rs){

        $scope.cod_loc1 = id;
        $scope.cod_livro1 = $cod;
        $('#modal_fim').modal('show');
        
      for(var i=0; i<rs.length; i++){  

        $scope.data_loc2 = dataPtBr(rs[i].retirada);
        $scope.data_dev2 = dataPtBr(rs[i].devolucao);
        $scope.qtde1 = rs[i].qtde;
        $scope.cli1 = rs[i].cd_cliente;

        var date1 = $scope.data_dev2;
        var date2 = dataAtualFormatada();

        var atraso = calcDays(date1, date2);

        $scope.finalizar.atraso = atraso;
        $scope.finalizar.multa = atraso * 0.50;
        $scope.finalizar.valor = (rs[i].valor + (atraso*0.50)); 

      }

      });   

    }

    //Escopo para Encerrar Locação

    $scope.finalizar_save = function(isValid){

      var id = $scope.cod_loc1;
      var livro = $scope.cod_livro1;
      var qtde = $scope.qtde1;
      var cli = $scope.cli1;

      $scope.finalizar = {
        'valor': $scope.finalizar.valor,
        'atraso': $scope.finalizar.atraso,
        'multa': $scope.finalizar.multa,
        'status': 'Fechado'
      };

      $http({
        method: 'POST',
        url:'/lc_fim/'+id+'/'+livro+'/'+qtde+'/'+cli,
        data: $scope.finalizar,
      }).success(function(rs){

        if(rs.message == 'ok'){

          $('#modal_fim').modal('hide');
          $('#ModalDelete').modal('show');

          $scope.listar();

        }

      }).error(function(){

          $('#modal_fim').modal('hide');
          $('#ModalErro').modal('show');

      });

    }

    //Escopo para limpar formulário

    $scope.resetForm = function(formName) {
    	
      $scope.prorrogacao = {};
  		var form = $scope[formName];
      form.$setUntouched();
      form.$setPristine();
	}

});

//funções para conversão de datas

function dataPtBr(data){

var aux = data.split('-');

data = aux[2]+'/'+aux[1]+'/'+aux[0];

return data;

}

function date_converter(data) {
    
var aux = data.split('/');
        
data = aux[2]+'-'+aux[0]+'-'+aux[1];

return data;

}

function dataAtualFormatada(){
    var data = new Date();
    var dia = data.getDate();
    if (dia.toString().length == 1)
      dia = "0"+dia;
    var mes = data.getMonth()+1;
    if (mes.toString().length == 1)
      mes = "0"+mes;
    var ano = data.getFullYear();  
    return dia+"/"+mes+"/"+ano;
}

function calcDays(date1, date2){
  date1 = date1.split("/");
  date2 = date2.split("/");
  var sDate = new Date(date2[2]+"/"+date2[1]+"/"+date2[0]);
  var eDate = new Date(date1[2]+"/"+date1[1]+"/"+date1[0]);

  if (eDate > sDate){

    return 0;

  } else {

    var daysApart = Math.abs(Math.round((sDate-eDate)/86400000));
    return daysApart;

  }
}
