<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ITSRent | Administrator</title>
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/logo_pac.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/dist/css/skins/_all-skins.min.css">
  <script src="<?php echo base_url(); ?>asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script>
    function delete_confirm(url){
      $('#modal-delete').modal();
      $('#btn-delete').attr("href", url);
    }
  </script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-red sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url("main/dashboard"); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?php echo base_url(); ?>assets/img/favicon_fix.png"></i></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ITS </b>Multi Rent</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
          <a href="#">
              <i class="fa fa-user-circle" aria-hidden="true"></i>
              <span class="hidden-xs">Hi, <?php echo $this->session->userdata('username'); ?></span>
              <span class="hidden-xs"> [  <?php echo $this->session->userdata('role'); ?> ] </span>
          </a>
          </li>
          <li>
            <a href="<?php echo site_url("login/logout"); ?>"><i class="glyphicon glyphicon-log-out"></i> Log Out</a>
          </li>
        </ul>
      </div>
      
    </nav>
  </header>

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <li>
          <a href="<?php echo site_url("main/dashboard_adm"); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="<?php echo site_url("main/dashboard_adm/data_profil_admin"); ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> <span>Profil</span>
          </a>
        </li>

        <li>
          <a href="<?php echo site_url("main/dashboard_adm/data_vendor"); ?>">
            <i class="fa fa-truck"></i>
            <span>Data Vendor</span>
          </a>
        </li>

        <li>
          <a href="<?php echo site_url("main/dashboard_adm/data_penyewa"); ?>"><i class="fa  fa-users" aria-hidden="true"></i> <span>Data Penyewa</span>
          </a>
        </li>

        <li>
          <a href="<?php echo site_url("main/dashboard_adm/data_penyewaan"); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Transaksi Penyewaan</span>
          </a>
        </li>

        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tabel Rekap</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url("main/peristiwa/rekap_harga"); ?>"><i class="fa fa-circle-o"></i> Rekap Penghargaan</a></li>
            <li><a href="<?php echo site_url("main/peristiwa/rekap_langgar"); ?>"><i class="fa fa-circle-o"></i> Rekap Pelanggaran</a></li>
            <li><a href="<?php echo site_url("main/peristiwa/rekap_taruna"); ?>"><i class="fa fa-circle-o"></i> Rekap Taruna</a></li>
          </ul>
        </li> -->

      <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Finger Print</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) --><!-- DataTables -->
<div class="card mb-3">
    
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover" id="example2" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Foto Mahasiswa</th>
                        <th>Identitas Mahasiswa</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($penyewa as $y): ?>
                    <tr>
                        <td>
                            <?php echo $y->id_user?>
                        </td>
                        <td>
                            <?php echo $y->nama_peny ?>
                        </td>
                        <td>
                            <?php echo $y->telp_peny ?>
                        </td>
                        <td>
                            <?php echo $y->email_peny ?>
                        </td>
                        <td>
                            <?php echo $y->username_peny ?>
                        </td>
                        <td>
                        <img src="<?php echo base_url('assets/img/penyewa/profil/'.$y->foto_peny) ?>" width="64" />
                        </td>
                        <td>
                            <img src="<?php echo base_url('assets/img/penyewa/identitas/'.$y->upload_identitas_peny) ?>" width="64" />
                        </td>

                        <td>
                        <a data-toggle="modal" data-target="#modal-edit<?php echo $y->id_user;?>"> <em class="fa fa-pencil btn btn-sm btn-primary btn-create"></em></a> 
                        <a data-toggle="modal" onclick="delete_confirm('<?php echo site_url('main/dashboard_adm/hapus_penyewa/'.$y->id_user) ?>')" ><em class="fa fa-trash btn btn-sm btn-danger"></em></a>
                        </td>
                       
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
     
    <!-- Main content -->
    
    <!-- /.content -->

  <!-- /.content-wrapper -->



     
    <!-- Main content -->
    
    <!-- /.content -->
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <center><strong>Copyright &copy; 2019 <a href="http://its.ac.id/">ITS</a>.</strong> All rights
    reserved.</center>
  </footer>
   
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php 
  foreach($penyewa as $y):
  ?>

  <div class="modal fade" id="modal-edit<?php echo $y->id_user?>">
    <div class="modal-dialog">
      <form action="<?php echo base_url(). 'main/dashboard_adm/update_data_penyewa/'.$y->id_user.''; ?>"  method="post">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Penyewa</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" class="form-control" name="id_user" value="<?php echo $y->id_user?>">
            </div>

            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama_peny" value="<?php echo $y->nama_peny?>">
            </div>
            <div class="form-group">
              <label>Telepon</label>
              <input type="text" class="form-control" name="telp_peny" value="<?php echo $y->telp_peny?>">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" name="email_peny" value="<?php echo $y->email_peny?>">
            </div>
            <div class="form-group">
            <label>Username</label>
              <input type="text" class="form-control" name="username_peny" value="<?php echo $y->username_peny?>">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" name="simpan" class="btn btn-danger">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php endforeach;?>

  <div class="modal modal-danger fade" id="modal-delete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus Penyewa</h4>
        </div>
        <div class="modal-body">
          <h5 class="modal-title"> Are you sure ? </h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
          <a id="btn-delete" class="btn btn-outline" href="">Hapus</a>
        </div>
      </div>
    </div>
  </div>

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>asset/dist/js/demo.js"></script>
<script>
$.noConflict();
jQuery( document ).ready(function( $ ) {
    $('#example2').DataTable();
  // $(document).ready(function () {
    $('.sidebar-menu').tree();
    // $('#example2').DataTables();
  })
  
</script>
</body>
</html>
