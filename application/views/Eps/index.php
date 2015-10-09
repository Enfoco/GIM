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


			<div class="row">
				<!-- Left col -->
				<section class="col-lg-12 connectedSortable">
					<!-- Custom tabs (Charts with tabs)-->
					<div class="nav-tabs-custom">
						<!-- Tabs within a box -->
						<ul class="nav nav-tabs pull-right">

							<li class="pull-left header"><i class="fa fa-inbox"></i> Registro de Entidad Promotora de Salud (EPS)</li>
						</ul>
						<div class="tab-content no-padding">


                  <br />
                <div class="alert alert-info" role="alert"><button class="btn btn-primary btn-xs" onclick="add_Eps()"><i class="glyphicon glyphicon-plus"></i></button></div>

                  <br />
                  <br />
                  <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Nombre / Detalle</th>
                        <th style="width:125px;">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>

                  </table>
											  <!-- Bootstrap modal -->
											  <div class="modal fade" id="modal_form" role="dialog">
											  <div class="modal-dialog">
											    <div class="modal-content">
											      <div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											        <h3 class="modal-title"> Registro Nueva Eps</h3>
											      </div>
											      <div class="modal-body form">
											        <form action="#" id="form" class="form-horizontal">
											          <input type="hidden" value="" name="id"/>
											          <div class="form-body">
											            <div class="form-group">
											              <label class="control-label col-md-3">Nombre</label>
											              <div class="col-md-9">
											                <input name="name" placeholder="Digite Razón Social de la Eps" class="form-control" type="text">
											              </div>
											            </div>

											          </div>
											        </form>
											          </div>
											          <div class="modal-footer">
											            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Grabar</button>
											            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
											          </div>
											        </div><!-- /.modal-content -->
											      </div><!-- /.modal-dialog -->
											    </div><!-- /.modal -->
											  <!-- End Bootstrap modal -->
<!-- /.modal -->
                      <!-- End Bootstrap modal -->

                  </div><!-- /.modal -->
                <!-- End Bootstrap modal -->

            </div><!-- /.row -->
            <!-- Main row -->

						</div>
					</div><!-- /.nav-tabs-custom -->



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
          "url": "<?php echo site_url('eps/ajax_list')?>",
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

  function add_Eps()
  {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Registro de Eps'); // Set Title to Bootstrap modal title
  }

  function edit_Eps(id)
  {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals

    //Ajax Load data from ajax
    $.ajax({
      url : "<?php echo site_url('eps/ajax_edit/')?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {

          $('[name="id"]').val(data.id);
          $('[name="name"]').val(data.name);


          $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
          $('.modal-title').text('Editar Eps'); // Set title to Bootstrap modal title

      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error al cargar los datos');
      }
  });
  }

  function reload_table()
  {
    table.ajax.reload(null,false); //reload datatable ajax
  }

  function save()
  {
    var url;
    if(save_method == 'add')
    {
        url = "<?php echo site_url('eps/ajax_add')?>";
    }
    else
    {
      url = "<?php echo site_url('eps/ajax_update')?>";
    }

     // ajax adding data to database
        $.ajax({
          url : url,
          type: "POST",
          data: $('#form').serialize(),
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

  function delete_Eps(id)
  {
    if(confirm('Realmente Desea Borrar la información?'))
    {
      // ajax delete data to database
        $.ajax({
          url : "<?php echo site_url('eps/ajax_delete')?>/"+id,
          type: "POST",
          dataType: "JSON",
          success: function(data)
          {
             //if success reload ajax table
             $('#modal_form').modal('hide');
             reload_table();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error adding / update data');
          }
      });

    }
  }

</script>
