
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
<div class="container">
<h1> <strong>Akun sudah aktif. </strong> </h1>
    <h3>Yakin ingin menonaktifkan akun?</h3>
    
    <h4><strong>Jika vendor dalam keadaan tidak aktif, vendor tidak bisa melakukan :
    <br><br>- Upload Produk
    <br>- Menampilkan produk yang dimiliki (produk tidak bisa dipesan penyewa)
    </strong>
    </h4>

    <br>
    <!-- <a data-toggle="modal" onclick="konfirm('<?php echo base_url(). 'main/dashboard_ven/nonaktifkan_akun/'; ?>  ')" ><em class="btn btn-danger">Nonaktifkan</em></a> -->
    <a data-toggle="modal" data-target="#modal-konfirm"><em class="btn btn-danger">Nonaktifkan</em></a>
     <div class="modal modal-danger fade" id="modal-konfirm">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Nonaktifkan Akun</h4>
          <h5>Akun Anda akan dinonaktifkan. Konfirmasi?</h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
          <a id="btn" class="btn btn-outline" href="<?php echo base_url(). 'main/dashboard_ven/nonaktifkan_akun/'; ?>">Ya</a>
        </div>
      </div>
    </div>
  </div>
  </div>
</body> 

