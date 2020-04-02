<!-- Content Header (Page header) -->
<body>
<div class="container">
    <h1> <strong>Maaf! , Akun Vendor ini belum aktif. </strong> </h1>
    <h3>Silahkan selesaikan pembayaran atau hubungi administrator</h3>
    <form action="<?php echo base_url(). 'main/dashboard_ven/belum_aktif/'.$this->session->userdata('id_user')->id_user; ?>" method="post" enctype='multipart/form-data'>
      <label>Upload Bukti Pembayaran (Ukuran File Maksimal 2MB)</label>
      <br><br>
      <input type = "file" name="foto_bukti_byr" id="foto_bukti_byr">
      <br>
      <button class="btn btn-sm btn-danger">Upload</button>
    </form>
</div>
</body>
    
    <!-- Main content -->
    
    <!-- /.content -->

  <!-- /.content-wrapper -->
