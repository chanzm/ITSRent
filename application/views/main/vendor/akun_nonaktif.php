<body>
<div class="container">
    <h1> <strong>Akun Vendor dalam keadaan nonaktif (off). </strong> </h1>
    <h3><strong>Silahkan melakukan aktifasi untuk mengembalikan fitur:</h3>
    <br>- Upload Produk
    <br>- Produk yang dimiliki akan ditampilkan (bisa dilihat dan dipinjam penyewa)
    </strong>
    </h3>

    <br>
    <!-- <a data-toggle="modal" onclick="konfirm('<?php echo base_url(). 'main/dashboard_ven/nonaktifkan_akun/'; ?>  ')" ><em class="btn btn-danger">Nonaktifkan</em></a> -->
    <br><a data-toggle="modal" data-target="#modal-konfirm"><em class="btn btn-danger">Aktifkan</em></a>
     <div class="modal modal-danger fade" id="modal-konfirm">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Aktifkan Akun</h4>
          <h5>Akun Anda akan diaktifkan kembali. Konfirmasi?</h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
          <a id="btn" class="btn btn-outline" href="<?php echo base_url(). 'main/dashboard_ven/aktifkan_akun/'; ?>">Ya</a>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
  