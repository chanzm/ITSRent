 
<?php 
  foreach($produk as $brg):
  ?>

      <form action="<?php echo base_url(). 'main/pesan/buat_pesanan/'; ?>"  method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Sewa Barang</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" class="form-control" name="id_barang" value="<?php echo $brg->id_barang?>">
            </div>
            <div class="form-group">                
              <label>Nama Barang</label>
              <input type="text" disabled class="form-control" name="nama_barang_input" value="<?php echo $brg->nama_barang?>">
            </div>
            <div class="form-group">                
              <input type="hidden" class="form-control" name="nama_barang" value="<?php echo $brg->nama_barang?>">
            </div>
            <div class="form-group">                
              <label>Deskripsi Barang</label>
              <input type="text" disabled name="deskripsi_barang" class="form-control" value="<?php echo $brg->deskripsi_barang?>">
            </div>

            <div class="form-group">                
              <input type="hidden" name="harga_barang" class="form-control" value="<?php echo $brg->harga_barang?>">
            </div>
            <!-- <div class="form-group">                
              <label>Nama Vendor</label>
              <input type="text" disabled name="harga_barang" class="form-control" value="<?php echo $brg->id_vendor?>">
            </div> -->
            <div class="form-group">                
              <label>Jumlah</label>
              <input type="numeric" name="jumlah_barang" class="form-control">
            </div>
            <div class="form-group">                
              <label>Tanggal Peminjaman</label>
              <input type="date" name="tgl_pinjam" class="form-control">
            </div>
            <div class="form-group">                
              <label>Tanggal Pengembalian</label>
              <input type="date" name="tgl_kembali" class="form-control">
            </div>
            <div class="form-group">                
              <label>Pengambilan Barang</label>
              <select class='form-control input-md' name='ambil_barang' >
                    <option value="" disabled selected>Pilih Opsi</option>
                    <option value="cod">COD</option>
                    <option value="kirim">Dikirim ke Alamat</option>
                    <!-- <option value="ambil">Diambil di tempat penyedia</option> -->
                </select>
            </div>
            <div class="form-group">                
              <label>Alamat COD/Pengiriman Barang</label>
              <input type="text" name="alamat" class="form-control" placeholder="tuliskan alamat">
            </div>
            <div class="form-group">                
              <label>Keterangan Tambahan</label>
              <input type="text" name="ket" class="form-control" placeholder="Jika ada spesifikasi tambahan kriteria barang silahkan cantumkan disini">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="pesan" class="btn btn-danger">Buat Pesanan</button>
          </div>
        </div>
      </form>
    
  <?php endforeach;?>

