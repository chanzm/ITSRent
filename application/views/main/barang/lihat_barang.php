
<div class="container-fluid">


<br>
<!-- DataTables -->
<div class="card mb-3">
    
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover" id="example2" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <!-- <th>Id barang</th>
                        <th>Id_vendor</th> -->
                        <th>Foto Barang</th>
                        <th>Nama Barang</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produk as $brg): ?>
                    <tr>
                    <!-- <td>
                            <?php echo $brg->id_barang ?>
                        </td>
                        <td>
                            <?php echo $brg->id_vendor ?>
                        </td> -->
                        <td>
                            <img src="<?php echo base_url('assets/img/vendor/barang/'.$brg->foto_barang) ?>" width="64" />
                        </td>
                        <td width="150">
                            <?php echo $brg->nama_barang ?>
                        </td>
                        <td>
                            <?php echo $brg->deskripsi_barang ?>
                        </td>
                        <td>
                            <?php echo $brg->harga_barang ?>
                        </td>
                        <td>
                        <?php echo anchor('main/barang/detail/'.$brg->id_barang,'<div class="col text-center"><button class="btn btn-sm btn-danger">Detail</button></div>');?>
                        </td>
                        
                        <!-- <td class="small">
                            <?php echo substr($product->description, 0, 120) ?>...</td>
                        <td width="250">
                            <a href="<?php echo site_url('adminis/produk/edit/'.$product->produk_id) ?>"
                             class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                            <a onclick="deleteConfirm('<?php echo site_url('adminis/produk/delete/'.$product->produk_id) ?>')"
                             href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                        </td> -->
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
 