<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!-- DataTables -->

<div class="container emp-profile">
        <?php foreach ($produk as $brg) {?>
        <form method="post">

        
        <div class="row">
            <div class="col-md-4">
                        <div class="profile-img">
                        <img src="<?php echo base_url('assets/img/vendor/barang/'.$brg->foto_barang) ?>" width="64" />
                        </div> 
            </div>

            <div class="col-md-6">
                <div class="profile-head">
                        <h1> <strong> Detail Barang </strong></h1>
                        <h5>
                            <?php echo $brg->nama_barang?>
                        </h5>
                        <h6>
                        Vendor : <a href="<?php echo site_url('main/barang/get_profil_vendor/'.$brg->id_vendor); ?>"><?php echo $brg->nama_ven; ?></a>
                        </h6>
                          <br>          
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nama Barang</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $brg->nama_barang?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Deskripsi Barang</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $brg->deskripsi_barang?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Harga Sewa</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $brg->harga_barang?></p>
                            </div>
                        </div>
                        </div>
            </div>

        </div>
        <!-- tutupe div row -->
        
       </form> 

       <br>
            <?php
            if($brg->status == 2 && $this->session->userdata('id_user')->role == "penyewa") { ?>
       <div class="row">            
       <div class="col-md-6 pull-left"><?php echo anchor('main/pesan/form_pesan/'.$brg->id_barang,'<button class="btn pull-left btn-sm btn-primary" disabled>Sewa Disini</button></div>');?> </div>
       <div class="col-md-6 pull-right"><?php echo anchor('main/calendar/calendar/'.$brg->id_barang,'<button class="btn pull-right btn-sm btn-primary" disabled>Lihat Kalender</button></div>');?> </div>
       </div>
            <?php } ?>

            <?php  if($brg->status == 1 && $this->session->userdata('id_user')->role == "penyewa") { ?>
       <div class="row">            
       <div class="col-md-6 pull-left"><?php echo anchor('main/pesan/form_pesan/'.$brg->id_barang,'<button class="btn pull-left btn-sm btn-primary">Sewa Disini</button></div>');?> </div>
       <div class="col-md-6 pull-right"><?php echo anchor('main/calendar/calendar/'.$brg->id_barang,'<button class="btn pull-right btn-sm btn-primary">Lihat Kalender</button></div>');?> </div>
       </div>
            <?php } ?>

            <?php  if($this->session->userdata('id_user')->role == "vendor") { ?>
       <div class="row">            
       <div class="col-md-6 pull-left"><?php echo anchor('main/dashboard_ven/edit_barang/'.$brg->id_barang,'<button class="btn pull-left btn-sm btn-primary">Edit Barang</button></div>');?> </div>
       </div>
            <?php } ?>

       <?php } ?>
</div>

        

<style>

.emp-profile{
    padding: 2%;
    border-radius: 0.5rem;
    background: #ecf0f5;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}

.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}

.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>

