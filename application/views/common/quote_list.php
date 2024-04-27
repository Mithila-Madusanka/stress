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
.modal {
    z-index:10000;
    margin-top:375px;
    animation: fadeIn 3s;
    
}

.modal-footer .btn-primary {
        font-size: 1.5rem; /* Adjust the font size as needed */
        padding: 10px 20px; /* Adjust the padding as needed */
    }

.modal-body .form-control {
        font-size: 1.5rem; /* Adjust the font size as needed */
        padding: 15px; /* Adjust the padding as needed */
      }

.content {
    background-color: #bfbfbf;
    opacity: 0.7;
    padding-top:50px;
    padding-right:20px;
    margin-top:200px;
    color:black;
}

.content ul li {
    text-align: left;
    line-height: 1.8;
}

.heading{
    color:black;
    padding-bottom:20px;
    font-weight: 600
}

</style>
<section class="video-section">
    <video autoplay muted loop id="background-video">
        <source src="<?=base_url()?>/media/videos/BestPractiseVideo.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="video-content">
        <div class ="content">
            <h1 class="heading">Stress Relief Best Practises</h1>
            <ul>
            <?
            if($quot)
            {
                foreach($quot as $row)
                {?>
                    <li><b><?=$row->title?> : </b><?=$row->description?></li>
                <?}
            }
            ?>
            </ul>
        </div>
    </div>
</section>

<?$this->load->view("includes/footer.php")?>