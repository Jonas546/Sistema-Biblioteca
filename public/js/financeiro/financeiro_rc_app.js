var app = angular.module('bdp',['angularUtils.directives.dirPagination']);

//Configuração para evitar conflitos com o blade do Laravel

angular.module('bdp').config(function($interpolateProvider, $httpProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
  $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
  $httpProvider.defaults.useXDomain = true;
  delete $httpProvider.defaults.headers.common['X-Requested-With'];
});

// Factory

app.factory('financeiroService', function($http){
	return{
		listar_dp: function(){
			return $http.get('/fcd_list');
		}
	}
});
 
app.controller('FinanceiroControll', function($scope, $http, financeiroService){

    //Escopo para Formar Relatório

    $scope.listar_rc = function(isValid){

        var i = date_converter($scope.receita.inicial);
        var f = date_converter($scope.receita.final);

        $http({
            method: 'GET',
            url:'/fcr_show/'+i+'/'+f,
            data: $scope.dates,
            }).success(function(rs) {

                $scope.row = rs.length;
                $scope.receita1 = rs;

                $scope.data_inicio1 = $scope.receita.inicial;
                $scope.data_fim1 = $scope.receita.final;

        });

    }

    //Escopo para Excluir Despesa

    $scope.excluir = function(id){

        $http({
            method: 'GET',
            url: '/fcd_delete/'+id,
        }).success(function(rs){

            if(rs.message == 'ok'){

                $('#ModalConfirmEx').modal('show');

            }

        }).error(function(){

                $('#ModalErro').modal('show');

        });

    }

    //Escopo para Paginação

    $scope.ordenar = function(keyname){
        $scope.sortKey = keyname;
        $scope.reverse = !$scope.reverse;
    }

    //Escopo para Limpar Campos

        $scope.resetForm = function(formName) {
        $scope.despesa = {};
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