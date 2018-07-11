$(document).ready(function(){

	var par = $('#h_menu').val();

	var cb = "<form class='form-inline my-2 my-lg-0' action='' id='cb_fm'>";
		cb += "<input class='form-control mr-sm-2' type='text' placeholder='Nº da Caçamba' id='val' onkeyup='num(this);'>";
        cb += "<button class='btn btn-success' id='cb12'>Buscar</button>";
        cb += "</form>";

	var fc = "<form class='form-inline' action='' id='fc_fm'>";
		fc += "<input class='form-control mr-sm-2' type='text' placeholder='Nome do Funcionário' id='val'>";
        fc += "<button class='btn btn-success' id='cb12'>Buscar</button>";
        fc += "</form>";

    var lc = "<form class='form-inline' action='' id='lc_fm'>";
        lc += "<input class='form-control mr-sm-2' type='text' placeholder='Nº do Pedido' id='val' onkeyup='num(this);'>";
        lc += "<button class='btn btn-success' id='cb12'>Buscar</button>";
        lc += "</form>";

    var lch = "<form class='form-inline' action='' id='lch_fm'>";
        lch += "<input class='form-control mr-sm-2' type='text' placeholder='Nº do Pedido' id='val' onkeyup='num(this);'>";
        lch += "<button class='btn btn-success' id='cb12'>Buscar</button>";
        lch += "</form>";

    if (par == 'cb'){

    	$('#search').html(cb);

    }

    if (par == 'fc'){

    	$('#search').html(fc);

    }

    if (par == 'lc'){

        $('#search').html(lc);
    }

    if (par == 'lch'){

        $('#search').html(lch);

    }

});

