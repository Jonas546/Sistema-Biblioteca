var app = angular.module('brl',['angularUtils.directives.dirPagination']);

//Configuração para evitar conflitos com o blade do Laravel

angular.module('brl').config(function($interpolateProvider, $httpProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
  $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
  $httpProvider.defaults.useXDomain = true;
  delete $httpProvider.defaults.headers.common['X-Requested-With'];
});

// Factory

app.factory('livroService', function($http){
	return{
		listar: function(){
			return $http.get('/lv_list');
		},
        listar_cl: function(){
            return $http.get('cl_list');
        }
	}
});
 
app.controller('LivroControll', function($scope, $http, livroService){

	//Escopo para Modal de Cadastro

	$scope.create = function(){
		$('#modal_insert').modal('show');
	}

	//Escopo para Registrar dados de Livros

	$scope.save = function(isValid){

        $scope.livro = {
            'titulo': $scope.livro.titulo,
            'genero': $scope.livro.genero,
            'autor': $scope.livro.autor,
            'editora': $scope.livro.editora,
            'localizacao': $scope.livro.localizacao,
            'qtde': $scope.livro.qtde
        };

		$http({
            method: 'POST',
            url:'/lv_store',
            data: $scope.livro,
        }).success(function(rs) {

        	if(rs.message == 'ok'){

        		$('#modal_insert').modal('hide');
            	$('#ModalConfirm').modal('show');

            	$scope.listar();

            } 

        }).error(function(rs) {
            
            $('#modal_insert').modal('hide');
           	$('#ModalErro').modal('show'); 

        });

    }

    //Escopo para Listar dados de Cliente

    $scope.listar = function(){
		livroService.listar().success(function(rs){
			$scope.livro2 = rs;
			$scope.row = rs.length;
		});
	}

    //Escopo para Listar dados de Cliente

    $scope.listar_cl = function(){
        livroService.listar_cl().success(function(rs){
            $scope.cliente2 = rs;
            $scope.row1= rs.length;
        });
    }

	//Carregar Dados ao Abrir a página

	$scope.listar();

	//Escopo para Paginação

	$scope.ordenar = function(keyname){
		$scope.sortKey = keyname;
        $scope.reverse = !$scope.reverse;
	}

    //Escopos para Exibir Detalhes do Livros

    $scope.mais = function(id){

    	$http({
            method: 'GET',
            url:'/lv_show/'+id,
        	}).success(function(rs) {
        		$scope.livros = rs;
        		$('#modal_mais').modal('show');
       	});

    }

    $scope.edit = function(id){

    	$http({
            method: 'GET',
            url:'/lv_show/'+id,
        	}).success(function(rs) {

        		$scope.livros = rs;

        		for(var i=0; i<rs.length; i++){

                    $scope.livros.id = rs[i].id;
                    $scope.livros.titulo = rs[i].titulo;
                    $scope.livros.genero = rs[i].genero;
                    $scope.livros.autor = rs[i].autor;
                    $scope.livros.editora = rs[i].editora;
                    $scope.livros.localizacao = rs[i].localizacao;
                    $scope.livros.qtde = rs[i].qtde;

        		}

        		$('#modal_edit').modal('show');
       	});

    }

    //Escopo para Locacao

        $scope.locacao = function(id, aux){

            $scope.row1 = null;
            $scope.cl_search = '';

            if(aux > 0){

                $http({
                    method: 'GET',
                    url:'/lv_show/'+id,
                }).success(function(rs) {

                    $scope.livros2 = rs;

                    for(var i=0; i<rs.length; i++){

                        $scope.locacao.id_livro = rs[i].id;
                        $scope.livros2.titulo = rs[i].titulo;
                        $scope.livros2.autor = rs[i].autor;
                        $scope.livros2.editora = rs[i].editora;
                        $scope.livros2.qtde = rs[i].qtde;

                    }

                    $('#modal_loc').modal('show');
                });

            } else {

                $('#ModalInd').modal('show');

            }   

    }

    //Escopo para Atualizar Dados de Livros

    $scope.update = function(isValid){

    	var id = $scope.livros.id;

        $scope.livros = {
            'titulo': $scope.livros.titulo,
            'genero': $scope.livros.genero,
            'autor': $scope.livros.autor,
            'editora': $scope.livros.editora,
            'localizacao': $scope.livros.localizacao,
            'qtde': $scope.livros.qtde
        };

    	$http({
            method: 'POST',
            url:'/lv_update/'+id,
            data: $scope.livros,
        }).success(function(rs) {

        	if(rs.message == 'ok'){

        		$('#modal_edit').modal('hide');
            	$('#ModalConfirm').modal('show');

    			$scope.listar_cl();

            } 

        }).error(function(rs) {
            
            $('#modal_edit').modal('hide');
           	$('#ModalErro').modal('show'); 

        });

    }

    //Escopo para Excluir Livro

    $scope.delete = function(id){

        $http({
            method: 'GET',
            url: 'lv_delete/'+id,
        }).success(function(rs){

            if(rs.message == 'ok'){
                $('#ModalDelete').modal('show');
                $scope.listar();
            }

        }).error(function(rs){
            $('#ModalErro').modal('show'); 
        });

    }

    //Escopo para Buscar Cliente

    $scope.buscar_cl = function(){

    	var id = $scope.cl_search;

    	if(id != ''){

    		$http({
            	method: 'GET',
            	url:'/cl_show/'+id,
        	}).success(function(rs) {
        		$scope.cliente2 = rs;
        		$scope.row1 = rs.length;

       	});

   		} else {

 			$scope.row1 = 3;

   		}
    }

    //Escopo para Buscar Livro

    $scope.buscar = function(){

        var id = $scope.search;

        if(id != ''){

            $http({
                method: 'GET',
                url:'/lv_show/'+id,
            }).success(function(rs) {
                $scope.livro2 = rs;
                $scope.row = rs.length;
        });

        } else {

            $scope.listar();

        }
    }	

    //Escopo para Registrar Locação

    $scope.save_loc = function(isValid){

        var cod_cli = $scope.locacao.cod;
        var cod_livro = $scope.locacao.id_livro;
        var qtde = $scope.livros2.qtde;

        $scope.dados = {
            'id_cliente': $scope.locacao.cod,
            'id_livro': $scope.locacao.id_livro,
            'retirada': date_converter($scope.locacao.data_loc),
            'devolucao': date_converter($scope.locacao.data_dev),
            'valor': $scope.locacao.valor,
            'status': 'Aberto'
        };

        $http({
            method: 'POST',
            url:'/lc_store/'+cod_cli+'/'+cod_livro+'/'+qtde,
            data: $scope.dados,
        }).success(function(rs){

            if(rs.message == 'ok'){

                $scope.codigo = rs.codigo;

                $('#modal_loc').modal('hide');
                $('#ModalConfirmLc').modal('show');

                $scope.listar();

            } 

        }).error(function(rs) {
            
            $('#modal_loc').modal('hide');
            $('#ModalErro').modal('show'); 

        });

    }

	//Escopo para Fechar Modal

    $scope.cl_fechar = function(){
    	location.reload();
    }

    //Escopo para Testes

    $scope.teste = function(){
    	$('#ModalConfirm').modal('show');
    }

    //Escopo para limpar formulário

    $scope.resetForm = function(formName) {
    	$scope.livro = {};
        $scope.locacao.data_loc = '';
        $scope.locacao.data_dev = '';
        $scope.locacao.valor = '';
        $scope.locacao.cod = '';
  		var form = $scope[formName];
  		form.$setUntouched();
  		form.$setPristine();
	}

});

//Funções para conversão de Datas

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