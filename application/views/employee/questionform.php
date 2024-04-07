<?$this->load->view("includes/header.php")?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css">
<style>
    .formdiv{
        border:2px solid black;
        padding:30px;
        margin-top:30px;
        border-radius: 25px;
        background:#CBD6E2;
    }

    #stress-meter {
            width: 80%;
            max-width: 400px;
        }

        #stress-progress {
            height: 30px;
            border-radius: 5px;
            overflow: hidden;
        }

        #loading-bar {
            width: 100%;
            height: 100%;
            background-color: #ddd;
            animation: loading 2s linear infinite;
        }

        #stress-level {
            height: 100%;
            transition: width 2s ease-in-out; /* Adjust the transition speed here */
        }

        @keyframes loading {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }

        #stressdiv{
            margin-top:15px;
        }

        #usernamediv{
            margin-top:20px;
        }

        .form-control{
            font-size:10pt;
        }

        #stressdiv{
            text-align:center;
            margin-top:30px
        }

        body{
            background:url("<?=base_url()?>/media/images/studentright.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
</style>
<script>
    function predict_stress_level()
    {   
		var gender = $("#gender").val();
		var dob = $("#dob").val();
		var sleep_duration = $("#sleep").val();
		var quality_sleep = $("#sleepqlty").val();
	    var height = $("#height").val();
		var weight = $("#weight").val();
		var daily_steps = $("#steps").val();
		var sleep_disorder = $("#sleepdisorder").val();


        var formData = new FormData();
        formData.append('gender', gender);
        formData.append('dob', dob);
        formData.append('sleep_duration', sleep_duration);
        formData.append('quality_sleep', quality_sleep);
        formData.append('height', height);
        formData.append('weight', weight);
        formData.append('daily_steps', daily_steps);
        formData.append('sleep_disorder', sleep_disorder);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'employee_stress_level/', true);
        xhr.onload = function() {
            var response = xhr.responseText;
            response = parseFloat(response);
            updateProgressBar(response*10);
        };
        xhr.send(formData);
    }
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>        
        <!-- Form on the right side -->
        <div class="col-md-8">
             <div id="usernamediv">Hi! <?=$this->session->userdata('username')?></div>
            <div class="formdiv">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Date Of Birth</label>
                    <input type="date" class="form-control" id="dob" placeholder="Date Of Birth">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Gender</label>
                    <select class="form-control" id="gender">
                        <option>Select Your Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Sleep Duration</label>
                    <input type="number" id="sleep" class="form-control" placeholder="No of Hours">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Qualtiy of Sleep</label>
                    <input type="number" id="sleepqlty" class="form-control" placeholder="No of Hours Deep Sleeping">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Weight (Kg)</label>
                    <input type="number" id="weight" class="form-control" placeholder="Enter Weight By Kilograms">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Height (Feet)</label>
                    <input type="number" id="height" class="form-control" placeholder="Enter Height By Feets">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Daily Steps</label>
                    <input type="number" id="steps" class="form-control" placeholder="Daily Steps">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Sleep Disorders</label>
                    <select class="form-control" id="sleepdisorder" required>
                        <option>Select Your Disorders</option>
                        <option value="None">None</option>
                        <option value="Insomnia">Insomnia</option>
                        <option value="Sleep Apnea">Sleep Apnea</option>
                    </select>
                </div>
                <div style="float:right;">
                    <button type="button" onclick="predict_stress_level()" class="btn btn-lg btn-primary">Complete</button>
                </div>
                <br>
            </form>
            </div>

            <div class="container" id="stressdiv">
                <div id="stress-meter">
                    <h2 class="text-center mb-4">Your Stress Level</h2>
                    <div class="progress" id="stress-progress">
                        <div id="loading-bar"></div>
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="stress-level"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Bootstrap Slider JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>

<script>
  // Initialize the rating slider
  $(document).ready(function(){
    var sleepQltySlider = new Slider('#sleepQltySlider', {
      tooltip: 'always'
    });

    // Update the displayed value when the slider is moved
    sleepQltySlider.on('slide', function(value) {
      $('#sleepQltySliderVal').text(value);
    });

    var accedmicPrefSlider = new Slider('#accedmicPrefSlider', {
      tooltip: 'always'
    });

    // Update the displayed value when the slider is moved
    accedmicPrefSlider.on('slide', function(value) {
      $('#accedmicPrefVal').text(value);
    });

    var studyLoadSlider = new Slider('#studyLoadSlider', {
      tooltip: 'always'
    });

    // Update the displayed value when the slider is moved
    studyLoadSlider.on('slide', function(value) {
      $('#studyLoadVal').text(value);
    });
  });

      // Update progress bar based on input value
      document.getElementById('stress-input').addEventListener('input', function () {
        const stressValue = parseFloat(this.value) || 0;
        updateProgressBar(stressValue);
    });

    // Function to update progress bar based on stress level
    function updateProgressBar(stressValue) {
        const progressBar = document.getElementById('stress-level');
        const loadingBar = document.getElementById('loading-bar');

        progressBar.style.width = stressValue + '%';
        progressBar.setAttribute('aria-valuenow', stressValue);
        updateProgressBarColor(stressValue);

        // Hide loading animation when stress value is entered
        loadingBar.style.display = stressValue > 0 ? 'none' : 'block';
    }

    // Function to update progress bar color based on stress level
    function updateProgressBarColor(stressValue) {
        const progressBar = document.getElementById('stress-level');

        if (stressValue <= 30) {
            progressBar.classList.remove('bg-warning', 'bg-danger');
            progressBar.classList.add('bg-success');
        } else if (stressValue <= 70) {
            progressBar.classList.remove('bg-success', 'bg-danger');
            progressBar.classList.add('bg-warning');
        } else {
            progressBar.classList.remove('bg-success', 'bg-warning');
            progressBar.classList.add('bg-danger');
        }
    }
</script>
<?$this->load->view("includes/footer.php")?>