<?$this->load->view("includes/header.php")?>

<style>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


@keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 1; }
}



.container{
	padding-top:100px;
	padding-bottom:300px
}

.list li{
    margin-bottom: 10px;
}


</style>
<head>
<title>About Us Page</title>
</head>
<div class="container">
    <h1>Terms and Condtions</h1><hr>
    <ol class ="list">
    <li>Using SMS Feature: By using the SMS feature in Mind Cool, you agree to these terms.</li>
    <li>Sending SMS: When you use the SMS feature, it will send your stress level and mobile number to the recipient(s) you specify.</li>
    <li>Purpose: The SMS feature is for seeking help from trusted contacts. Only send messages to those who have consented.</li>
    <li>Your Responsibility: You're responsible for the content you send. Don't use it for anything unlawful or harmful.</li>
    <li>Limitation of Liability: We're not responsible for any issues with message delivery or how recipients react.</li>
    <li>Changes to Terms: We may update these terms. If you keep using the SMS feature, you accept the changes.</li>
    <li>Governing Law: These terms are governed by the laws. Any disputes will be handled there.</li>
</ol><hr>
			    
			
		
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