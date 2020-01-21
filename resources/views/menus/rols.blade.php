@extends('layout')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
  <style>
    .dropzone {
      border: 2px dashed #0087F7;
      border-radius: 5px;
      background: white;
    }
    .dropzone .dz-message {
      font-weight: 400;
      font-size: 25px;
    }

    .dropzone .dz-message {
        text-align: center;
        margin: 2em 0;
    }
  </style>
@stop
@section('title')
	Rols
@stop

@section('description')
	Gestion de Rols
@stop

@section('container')
<div class="row">
	<div class="col-md-12">
		<!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" id="myTab">
              <li class="active"><a href="#tab_1" data-toggle="tab">Listado</a></li>
              <li><a href="#tab_2" data-toggle="tab">Nuevo</a></li>
              <!--<li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>-->

            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Lista de Rols</h3>
                </div>
               <div class="box-body">
                  <table id="tblRols" class="table table-bordered table-hover" width="100%">
                   <thead>
                     <tr> 
                       <th></th>
                       <th>Nombre</th>
                       <th></th>
                     </tr>
                   </thead>
                   <tbody>
                   </tbody>
                  </table>
               </div>
              </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Rols</h3>
                  </div>
                  <form role="form" method="POST" id="FormRols">
                    <input type="hidden" name="Accion" id="Accion" value="Registrar">
                     
                    <div class="box-body">
                      <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese Nombre" required>
                      </div>
                      
                      
                    </div>
                    <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" id="Enviar" class="btn btn-primary pull-right">Enviar</button>
                  </div>
            </form>
                  </div>  
                
              </div>
              <!-- /.tab-pane -->
              <!--<div class="tab-pane" id="tab_3"></div>-->
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
	</div>
</div>


@stop

@section('scripts')
<script src="{{ asset('js/gestion/rols.js') }}"></script>
<script src="{{ asset('js/dropzone.js') }}"></script>
<script>
  $('#FormRols').bootstrapValidator({
                message: 'Este valor no es valido',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    Nombre: {
                        message: 'El Nombre no es valido',
                        validators: {
                            notEmpty: {
                                message: 'No ha ingresado el Nombre'
                            },
                            stringLength: {
                                max: 191,
                                message: 'El Nombre no debe ser mayor de 191 caracteres'
                            }
                        }
                    }
                    
                }
            })
            
            .on('success.form.bv', function(e) {
                // Prevent form submission
                e.preventDefault();
                insertar();
                $("#FormRols").data('bootstrapValidator').resetForm();
    });
    configurarTabla();
    
    viewData();
    insertar();
    eliminar();
</script>
@stop


