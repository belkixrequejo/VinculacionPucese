function configurarTabla () {
	$("#tblRols").dataTable({
		'proccessing':true,
		'serverSide':true,
		'ajax':'rols/listar',
		'columns':[
			{'data':'id','visible':false},
			{'data':'nombre'},
			{'defaultContent':"<button type='button' id='Editar' class='btn btn-success' style='padding: 4px 10px;margin: 2px;' ><i class='fa fa-pencil-square-o'></i></button><button type='button' id='Eliminar' style='padding: 4px 10px;margin: 2px;' class='btn btn-danger'><i class='fa fa-trash-o'></i></button><button data-toggle='modal' data-target='#modalFoto' id='UploadFoto' class='btn btn-info' style='padding: 4px 10px;'><i class='fa fa-camera'></i></button>",'sWidth':'12%'}
		]
	});
}

function insertar(){
		$.post('rols/insertar', $("#FormRols").serializeObject(),function(rpta) {
			if(rpta.Estado == "Registrado")
			{
				mensajePersonalizado("rols","Roles Creado Correctamente","success",3000);	
			}
			else if(rpta.Estado == "Editado")
			{
				mensajePersonalizado("roles","Roles Editado Correctamente","success",3000);
			}
			else{
				mensajePersonalizado("roles","Ocurrio un error","error",3000);
			}
			$('#FormRols').bootstrapValidator('enableFieldValidators', 'Password', false);
			$("#Accion").val('Registrar');
			limpiarForm('FormRols);
			$("#tblRols").DataTable().draw().clear();
		});
}

function viewData(){
	$("#tblRols").on('click','#Editar',function(){
		var data = $("#tblRols").dataTable().fnGetData($(this).closest('tr'));
		$.post('rols/sesion',{id:data.id},function(rpta){
			if(rpta.Sesion == "Asignado"){
				$('#myTab a[href="#tab_2"]').tab('show');
				$("#Nombre").val(data.nombre);
				$("#Accion").val('Editar');
			}else {
				mensajePersonalizado("rols","Ocurrio un error","error",3000);
			}
		});
	});
}

function eliminar(){
	$("#tblRols").on('click','#Eliminar',function(){
		var data = $("#tblRols").dataTable().fnGetData($(this).closest('tr'));
		(new PNotify({
		    title: 'Confirmación Necesaria',
		    text: '¿Estas seguro que desea dar de baja el rol: '+ data.nombre + '?',
		    icon: 'glyphicon glyphicon-question-sign',
		    hide: false,
		    confirm: {
		        confirm: true
		    },
		    buttons: {
		        closer: false,
		        sticker: false
		    },
		    history: {
		        history: false
		    }
		    })).get().on('pnotify.confirm', function(){
		    $.post('rols/eliminar',{id:data.id},function(rpta){
				if (rpta.Estado == "Eliminado") 
				{
					$("#tblRols").DataTable().draw().clear();
					mensajePersonalizado("rols","Roles Eliminado Correctamente","success",3000);
				}else 
				{
					mensajePersonalizado("rols","Ocurrio un error","error",3000);
				}
			});
    	});
	});
}


