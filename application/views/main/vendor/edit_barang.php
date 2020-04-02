<?php foreach ($barang as $b) : ?>
      <form action="<?php echo base_url(). 'main/dashboard_ven/update_barang'; ?>"  method="post">
        <div style="background-color: #ecf0f5" class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Sewa Barang</h4>
          </div>
          <div class="modal-body">
            <input type = "hidden" name="id_barang" value="<?php echo $b->id_barang?>">
            <div class="form-group">                
              <label>Nama Barang</label>
              <input type="text" class="form-control" name="nama_barang" value="<?php echo $b->nama_barang?>">
            </div>
            <div class="form-group">                
              <label>Deskripsi Barang</label>
              <input type="text" name="deskripsi_barang" class="form-control" value="<?php echo $b->deskripsi_barang?>">
            </div>
            <div class="form-group">               
              <label>Harga Barang</label>         
              <input type="text" name="harga_barang" class="form-control" value="<?php echo $b->harga_barang?>">
            </div>
          <div class="modal-footer">
            <button type="submit" name="upload" class="btn btn-danger">Upload</button>
          </div>
        </div>
      </div>
      </form>

    <?php endforeach ; ?>
