
      <form action="<?php echo base_url(). 'main/dashboard_ven/upload'; ?>"  method="post" enctype='multipart/form-data'>
        <div style="background-color: #ecf0f5" class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Sewa Barang</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">                
              <label>Nama Barang</label>
              <input type="text" class="form-control" name="nama_barang">
            </div>
            <div class="form-group">                
              <label>Deskripsi Barang</label>
              <input type="text" name="deskripsi_barang" class="form-control">
            </div>
            <div class="form-group">               
              <label>Harga Barang</label>         
              <input type="text" name="harga_barang" class="form-control">
            </div>
            <!-- <div class="form-group">                
              <label>Nama Vendor</label>
              <input type="text" disabled name="harga_barang" class="form-control" value="<?php echo $brg->id_vendor?>">
            </div> -->
            <div class="form-group">                
              <label>Foto Barang</label>
              <input type="file" name="foto_barang" class="form-control">
            </div>
          <div class="modal-footer">
            <button type="submit" name="upload" class="btn btn-danger">Upload</button>
          </div>
        </div>
      </div>
      </form>
