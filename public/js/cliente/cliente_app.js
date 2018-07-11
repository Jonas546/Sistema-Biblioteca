var app = angular.module('brc',['angularUtils.directives.dirPagination']);

//Configuração para evitar conflitos com o blade do Laravel

angular.module('brc').config(function($interpolateProvider, $httpProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
  $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
  $httpProvider.defaults.useXDomain = true;
  delete $httpProvider.defaults.headers.common['X-Requested-With'];
});

// Factory

app.factory('clienteService', function($http){
	return{
		listar: function(){
			return $http.get('/cl_list');
		}
	}
});
 
app.controller('ClienteControll', function($scope, $http, clienteService){

	//Escopo para Modal de Cadastro

	$scope.create = function(){
		$('#modal_insert').modal('show');
	}

	//Escopo para Registrar dados de Cliente

	$scope.save = function(isValid){

		$http({
            method: 'POST',
            url:'/cl_store',
            data: $.param($scope.cliente),
        }).success(function(rs) {

        	if(rs.message == 'ok'){

        		$('#modal_insert').modal('hide');
            	$('#ModalConfirm').modal('show');

            	$scope.listar();

            } 

        }).error(function(rs) {
            
            console.log(rs);
            $scope.resetForm();
            $('#modal_insert').modal('hide');
           	$('#ModalErro').modal('show'); 

        });

    }

    //Escopo para Listar dados de Cliente

    $scope.listar = function(){
		clienteService.listar().success(function(rs){
			$scope.cliente2 = rs;
			$scope.row= rs.length;
		});
	}

	//Carregar Dados ao Abrir a página

	$scope.listar();

	//Escopo para Paginação

	$scope.ordenar = function(keyname){
		$scope.sortKey = keyname;
        $scope.reverse = !$scope.reverse;
	}

    //Escopo para Exibir Detalhes do Cliente

    $scope.mais = function(id){

    	$http({
            method: 'GET',
            url:'/cl_show/'+id,
        	}).success(function(rs) {
        		$scope.clientes = rs;
        		$('#modal_mais').modal('show');
       	});

    }

    $scope.edit = function(id){

    	$http({
            method: 'GET',
            url:'/cl_show/'+id,
        	}).success(function(rs) {

        		$scope.clientes = rs;

        		for(var i=0; i<rs.length; i++){
        		
        			$scope.clientes.id = rs[i].id;
        			$scope.clientes.nome = rs[i].nome;
        			$scope.clientes.rg = rs[i].rg;
        			$scope.clientes.cpf = rs[i].cpf;
        			$scope.clientes.tel = rs[i].tel;
        			$scope.clientes.email = rs[i].email;
        			$scope.clientes.nasc = dataPtBr(rs[i].nasc);
        			$scope.clientes.end = rs[i].endereco;
        			$scope.clientes.cep = rs[i].cep;
        			$scope.clientes.cidade = rs[i].cidade;
        			$scope.clientes.uf = rs[i].uf;

        		}

        		$('#modal_edit').modal('show');
       	});

    }

    //Escopo para Atualizar Dados do Cliente

    $scope.update = function(isValid){

    	var id = $scope.clientes.id;

    	$scope.clientes = {
    		'id': $scope.clientes.id,
    		'nome': $scope.clientes.nome,
    		'rg': $scope.clientes.rg,
    		'cpf': $scope.clientes.cpf,
    		'tel': $scope.clientes.tel,
    		'email': $scope.clientes.email,
    		'nasc': date_converter($scope.clientes.nasc),
    		'endereco': $scope.clientes.end,
    		'cep': $scope.clientes.cep,
    		'cidade': $scope.clientes.cidade,
    		'uf': $scope.clientes.uf
    	};

    	$http({
            method: 'POST',
            url:'/cl_update/'+id,
            data: $scope.clientes,
        }).success(function(rs) {

        	if(rs.message == 'ok'){

        		$('#modal_edit').modal('hide');
            	$('#ModalConfirm').modal('show');

    			$scope.listar();

            } 

        }).error(function(rs) {
            
            $('#modal_edit').modal('hide');
           	$('#ModalErro').modal('show'); 

        });

    }

    //Escopo para Buscar Cliente

    $scope.buscar = function(){

    	var id = $scope.search;

    	if(id != ''){

    		$http({
            	method: 'GET',
            	url:'/cl_show/'+id,
        	}).success(function(rs) {
        		$scope.cliente2 = rs;
        		$scope.row = rs.length;
       	});

   		} else {

 			$scope.listar();

   		}
    }	

    //Escopo para listar Histórico do Cliente

    $scope.historico = function(id){

        $http({
            method: 'GET',
            url:'/hc_list/'+id,
        }).success(function(rs){
            $scope.historicos = rs;
            $scope.row2 = rs.length;
            $('#modal_historico').modal('show');
        });

    }

    //Escopo para Testes

    $scope.teste = function(){
    	$('#ModalConfirm').modal('show');
    }

    //Escopo para limpar formulário

    $scope.resetForm = function(formName) {
    	$scope.cliente = {};
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