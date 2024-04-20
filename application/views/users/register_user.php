<?$this->load->view("includes/header.php")?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css">
<style>
    .modal {
        display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
           
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto; /* 10% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 900px /* Set width to 80% of viewport width */
            /* Set max height to 80% of viewport height */
            overflow-y: auto; /* Enable vertical scrollbar */
        }

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

        h1 {
            color: #333;
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
</style>
<script>
    function check_exisiting_acc(val)
    {
        if(val != '')
        {
            var formData = new FormData();
            formData.append('email', val);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'check_existing_account/', true);
            xhr.onload = function() {
                var response = xhr.responseText;
                response = parseFloat(response);
                if(response == 0)
                {
                    $("#formfields").show();
                    $("#mobile").attr('required');
                    $("#password").attr('required');
                    $("#repassword").attr('required');
                }
                else
                {   
                    $("#formfields").css('display','none');
                    $("#mobile").removeAttr('required');
                    $("#password").removeAttr('required');
                    $("#repassword").removeAttr('required');
                }
            };
            xhr.send(formData);
        }
    }
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>        
        <!-- Form on the right side -->
        <div class="col-md-4">
            <div class="formdiv">
            <form action="<?=base_url()?>User/save_user_records" method="POST">
                <input type="hidden" id="level" name="level" value="<?=$stress_level?>">
                <input type="hidden" id="user_type" name="user_type" value="<?=$user_type?>">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="email" class="form-control" autocomplete="off" onchange="check_exisiting_acc(this.value)" id="email" name="email" placeholder="Enter Your Email" required style="width:300px;">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?=$this->session->userdata('username')?>" required style="width:300px;">
                </div>
                <div id="formfields" style="display:none;">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Mobile Number</label>
                        <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter Your Mobile Number" required style="width:300px;">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password for your account" required style="width:300px;">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Re Type Password</label>
                        <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Re Type your password" required style="width:300px;">
                    </div>
                </div>
                <div style="float:right;">
                    <button type="submit"  class="btn btn-lg btn-primary">Save</button>
                </div>
                <br>
            </form>
            </div>

            <div class="col-md-4"></div>

    </div>
</div>
<br><br><br><br><br><br><br><br><br>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Bootstrap Slider JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>
<?$this->load->view("includes/footer.php")?>