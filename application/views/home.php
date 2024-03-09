<?$this->load->view("includes/header.php")?>
<style>

@keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 1; }
}

header, footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px;
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
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: #fff;
}

.video-content h2 {
    font-size: 2em;
}

.video-content p {
    font-size: 1.2em;
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
.modal {
    z-index:10000;
    margin-top:200px;
    animation: fadeIn 2s;
}
</style>
<section class="video-section">
    <video autoplay muted loop id="background-video">
        <source src="<?=base_url()?>/media/videos/home.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="video-content">
        <h2>Welcome to Your Website</h2>
        <p>Explore amazing content and features.</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Get Started
        </button>
    </div>
</section>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Hi! What is your name?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <input type="text"  class="form-control" id="name" name="name" placeholder="Your Name" required autofill=false>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Next</button>
      </div>

    </div>
  </div>
</div>
<?$this->load->view("includes/footer.php")?>