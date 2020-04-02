

<!------ Include the above in your HEAD tag ---------->
<?php foreach ($produk as $brg) {?>
<div class="container portfolio">
	<div class="row">
		<div class="col-md-12">
			<div class="heading">				
				<img src="https://image.ibb.co/cbCMvA/logo.png" />
			</div>
		</div>	
	</div>


	<div class="bio-info">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<div class="bio-image">
                        <img src="<?php echo base_url('assets/img/vendor/barang/'.$brg->foto_barang) ?>" width="64" />
						</div>			
					</div>
				</div>	
			</div>
			<div class="col-md-6">
				<div class="row bio-content">
                   <label>Nama Barang</label>
                    <?php echo $brg->nama_barang ?>
			<br>         
                <label>Deskripsi Barang</label>
                    <?php echo $brg->deskripsi_barang ?>
               <br>
              
                <label>Harga Sewa</label>
                    <?php echo $brg->harga_barang ?>
      <br>
			</div>
		</div>	
	</div>

    <div class="row">
		<div class="col-md-12">
			<div class="footer">				
            <?php echo anchor('main/pesan/form_pesan/'.$brg->id_barang,'<button class="btn btn-sm btn-danger">Sewa</button></div>');?>
        <?php echo anchor('main/pesan/kalender/'.$brg->id_barang,'<button class="btn btn-sm btn-success">Lihat Kalender</button></div>');?>
			</div>
		</div>	
	</div>
</div>
<?php } ?>