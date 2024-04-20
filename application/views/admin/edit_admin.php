<?$this->load->view('./includes/header_admin')?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
        body{
        font-size:12pt;
    }

    input[type=text]{
        width:500px;
        font-size:12pt;
    }

    input[type=password]{
        width:500px;
        font-size:12pt;
    }

    input[type=email]{
        width:500px;
        font-size:12pt;
    }

    input[type=date]{
        width:500px;
        font-size:12pt;
    }

</style>
</br></br>
<h3>Edit My Details</h3>
<hr>
<form action="<?=base_url()?>/admin/updateAdmin" method="POST">
<input type="hidden"  class="form-control" id="id" name="id" value="<?=$admin->id?>" required autocomplete='off'>
<div class="modal-body">
    <div class="form-group">
        <input type="text"  class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?=$admin->first_name?>" required autocomplete='off'>
    </div>
    <div class="form-group">
        <input type="text"  class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?=$admin->last_name?>" required autocomplete='off'>
    </div>
    <div class="form-group">
        <input type="date"  class="form-control" id="dob" name="dob" placeholder="Date Of Birth" value="<?=$admin->dob?>" required autocomplete='off'>
    </div>
    <div class="form-group">
        <input type="text"  class="form-control" id="nic" name="nic" placeholder="NIC No" value="<?=$admin->nic?>" required autocomplete='off'>
    </div>
    <div class="form-group">
        <select class="form-control" id="type" name="type" style="width:500px;font-size:12pt;">
            <option value="">Select User Type</option>
            <option value="SUPER" <?if($admin->type == "SUPER"){?> selected <?}?>>Super User</option>
            <option value="NORMAL" <?if($admin->type == "NORMAL"){?> selected <?}?>>Normal User</option>
        </select>
    </div>
    <div class="form-group">
        <input type="email"  class="form-control" id="email" name="email" value="<?=$admin->email?>" placeholder="Email Address" required autocomplete="off">
    </div>
    <div class="form-group">
        <input type="password"  class="form-control" id="password" name="password" value="<?=$this->encryption->decrypt($admin->password)?>" placeholder="Password" required autocomplete="off">
    </div>
    <div class="form-group">
        <input type="submit"  class="btn btn-lg btn-primary" id="password" name="password" value="Update">
        <a href="<?=base_url()?>/Menu/profiles" class="btn btn-lg btn-warning">Back</a>
    </div>
</div>
</form>
<?$this->load->view('./includes/footer_admin')?>