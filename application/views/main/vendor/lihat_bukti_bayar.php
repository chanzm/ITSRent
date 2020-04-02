<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<center> 
 <div class="container">
         
 <?php foreach ($sewa as $rinci): ?> 
    <form action="<?php echo base_url(). 'main/pesan/lakukan_pengiriman/'.$rinci->id_sewa; ?>" method="post" enctype='multipart/form-data'>
    <!-- Content Header (Page header) -->
    <div class="form-group">
      <input type="hidden" class="form-control" name="id_sewa" value="<?php echo $rinci->id_sewa?>">
      </div>
    <div class="form-group">
    	<label>Foto Bukti Bayar</label> <br>
      <img src="<?php echo base_url($rinci->foto_bukti_bayar) ?>" width="250" />
    </div>

    <button class="btn btn-sm btn-danger">Lakukan Pengiriman</button>
   
    </form>
<?php endforeach; ?>
</div>
   </center>