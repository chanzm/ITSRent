<center> 
 <div class="modal-header">
            <h4 class="modal-title">Konfirmasi Pesanan : </h4>
          </div>
 <?php foreach ($sewa as $rinci): ?> 
    <form action="<?php echo base_url(). 'main/pesan/upload_bukti/'.$rinci->id_sewa; ?>" method="post" enctype='multipart/form-data'>
    <!-- Content Header (Page header) -->
    <div class="form-group">
      <input type="hidden" class="form-control" name="id_sewa" value="<?php echo $rinci->id_sewa?>">
      </div>
    <div class="form-group">
      <label>Id Pesanan :</label>
        <?php echo $rinci->id_sewa?>
    </div>
    <div class="form-group">
      <label>Nama Barang:</label>
        <?php echo $rinci->nama_barang?>
    </div>
    <div class="form-group">
      <label>Jumlah :</label>
        <?php echo $rinci->jumlah_barang?>
    </div>
    <div class="form-group">
      <label>Total Biaya:</label>
        <?php echo $rinci->total_bayar?>
    </div>
      <label>Upload Bukti Pembayaran (ukuran file maksimal 2MB)</label>
      <input type = "file" name="foto_bukti_bayar">
      <button class="btn btn-sm btn-danger">Upload</button>
    </form>
<?php endforeach; ?>
   </center>