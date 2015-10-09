	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Dashboard
				<small>Panel de Control</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<!-- Small boxes (Stat box) -->
			<div class="bs-example">
			    <ul class="nav nav-tabs">
			        <li class="active"><a data-toggle="tab" href="#sectionA">Registro Institución</a></li>
			        <li><a data-toggle="tab" href="#sectionB">Detalle</a></li>
			    </ul>
			    <div class="tab-content">
			        <div id="sectionA" class="tab-pane fade in active">
								<div class="row">
									<!-- Left col -->
									<section class="col-lg-12 connectedSortable">
										<!-- Custom tabs (Charts with tabs)-->
										<div class="nav-tabs-custom">
											<!-- Tabs within a box -->
											<ul class="nav nav-tabs pull-right">

												<li class="pull-left header"><i class="fa fa-inbox"></i> Registro del Plantel Educativo</li>
											</ul>
											<div class="tab-content no-padding"><br />

																	<form action="#" id="form" >
																		<div class="row">
																			<div class="col-md-12">
																				<div class="row">
																					<div class="col-md-4">
																						<div class="form-body">
																							<div class="form-group">
																								<label class="control-label col-md-3">Nit</label>
																								<div class="col-md-9">
																									<input name="nit" placeholder="" class="form-control" type="text">
																								</div>
																							</div>

																						</div>
																					</div>
																					<div class="col-md-4">
																						<div class="form-body">
																							<div class="form-group">
																								<label class="control-label col-md-3">Razón Social:</label>
																								<div class="col-md-9">
																									<input name="nombreInstitucion" placeholder="" class="form-control" type="text">
																								</div>
																							</div>
																							</div>
																					</div>
																					<div class="col-md-4">
																						<div class="form-body">
																							<div class="form-group">
																								<label class="control-label col-md-3">Ciudad / Municipio:</label>
																								<div class="col-md-9">
																									<input name="ciudad" placeholder="" class="form-control" type="text">
																								</div>
																							</div>
																					</div>
																					</div>
																				</div>
																				<div class="row">
																					<div class="col-md-4">
																						<div class="form-body">
																							<div class="form-group">
																								<label class="control-label col-md-3">Dirección:</label>
																								<div class="col-md-9">
																									<input name="direccion" placeholder="" class="form-control" type="text">
																								</div>
																							</div>
																					</div>
																					</div>
																					<div class="col-md-4">
																						<div class="form-body">
																							<div class="form-group">
																								<label class="control-label col-md-3">Teléfono:</label>
																								<div class="col-md-9">
																									<input name="telefono1" placeholder="" class="form-control" type="text">
																								</div>
																							</div>
																					</div>
																					</div>
																					<div class="col-md-4">
																						<div class="form-body">
																							<div class="form-group">
																								<label class="control-label col-md-3">Celular:</label>
																								<div class="col-md-9">
																									<input name="telefono2" placeholder="" class="form-control" type="text">
																								</div>
																							</div>
																					</div>
																					</div>
																				</div>

																				<div class="row">
																					<div class="col-md-3">
																						<div class="form-body">
																							<div class="form-group">
																								<label class="control-label col-md-3">E-mail:</label>
																								<div class="col-md-9">
																									<input name="correo" placeholder="" class="form-control" type="text">
																								</div>
																							</div>
																					</div>
																					</div>
																					<div class="col-md-3">
																						<div class="form-body">
																							<div class="form-group">
																								<label class="control-label col-md-3">Url:</label>
																								<div class="col-md-9">
																									<input name="url" placeholder="" class="form-control" type="text">
																								</div>
																							</div>
																					</div>
																					</div>
																					<div class="col-md-3">
																						<div class="form-body">
																							<div class="form-group">
																								<label class="control-label col-md-3">DANE:</label>
																								<div class="col-md-9">
																									<input name="dane" placeholder="" class="form-control" type="text">
																								</div>
																							</div>
																					</div>
																					</div>
																					<div class="col-md-3">
																						<div class="form-body">
																							<div class="form-group">
																								<label class="control-label col-md-3">ICFES:</label>
																								<div class="col-md-9">
																									<input name="icfes" placeholder="" class="form-control" type="text">
																								</div>
																							</div>
																					</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>


																	</form>
																		<div class="modal-footer">
																			<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Grabar</button>
																			<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
																		</div>
																	</div><!-- /.modal-content -->
																</div><!-- /.modal-dialog -->
			        </div>
			        <div id="sectionB" class="tab-pane fade">
								<div class="container">
									<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>NIT</th>
													<th>Nombre</th>
													<th>Ciudad</th>
													<th>Dirección</th>
													<th>Telefono</th>
													<th>Correo</th>
												<th style="width:125px;">Acciones</th>
												</tr>
											</thead>
											<tbody>
											</tbody>

										</table>
									</div>
			        </div>

			    </div>
			</div>


                    </div><!-- /.modal -->
                  <!-- End Bootstrap modal -->

                      <!-- End Bootstrap modal -->

                  </div><!-- /.modal -->
									<!-- Bootstrap modal -->
									<div class="modal fade" id="modal_form" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h3 class="modal-title"> Modificación Institución Educativa</h3>
											</div>
											<div class="modal-body form">
												<form action="#" id="formMod" class="form-horizontal">
													<input type="hidden" value="" name="id"/>
													<div class="form-body">
														<div class="form-group">
															<label class="control-label col-md-3">Nit:</label>
															<div class="col-md-9">
														<input name="nit"  class="form-control" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-md-3">Nombre:</label>
															<div class="col-md-9">
														<input name="nombreInstitucion"  class="form-control" type="text">
															</div>
														</div>

														<div class="form-group">
															<label class="control-label col-md-3">Teléfono:</label>
															<div class="col-md-9">
														<input name="telefono1"  class="form-control" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-md-3">Teléfono:</label>
															<div class="col-md-9">
														<input name="telefono2"  class="form-control" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-md-3">Dirección:</label>
															<div class="col-md-9">
														<input name="direccion"  class="form-control" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-md-3">Correo:</label>
															<div class="col-md-9">
														<input name="correo"  class="form-control" type="text">
															</div>
														</div>

														<div class="form-group">
															<label class="control-label col-md-3">Web:</label>
															<div class="col-md-9">
														<input name="url"  class="form-control" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-md-3">DANE:</label>
															<div class="col-md-9">
														<input name="dane"  class="form-control" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-md-3">ICFES:</label>
															<div class="col-md-9">
														<input name="icfes"  class="form-control" type="text">
															</div>
														</div>

													</div>
												</form>
													</div>
													<div class="modal-footer">
														<button type="button" id="btnSave" onclick="saveMod()" class="btn btn-primary">Grabar</button>
														<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
													</div>
												</div><!-- /.modal-content -->
											</div><!-- /.modal-dialog -->
										</div><!-- /.modal -->
									<!-- End Bootstrap modal -->



					<!-- quick email widget -->

				</section><!-- /.Left col -->
				<!-- right col (We are only adding the ID to make the widgets sortable)-->
				<section class="col-lg-5 connectedSortable">

					<!-- Map box -->
					<!-- /.box -->

					<!-- solid sales graph -->
						<div class="box-body border-radius-none">
							<div class="chart" id="line-chart" style="height: 250px;"></div>
						</div><!-- /.box-body -->

					</div><!-- /.box -->

					<!-- Calendar -->

				</section><!-- right col -->
			</div><!-- /.row (main row) -->

		</section><!-- /.content -->
	</div><!-- /.content-wrapper -->
	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>Version</b> 1.0

		</div>
		<strong>Copyright &copy; <?= date("Y");?> <a href="http://www.gim.edu.co/">Gimnasio Internacional de Medellín</a>.</strong> Todos los derechos reservados.
	</footer>

	<!-- Control Sidebar -->
	<!-- Add the sidebar's background. This div must be placed
			 immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->



  <script type="text/javascript">

    var save_method; //for save method string
		var table;
    $(document).ready(function() {
      table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Institucion/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],

      });
    });

		function add_institucion()
		{
			save_method = 'add';
			$('#formMod')[0].reset(); // reset form on modals
			$('#modal_form').modal('show'); // show bootstrap modal
			$('.modal-title').text('Registro de periodo'); // Set Title to Bootstrap modal title
		}

		function saveMod()
		{
			var url;
			if(save_method == 'add')
			{
					url = "<?php echo site_url('institucion/ajax_add')?>";
			}
			else
			{
				url = "<?php echo site_url('institucion/ajax_update')?>";
			}

			 // ajax adding data to database
					$.ajax({
						url : url,
						type: "POST",
						data: $('#formMod').serialize(),
						dataType: "JSON",
						success: function(data)
						{
							 //if success close modal and reload ajax table
							 $('#modal_form').modal('hide');
							 reload_table();
						},
						error: function (jqXHR, textStatus, errorThrown)
						{
								alert('!Ops.. Verifique los datos a ingresar..');
						}
				});
		}

		function edit_institucion(id)
    {
      save_method = 'update';
      $('#formMod')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('institucion/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="nit"]').val(data.nit);
            $('[name="nombreInstitucion"]').val(data.nombreInstitucion);
            $('[name="telefono1"]').val(data.telefono1);
						$('[name="telefono2"]').val(data.telefono2);
						$('[name="direccion"]').val(data.direccion);
						$('[name="correo"]').val(data.correo);
						$('[name="url"]').val(data.url);
						$('[name="dane"]').val(data.dane);
					  $('[name="icfes"]').val(data.icfes);


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar Institucion'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error al cargar los datos');
        }
    });
    }




  </script>
