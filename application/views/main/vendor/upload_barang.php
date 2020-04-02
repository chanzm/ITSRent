
    <!-- Content Header (Page header) -->
 
    <form action="<?php echo base_url(). 'main/barang/upload_barang2'; ?>"  method="post" enctype='multipart/form-data'>
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Upload Barang</h4>
          </div>
          <div class="modal-body">
          <div class="form-group">                
              <input type="hidden" name="id_vendor" class="form-control" value="<?php echo $this->session->userdata('id_user')->id_user?>">
            </div>
            <div class="form-group">                
              <label>Nama Barang</label>
              <input type="text" name="nama_barang" class="form-control">
            </div>
            <div class="form-group">                
              <label>Deskripsi Barang</label>
              <input type="text" name="deskripsi_barang" class="form-control">
            </div>
            <div class="form-group">                
              <label>Harga Barang</label>
              <input type="text" name="harga_barang" class="form-control">
            </div>
            <div class="form-group">                
              <label>Foto Barang</label>
              <input type="file" name="foto_barang" size ='50'>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="upload" class="btn btn-danger">Upload</button>
          </div>
        </div>
      </form>
     
 