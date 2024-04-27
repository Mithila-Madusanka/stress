<?$this->load->view("includes/header.php")?>

<style>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


@keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 1; }
}



.container{
	padding-top:200px;
	padding-bottom:330px
}


</style>
<head>
<title>Admin Login</title>
</head>
<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
				  <? if($this->session->flashdata('msg')){?>
					<div class="alert alert-success" role="alert">
							<?=$this->session->flashdata('msg')?>
					</div><? }?>
					<? if($this->session->flashdata('error')){?>
					<div class="alert alert-danger" role="alert">
							<?=$this->session->flashdata('error')?>
					</div><? }?>
			    	<h3 class="panel-title">Please sign in</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="POST" action="<?=base_url()?>admin/loginCheck">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="E-mail" name="email" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    		</div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
<?$this->load->view("includes/footer.php")?>
<script>
    $(document).ready(function(){
  $(document).mousemove(function(e){
     TweenLite.to($('body'), 
        .5, 
        { css: 
            {
                backgroundPosition: ""+ parseInt(event.pageX/8) + "px "+parseInt(event.pageY/'12')+"px, "+parseInt(event.pageX/'15')+"px "+parseInt(event.pageY/'15')+"px, "+parseInt(event.pageX/'30')+"px "+parseInt(event.pageY/'30')+"px"
            }
        });
  });
});
</script>