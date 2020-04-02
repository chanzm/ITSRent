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
                        <th>Id sewa</th>
                        <th>Id barang</th>
                        <th>Nama Penyewa</th>
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
                    <?php foreach ($admin as $a): ?>
                    <tr>
                        <td><?php echo $a->id_sewa ?></td>
                        <td><?php echo $a->id_barang ?></td>
                        <td><?php echo $a->nama_peny ?></td>
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
                        
                        <td>
                        <a data-toggle="modal" onclick="delete_confirm('<?php echo site_url('main/dashboard_adm/hapus_penyewaan/'.$a->id_sewa) ?>')" ><em class="fa fa-trash btn btn-sm btn-danger"></em></a>
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