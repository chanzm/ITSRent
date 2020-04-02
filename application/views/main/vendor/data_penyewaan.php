<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="container-fluid">


<br>
<!-- DataTables -->
<div class="card mb-3">
    
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover" id="example2" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id sewa</th>
                        <th>Waktu pemesanan</th>
                        <th>Id barang</th>
                        <th>Nama Penyewa</th>
                        <th>Jumlah Barang</th>
                        <th>Status</th>
                        <!-- 14 -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vendor as $a): ?>
                    <tr>
                        <td><?php echo $a->id_sewa ?></td>
                        <td><?php echo $a->waktu_pemesanan ?></td>
                        <td><?php echo $a->id_barang ?></td>
                        <td><?php echo $a->nama_peny ?></td>
                        <td><?php echo $a->jumlah_barang ?></td>
                        <td><?php echo $a->status ?></td>

                        <?php 
                        if($a->status=='DIKONFIRMASI'){
                            echo '<td></td>';
                        }
                        else if($a->status=='BELUM DIKONFIRMASI'){
                            echo '<td>';
                            echo anchor('main/dashboard_ven/konfirmasi/'.$a->id_sewa,'<button class="btn btn-sm btn-danger">Detail</button>');
                            '</td>';
                        }
                        else if($a->status=='SUDAH DIBAYAR'){
                            echo '<td>';
                            echo anchor('main/dashboard_ven/bukti_bayar/'.$a->id_sewa,'<button class="btn btn-sm btn-success">Lihat Bukti</button>');
                            '</td>';
                        }
                        else if($a->status=='DIKEMBALIKAN PENYEWA'){
                            echo '<td>';
                            echo anchor('main/dashboard_ven/kembalikan_barang/'.$a->id_sewa,'<button class="btn btn-sm btn-success">Konfirmasi Pengembalian</button>');
                            '</td>';
                        }
                        // else if($a->ambil=="COD"){
                        //     echo "<td>Pembayaran di Tempat</td>";
                        // }
                        ?>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
