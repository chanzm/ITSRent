<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <script>
    function tolak(url){
      $('#modal-tolak').modal();
      $('#btn-delete').attr("href", url);
    }
    function terima(url){
      $('#modal-terima').modal();
      $('#btn-lala').attr("href", url);
    }
  </script>

<?php 
  foreach($sewa as $s):
  ?>

      <form method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi Penyewaan</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" class="form-control" name="id_sewa" value="<?php echo $s->id_sewa?>">
            </div>
            <div class="form-group">                
              <label>Nama Penyewa</label>
              <input type="text" disabled class="form-control" name="nama_peny" value="<?php echo $s->nama_peny?>">
            </div>
            <div class="form-group">                
              <label>Nama Barang</label>
              <input type="text" disabled name="nama_barang" class="form-control" value="<?php echo $s->nama_barang?>">
            </div>
            <div class="form-group">                
              <label>Jumlah</label>
              <input type="numeric" disabled name="jumlah_barang" class="form-control" value="<?php echo $s->jumlah_barang?>">
            </div>
            <div class="form-group">                
              <label>Tanggal Peminjaman</label>
              <input type="date" disabled name="tgl_pinjam" class="form-control" value="<?php echo $s->tgl_pinjam?>">
            </div>
            <div class="form-group">                
              <label>Tanggal Pengembalian</label>
              <input type="date" disabled name="tgl_kembali" class="form-control" value="<?php echo $s->tgl_kembali?>">
            </div>
            <div class="form-group">                
              <label>Pengambilan Barang</label>
              <input type="text" disabled name="ambil_barang" class="form-control" value="<?php echo $s->ambil_barang?>">
            </div>
            <div class="form-group">                
              <label>Alamat COD/Pengiriman Barang</label>
              <input type="text" disabled name="alamat" class="form-control" value="<?php echo $s->alamat?>">
            </div>
            <div class="form-group">                
              <label>Keterangan Tambahan</label>
              <input type="text" disabled name="ket" class="form-control" value="<?php echo $s->ket?>">
            </div>
            <div class="form-group">                
              <label>Total Bayar</label>
              <input type="text" disabled name="ket" class="form-control" value="<?php echo $s->total_bayar?>">
            </div>
          </div>
          <div class="modal-footer">
              <!-- <button type="submit" name="terima" class="btn btn-success">Terima Pesanan</button> -->
              <!-- <button type="submit" name="tolak" class="btn btn-danger">Tolak Pesanan</button> -->
              <!-- <a data-toggle="modal" data-target="#modal-tolak<?php echo $s->id_sewa;?>"> <em class="btn btn-danger btn-create">Tolak</em></a> 
              <a data-toggle="modal" data-target="#modal-terima<?php echo $s->id_sewa;?>"> <em class="btn btn-danger btn-create">Terima</em></a>  -->
              <a data-toggle="modal" onclick="tolak('<?php echo base_url(). 'main/dashboard_ven/tolak_pesanan/'.$s->id_sewa.''; ?>  ')" ><em class="btn btn-danger">Tolak</em></a>
              <a data-toggle="modal" onclick="terima('<?php echo base_url(). 'main/dashboard_ven/terima_pesanan/'.$s->id_sewa.'/'.$s->id_barang.'/'.$s->nama_peny.'/'.$s->tgl_pinjam.'/'.$s->tgl_kembali.''; ?>  ')" ><em class="btn btn-danger">Terima</em></a>
          </div>
        </div>
      </form>
    
  <?php endforeach;?>

  <div class="modal modal-danger fade" id="modal-tolak">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tolak Penyewaan</h4>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
          <a id="btn-delete" class="btn btn-outline" href="">Tolak</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal modal-danger fade" id="modal-terima">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Terima Penyewaan</h4>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
          <a id="btn-lala" class="btn btn-outline" href="">Terima</a>
        </div>
      </div>
    </div>
  </div>
