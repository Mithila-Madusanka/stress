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

    .modal-body .form-control {
            font-size: 1.5rem; /* Adjust the font size as needed */
           
        }

</style>
</br></br>
<h3>Edit Quote</h3>
<hr>
<form action="<?=base_url()?>/admin/updateQuote" method="POST">
<input type="hidden"  class="form-control" id="id" name="id" value="<?=$quote->id?>" required autocomplete='off'>
<input type="hidden"  class="form-control" id="level" name="level" value="<?=$quote->level?>" required autocomplete='off'>
<div class="modal-body">
    <div class="form-group">
        <input type="text"  class="form-control" id="title" name="title" placeholder="Title" value="<?=$quote->title?>" required autocomplete='off'>
    </div>
    <div class="form-group">
        <textarea class="form-control" rows=10 id="description" name="description"><?=$quote->description?></textarea>
    </div>
    <div class="form-group">
        <input type="submit"  class="btn btn-lg btn-primary" id="password" name="password" value="Update">
        <a href="<?=base_url()?>/Menu/profiles" class="btn btn-lg btn-warning">Back</a>
    </div>
</div>
</form>
<?$this->load->view('./includes/footer_admin')?>