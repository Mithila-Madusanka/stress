<?$this->load->view("includes/header.php")?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
    .formdiv{
        border:2px solid black;
        padding:30px;
        margin-top:50px;
        border-radius: 25px;
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
            margin-top:50px;
        }

        .form-control{
            font-size:10pt;
        }

        #stressdiv{
            text-align:center;
            margin-top:30px
        }
</style>
<script>
    function predict_stress_level()
    {   
        var sleep_quality = $("#sleepQltySlider").val();
        var accedmic = $("#accedmicPrefSlider").val();
        var study = $("#studyLoadSlider").val();
        var hedaches = $("#hedaches").val();
        var extractivities = $("#extractivities").val();


        var formData = new FormData();
        formData.append('sleep_quality', sleep_quality);
        formData.append('accedmic', accedmic);
        formData.append('study', study);
        formData.append('hedaches', hedaches);
        formData.append('extractivities', extractivities);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'student_stress_level/', true);
        xhr.onload = function() {
            var response = xhr.responseText;
            response = parseFloat(response);
            updateProgressBar(response*20);
        };
        xhr.send(formData);
    }
</script>
<div class="container-fluid">
    <div class="row">
        <!-- Image on the left side -->
        <div class="col-md-6">
            <img src="<?=base_url()?>/media/images/studentright.jpg" class="img-fluid" alt="Student Image">
        </div>
        
        <!-- Form on the right side -->
        <div class="col-md-6">
             <div id="usernamediv">Hi! <?=$this->session->userdata('username')?></div>
            <div class="formdiv">
                <form>
                    <div class="form-group" style="margin-top:30px;">
                        <label for="exampleInputEmail1" style="margin-right:15px">Kindly Rate your Sleep Quality: </label>
                        <input id="sleepQltySlider" type="text" data-slider-min="1" data-slider-max="5" data-slider-step="1" data-slider-value="1">
                        <span id="sleepQltySliderVal" style="margin-left:10px">1</span>
                        <br/> <br/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="margin-right:15px">How would you rate your academic performance: </label>
                        <input id="accedmicPrefSlider" type="text" data-slider-min="1" data-slider-max="5" data-slider-step="1" data-slider-value="1">
                        <span id="accedmicPrefVal" style="margin-left:10px">1</span>
                        <br/> <br/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="margin-right:15px">How would you rate your study load: </label>
                        <input id="studyLoadSlider" type="text" data-slider-min="1" data-slider-max="5" data-slider-step="1" data-slider-value="1">
                        <span id="studyLoadVal" style="margin-left:10px">1</span>
                        <br/> <br/>
                    </div>
                    <div class="form-inline">
                        <label for="exampleInputEmail1" style="margin-right:15px">How many times a week do you suffer headaches ?</label>
                        <input id="hedaches" type="number" class="form-control" placeholder="Enter No Of Times">
                    </div>
                    <br/>
                    <div class="form-inline">
                        <label for="exampleInputEmail1" style="margin-right:15px">How many times a week do you practice extracurricular activities ?</label>
                        <input id="extractivities" type="number" class="form-control" placeholder="Enter No Of Times">
                    </div>
                    <br>
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