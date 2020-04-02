<center> 
 <div class="modal-header">
            <h4 class="modal-title">Konfirmasi Pesanan : </h4>
          </div>
 <?php foreach ($rincian_pesan as $rinci): ?> 
    <!-- Content Header (Page header) -->
    <div class="form-group">
      <label>Nama Barang:</label>
        <?php echo $rinci->nama_barang?>
    </div>
    <div class="form-group">
      <label>Jumlah :</label>
        <?php echo $rinci->jumlah_barang?>
    </div>
    <div class="form-group">
      <label>Tanggal Pinjam:</label>
        <?php echo $rinci->tgl_pinjam?>
    </div>
    <div class="form-group">
      <label>Tanggal Kembali:</label>
        <?php echo $rinci->tgl_kembali?>
    </div>
    <div class="form-group">
      <label>Jenis Pengambilan Barang:</label>
        <?php echo $rinci->ambil_barang?>
    </div>
    <div class="form-group">
      <label>Alamat:</label>
        <?php echo $rinci->alamat?>
    </div>
    <div class="form-group">
      <label>Total Biaya:</label>
        <?php echo $rinci->total_bayar?>
    </div>
    <div class="form-group">
    <?php 
    if($rinci->status=="DIKONFIRMASI" && $rinci->ambil_barang!="cod"){
      echo "<label>Silahkan melakukan pembayaran ke nomor rekening :</label>
      <h3>0516 6785 7748 BNI a/n ITS MULTI RENT</h3>
      <label>Jika sudah, silahkan lakukan konfirmasi pembayaran</label>";
    echo "<form action=";
    echo base_url(). 'main/pesan/konfirmasi_bayar/'.$rinci->id_sewa;
    echo">";
    echo "<button> Konfirmasi Pembayaran</button></form>";
      }
    else if($rinci->status=="SUDAH DIBAYAR"){
      echo "<label>Pesanan Sudah Dibayar.</label>";
    }  
    else if($rinci->ambil_barang=="cod"){
      echo "<label>Silahkan melakukan pembayaran di tempat saat melakukan COD</label>";
    }
      ?>
      
    </div>
<?php endforeach; ?>
   </center>