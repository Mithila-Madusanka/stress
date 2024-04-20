<?$this->load->view("includes/header.php")?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>

.modal {

           
        }

        .modal-content {

        }

    .formdiv{
        border:2px solid black;
        padding:30px;
        margin-top:50px;
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
            margin-top:50px;
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

        #show_stress_level{
            margin-top:250px;
            margin-bottom:50px;
        }

        .modal {
            z-index:10000;
            margin-top:100px;
            animation: fadeIn 3s;
            
        }

</style>
<script>
    function predict_stress_level()
    {   
        var modal = document.getElementById("userModel");
        modal.style.display = "block";

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

            var cat = '';
            var stress_level = '';
            if(response == 4 || response == 5)
            {   
                cat = '<p style="color:#dc3545">High</p>';
                stress_level = 'HIGH';
            }
            else if(response == 3)
            {   
                cat = '<p style="color:#ffc107">Mid</p>';
                stress_level = 'MID';
            }
            else if(response == 1 || response == 2)
            {
                cat = '<p style="color:#28a745">Low</p>';
                stress_level = 'LOW';
            }
               
            $("#stress_level_cat").html(cat);
            updateProgressBar(response*20);
            $("#level_val").val(stress_level);
            $("#level_num").val(response);
            if(stress_level == "MID" || stress_level == "HIGH")
            {
                $("#musiclistendiv").show();
            }

            if(stress_level == "HIGH")
            {
                $("#mobilenumdiv").show();
            }
            // loadQuota(stress_level);
        };
        xhr.send(formData);
    }

    function loadQuota(stress_level)
    {   
        var formData = new FormData();
        formData.append('level', stress_level);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'get_stress_level_quota/', true);
        xhr.onload = function() {
            var response = xhr.responseText;
            $("#bestpractiseview").html(response);
            if(stress_level == "MID" || stress_level == "HIGH")
            {
                $("#musiclistendiv").show();
            }

            if(stress_level == "HIGH")
            {
                $("#mobilenumdiv").show();
            }
        };
        xhr.send(formData);
    }

    function closeModal() {
        var modal = document.getElementById("userModel");
        modal.style.display = "none";
    }

    // Close the modal if user clicks outside of it
    window.onclick = function(event) {
        var modal = document.getElementById("userModel");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function show_mobile_num_input()
    {   
        // Get the checkbox
        var checkBox = document.getElementById("mobnumbcheck");

        // If the checkbox is checked, display the output text
        if (checkBox.checked == true){
            $("#mobilenuminput").show();
        } else {
            $("#mobilenuminput").css('display', 'none');
        }
    }

    function show_stress_relief_best_practices()
    {
        var level_val = $("#level_val").val();
        if(level_val != '')
        {
            var url = "<?=base_url()?>/Common/show_stress_relief_best_practices/"+level_val;
            window.open(url, '_blank')
        }
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
                    <div class="form-group" style="margin-top:30px;">
                        <label for="exampleInputEmail1" style="margin-right:15px">Kindly Rate your Sleep Quality <i class="fa fa-info-circle" aria-hidden="true" title="
                        1. Poor: Sleep quality is very low, with significant disturbances or discomfort.
2. Fair: Sleep quality is below average, with some disturbances or discomfort.
3. Average: Sleep quality is moderate, with occasional disturbances or discomfort.
4. Good: Sleep quality is above average, with minimal disturbances or discomfort.
5. Excellent: Sleep quality is outstanding, with no disturbances or discomfort."></i> : </label>
                        <input id="sleepQltySlider" type="text" data-slider-min="1" data-slider-max="5" data-slider-step="1" data-slider-value="1">
                        <span id="sleepQltySliderVal" style="margin-left:10px">1</span>
                        <br/> <br/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="margin-right:15px">How would you rate your academic performance 
                        <i class="fa fa-info-circle" aria-hidden="true" title="
                        1. Poor: Consistently low grades, minimal understanding.
2. Below Average: Struggles with concepts, below-average grades.
3. Average: Meets basic expectations, moderate grades.
4. Above Average: Exceeds expectations, high grades.
5. Excellent: Outstanding performance, top grades."></i>
                        : </label>
                        <input id="accedmicPrefSlider" type="text" data-slider-min="1" data-slider-max="5" data-slider-step="1" data-slider-value="1">
                        <span id="accedmicPrefVal" style="margin-left:10px">1</span>
                        <br/> <br/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="margin-right:15px">How would you rate your study load  <i class="fa fa-info-circle" aria-hidden="true" title="
                        1.Light: Minimal workload, few assignments or courses.
2. Moderate: Manageable workload, average number of assignments or courses.
3. Average: Standard workload, typical number of assignments or courses.
4. Heavy: Substantial workload, above-average number of assignments or courses.
5. Intense: Overwhelming workload, high number of assignments or courses requiring significant time and effort."></i>: </label>
                        <input id="studyLoadSlider" type="text" data-slider-min="1" data-slider-max="5" data-slider-step="1" data-slider-value="1">
                        <span id="studyLoadVal" style="margin-left:10px">1</span>
                        <br/> <br/>
                    </div>
                    <div class="form-inline">
                        <label for="exampleInputEmail1" style="margin-right:15px">How many times a week do you suffer headaches ?</label>
                        <input id="hedaches" type="number" class="form-control" placeholder="Enter No of times">
                    </div>
                    <br/>
                    <div class="form-inline">
                        <label for="exampleInputEmail1" style="margin-right:15px">How many times a week do you practice extracurricular activities ? <i class="fa fa-info-circle" aria-hidden="true" title="
                        Sports.
Arts and Crafts.
Performing Arts.
Academic Clubs.
Community Service."></i> </label>
                        <input id="extractivities" type="number" class="form-control" placeholder="Enter No of times">
                    </div>
                    <br>
                    <div style="float:right;">
                        <button type="button" onclick="predict_stress_level()" class="btn btn-lg btn-primary">Complete</button>
                    </div>
                    <br>
                </form>
            </div>
            <div class="col-md-2"></div>

            <div class="modal" id="userModel">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" onclick="closeModal()" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form method="POST" action="<?=base_url()?>User/create_user">
                <!-- Modal body -->
                <div class="modal-body">
                    <div id="stress-meter">
                        <h2 class="text-center mb-4">Hi! <?=$this->session->userdata('username')?> Your Stress Level is <span id="stress_level_cat"></span></h2>
                            <div class="progress" id="stress-progress">
                            <div id="loading-bar"></div>
                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="stress-level"></div>
                        </div>
                    </div>
                    <inpu type="hidden" id="level_val" name="level_val" value="">
                    <input type="hidden" id="level_num" name="level_num" value="">
                    <input type="hidden" id="user_type" name="user_type" value="STUDENT">
                    <div id="mobilenumdiv" style="display:none;">
                        <p>Sharing your problems with a trusted individual can offer emotional validation and support, making you feel understood and less isolated in your challenges.</p>
                        <p>Terms and Condition <input type="checkbox" value="YES" onchange="show_mobile_num_input()" id="mobnumbcheck"></p>
                        <div id="mobilenuminput" style="display:none">
                            <input type="text" class="form-control" id="mobilenum1" name="mobilenum1" placeholder="Mobile Number 1"><br>
                            <input type="text" class="form-control" id="mobilenum2" name="mobilenum2" placeholder="Mobile Number 2">
                        </div>
                    </div>
                    <hr>
                    <div id="musiclistendiv" style="display:none;">
                        <p>Music provides a comprehensive way to relieve stress, addressing both physical and emotional aspects.</p><br>
                        <p>Do You Like to Listen Music : <a type="button" target="_blank" class="btn btn-primary" href="<?=base_url()?>/Common/get_stress_reduce_music">Yes</a></p>
                    </div>
                    <hr>
                    <div>
                        <p>Music provides a comprehensive way to relieve stress, addressing both physical and emotional aspects.</p><br>
                        <p>Do You Like to View Stress Relief Best Practices : <button type="button" class="btn btn-primary" onclick="show_stress_relief_best_practices()">Yes</button></p>
                    </div>

                </div>

                

                <!-- Modal footer -->
                <div class="modal-footer">
                <p>Do you like to save your current status ? <button type="submit" class="btn btn-primary">Yes</button> <a href="<?=base_url()?>Home" class="btn btn-danger">No</a></p>
                </div>
                </form>
                </div>
            </div>

            
            </div>

            


            <!-- <div id="show_stress_level">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
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
            </div> -->
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

        if (stressValue <= 40) {
            progressBar.classList.remove('bg-warning', 'bg-danger');
            progressBar.classList.add('bg-success');
        } else if (stressValue <= 60) {
            progressBar.classList.remove('bg-success', 'bg-danger');
            progressBar.classList.add('bg-warning');
        } else {
            progressBar.classList.remove('bg-success', 'bg-warning');
            progressBar.classList.add('bg-danger');
        }
    }
</script>
<div style="margin-top:150px"></div>
<?$this->load->view("includes/footer.php")?>