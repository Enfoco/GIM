<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url("assets/images/user2-160x160.jpg")?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?= $this->session->userdata('perfil');?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">Menú de Navegación</li>
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?= base_url("Admin");?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>

        </ul>
      </li>

    <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Estudiantes</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url("alumno/index");?>"><i class="fa fa-circle-o"></i>Registro</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Admin. Estudiantes</a></li>
          <li><a href="#l"><i class="fa fa-circle-o"></i> Certificados</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>Acudientes</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Administración</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-table"></i> <span>Docentes</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url("docente/index");?>"><i class="fa fa-circle-o"></i> Registro</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Administración</a></li>
        </ul>
      </li>

        <a href="pages/calendar.html">
          <li><a href="documentation/index.html"><i class="fa fa-calendar"></i> <span>Calendario</span><small class="label pull-right bg-red">3</small></a></li>

        </a>
      </li>
      <li>
        <a href="pages/mailbox/mailbox.html">
          <i class="fa fa-envelope"></i> <span>Mailbox</span>
          <small class="label pull-right bg-yellow">12</small>
        </a>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>Configuración</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
          <a href="#"><i class="fa fa-circle-o"></i> Plantel Educativo <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li>
              <a href="<?= base_url("institucion/index");?>"><i class="fa fa-circle-o"></i> Registro Institución</a>
            </li>
            <li>
              <a href="<?= base_url("folio");?>"><i class="fa fa-circle-o"></i> Folios <i class="fa fa-angle-left pull-right"></i></a>
            </li>
            <li>
              <a href="<?= base_url("libro");?>"><i class="fa fa-circle-o"></i> Libro <i class="fa fa-angle-left pull-right"></i></a>
            </li>
          </ul>
          </li>

          <li>
            <a href="#"><i class="fa fa-circle-o"></i> Entidades <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<?= base_url("eps");?>"><i class="fa fa-circle-o"></i> Eps</a></li>
              <li>
                <a href="<?= base_url("ips");?>"><i class="fa fa-circle-o"></i> Ips <i class="fa fa-angle-left pull-right"></i></a>
              </li>
            </ul>
          </li>
          <li><a href="<?= base_url("ciudad");?>"><i class="fa fa-circle-o"></i> Ciudad/Municipio</a></li>

          <li>
            <a href="<?= base_url("Periodo");?>"><i class="fa fa-circle-o"></i> Periodo Estudiantíl</a>
          </li>
        </ul>
      </li>
      <li><a href="<?= base_url("periodo");?>"><i class="fa fa-book"></i> <span>Ayudas?</span></a></li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
