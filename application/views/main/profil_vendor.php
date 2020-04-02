<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div class="container emp-profile">

    <form method="post">
    <?php
        foreach($vendor as $y):
    ?>
        <div class="row">
            <div class="col-md-4">
                        <div class="profile-img">
                            <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/> -->
                            <img src="<?php echo base_url('assets/img/vendor/profil/'.$y->foto_ven) ?>" width="64" />
                            <!-- <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div> -->
                        </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                        <h1> <strong> Profil Vendor </strong></h1>
                        <h5>
                            <!-- <br> -->
                        </h5>
                        <h6>
                            Vendor
                        </h6>
                                    
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li> -->
                            </ul>
                </div>
            </div>
            <div class="col-md-2">
                        <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/> -->
                         <!-- <a class="btn btn-sm btn-danger" onclick="show_edit_modal(<?php echo $y->id_peristiwa?>)"  data-target="#modal-edit<?=$y->id_user;?>">Edit Profile</a> -->
                        <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-edit<?php echo $y->id_user;?>">Edit Profile</a> 
            </div>
        </div> 
        
        <div class="row">
            <div class="col-md-4">
                        <div class="profile-work"> </div>    
            </div>
          
            <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nama</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $y->nama_ven?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Telepon</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $y->telp_ven?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $y->email_ven?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $y->username_ven?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Status</label>
                                            </div>
                                            <div class="col-md-6">
                                            <?php $stat = $y->status;
                                            if($stat==2){
                                                $status = "Tutup (Off)";
                                            }
                                            else if($stat==1){
                                                $status = "Aktif";
                                            }
                                            else{
                                                $status = "Belum Aktif";
                                            }
                                            ?>
                                                <p><?php echo $status; ?></p>
                                            </div>
                                        </div>
                    
            </div>
        </div> 
        <?php endforeach; ?>
       </form>  
 
</div>

<?php 
  foreach($vendor as $y):
  ?>

  <div class="modal fade" id="modal-edit<?php echo $y->id_user?>">
    <div class="modal-dialog">
      <form action="<?php echo base_url(). 'main/dashboard_ven/update_vendor'; ?>"  method="post">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Profil Vendor</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" class="form-control" name="id_vendor" value="<?php echo $y->id_user?>">
            </div>    
            <div class="form-group">                
              <label>Nama</label>
              <input type="text" class="form-control" name="nama_ven" value="<?php echo $y->nama_ven?>" required placeholder="Enter ...">
            </div>
            <div class="form-group">                
              <label>Telepon</label>
              <input type="text" class="form-control" name="telp_ven" value="<?php echo $y->telp_ven?>" required placeholder="Enter ...">
            </div>
            <div class="form-group">                
              <label>Email</label>
              <input type="text" class="form-control" name="email_ven"  value="<?php echo $y->email_ven?>" required placeholder="Enter ...">
            </div>
            <div class="form-group">                
              <label>User Id</label>
              <input type="text" class="form-control" name="username_ven"  value="<?php echo $y->username_ven?>" required placeholder="Enter ...">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" name="simpan" class="btn btn-danger">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php endforeach;?>

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
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
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