<?$this->load->view("includes/header.php")?>

<style>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


@keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 1; }
}

.video-section {
    position: relative;
    height: 87vh; /* Adjust the height as needed */
    overflow: hidden;
}

#background-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.main-content {
    padding: 20px;
}

.video-content {
    position: absolute;
    top: 10%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: #fff;
}

.video-content h2 {
    font-size: 5.2em;
    
}

.video-content p {
    font-size: 2.2em;
    margin-bottom: 20px;
}

.video-content button {
    padding: 10px 20px;
    font-size: 1em;
    background-color: #fff;
    color: #333;
    border: none;
    cursor: pointer;
}

.container{
	padding-top:200px;
}


</style>
<head>
 <title>User Login</title>
</head>
<section class="video-section">
    <video autoplay muted loop id="background-video">
        <source src="<?=base_url()?>/media/videos/Login.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
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
			    	<form accept-charset="UTF-8" role="form" method="POST" action="<?=base_url()?>User/loginCheck">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="E-mail" name="email" type="text" style="font-size: 15px;">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="" style="font-size: 15px;">
			    		</div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login" style="font-size: 15px;">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
</section>
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