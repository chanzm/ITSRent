<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script>
    function delete_confirm(url){
      $('#modal-delete').modal();
      $('#btn-delete').attr("href", url);
    }
  </script>

<div class="container-fluid">


<br>
<!-- DataTables -->
<div class="card mb-3">
    
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover" id="example2" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Waktu Pemesanan</th>
                        <th>Nama Barang</th>
                        <th>Nama Vendor</th>
                        <th>Jumlah Barang</th>
                        <th>Total Bayar</th>
                        <th>Waktu Pinjam</th>
                        <th>Waktu Kembali</th>
                        <th>Lama Sewa</th>
                        <th>Pengambilan Barang</th>
                        <th>Alamat Kirim</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <!-- 14 -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($history as $a): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $a->waktu_pemesanan ?></td>
                        <td><?php echo $a->nama_barang ?></td>
                        <td><?php echo $a->nama_ven ?></td>
                        <td><?php echo $a->jumlah_barang ?></td>
                        <td><?php echo $a->total_bayar ?></td>
                        <td><?php echo $a->tgl_pinjam ?></td>
                        <td><?php echo $a->tgl_kembali ?></td>
                        <td><?php echo $a->lama_sewa ?></td>
                        <td><?php echo $a->ambil_barang ?></td>
                        <td><?php echo $a->alamat ?></td>
                        <td><?php echo $a->ket ?></td>
                        <td><?php echo $a->status ?></td>
                        
                        <?php 
                        
                        if($a->status=="BELUM DIKONFIRMASI"){
                           echo '<td></td>';
                        }
                        else if($a->status=="DIKONFIRMASI"){
                            echo '<td>';
                            echo anchor('main/pesan/detail_pesanan_penyewa/'.$a->id_sewa,'<button class="btn btn-sm btn-primary">Lakukan Pembayaran</button>');
                            '</td>';
                        }
                        else if($a->status=="SUDAH DIBAYAR"){
                            echo '<td>';
                            echo anchor('main/pesan/detail_pesanan_penyewa/'.$a->id_sewa,'<button class="btn btn-sm btn-success">Detail</button>');
                            '</td>';
                        }
                        else if($a->status=="BARANG DIKIRIM"){
                            echo '<td>';
                            echo anchor('main/pesan/terima_barang/'.$a->id_sewa,'<button class="btn btn-sm btn-success">Konfirmasi Penerimaan Barang</button>');
                            '</td>';
                        }
                         else if($a->status=="BARANG DITERIMA"){
                            echo '<td>';
                            echo anchor('main/pesan/kembalikan_barang/'.$a->id_sewa,'<button class="btn btn-sm btn-success">Kembalikan Barang</button>');
                            '</td>';
                            
                        }
                        ?>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

</div>