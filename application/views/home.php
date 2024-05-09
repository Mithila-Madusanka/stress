<?$this->load->view("includes/header.php")?>

<link rel="icon" type="image/x-icon" href="favicon.ico">

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
    top: 50%;
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

      @keyframes blink {
        0% { opacity: 0; }
        50% { opacity: 1; }
        100% { opacity: 0; }
    }

    @keyframes colorChange {
        0% { color: pink; }
        25% { color: blue; }
        50% { color: green; }
        75% { color: orange; }
        100% { color: purple; }
    }

    /* Apply the animation to the text */
    .video-content p {
      animation: blink 3s infinite, colorChange 10s infinite;
      font-size: 70px
    }
</style></head>
<section class="video-section">
    <video autoplay muted loop id="background-video">
        <source src="<?=base_url()?>/media/videos/home.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="video-content">
        <h2>Mind Cool</h2>
        <p>Stress Free Zone</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModel">
            Get Started
        </button>
    </div>
</section>

<!-- The Modal  for User Name-->
<div class="modal" id="userModel">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h2 class="modal-title">Hi ! How Can I talk to You?</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <input type="text"  class="form-control" id="name" name="name" placeholder="Please Enter Your Name Here" required autofill=false oninput="enableNextButton()">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="setName()" id="nextButton" data-toggle="modal" data-target="#userTypeModal" disabled>
        Next <i class="fa fa-arrow-right"></i>
        </button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal  for User Type-->
<div class="modal" id="userTypeModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h2 class="modal-title">Hi!.. <span id="userNamePlaceholder"></span> Are You? </h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
      <form method="POST" action="<?=base_url()?>/common/userform" id="userForm">
      <input type="hidden" id="username" name="username" value="">
          <div class="mt-3">
            <label class="mr-3">
              <input type="radio" name="userType" value="student"> Student
            </label>
            <label>
              <input type="radio" name="userType" value="employee"> Employee
            </label>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="nextButtonUser" disabled>
            Next <i class="fa fa-arrow-right"></i>
          </button>
        </div>
      </form>

    </div>
  </div>
</div>

<input type="hidden" id="username" name="username" value="">
<script>
  function enableNextButton() {
    var nameInput = document.getElementById('name');
    var nextButton = document.getElementById('nextButton');

    // Enable the button only if the name is entered
    nextButton.disabled = !nameInput.value.trim();
  }

  function setName()
  { 
    var name = $("#name").val();
    $("#userNamePlaceholder").html(name);
    $("#username").val(name);
    $('#userModel').modal('hide');
  }

  document.addEventListener('DOMContentLoaded', function() {
    // Get radio buttons and next button
    var radioButtons = document.querySelectorAll('input[name="userType"]');
    var nextButton = document.getElementById('nextButtonUser');

    console.log("Radio buttons:", radioButtons);
    console.log("Next button:", nextButton);

    // Add event listener to radio buttons
    radioButtons.forEach(function(radioButton) {
      radioButton.addEventListener('change', function() {
        console.log("Change event fired");
        // Enable the next button if any radio button is selected
        var selectedRadio = document.querySelector('input[name="userType"]:checked');
        console.log("Selected radio button:", selectedRadio);
        if (selectedRadio) {
          nextButton.disabled = false;
        } else {
          nextButton.disabled = true;
        }
      });
    });
  });
</script>

<?$this->load->view("includes/footer.php")?>