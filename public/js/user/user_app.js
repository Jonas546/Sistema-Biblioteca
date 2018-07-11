var app = angular.module('bus',[]);

//Configuração para evitar conflitos com o blade do Laravel

angular.module('bus').config(function($interpolateProvider, $httpProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
  $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
  $httpProvider.defaults.useXDomain = true;
  delete $httpProvider.defaults.headers.common['X-Requested-With'];
});
 
app.controller('UserControll', function($scope, $http){

	//Escopo para Registrar dados de Cliente

	$scope.save = function(isValid){

		$http({
            method: 'POST',
            url:'/us_store',
            data: $.param($scope.user),
        }).success(function(rs) {

        	if(rs.message == 'ok'){

            	$('#ModalConfirm').modal('show');

            } 

        }).error(function(rs) {
            
           	$('#ModalErro').modal('show'); 

        });

    }

    //Escopo para limpar formulário

    $scope.resetForm = function(formName) {
    	$scope.user = {};
  		var form = $scope[formName];
  		form.$setUntouched();
  		form.$setPristine();
	}

});
