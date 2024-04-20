<?$this->load->view('./includes/header_user')?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
    body{
        font-size:12pt;
    }

    .modal {
    z-index:10000;
    margin-top:160px;
    animation: fadeIn 1s;
    
    }

    .modal-footer .btn-primary {
            font-size: 1.5rem; /* Adjust the font size as needed */
            padding: 10px 20px; /* Adjust the padding as needed */
        }

    .modal-body .form-control {
            font-size: 1.5rem; /* Adjust the font size as needed */
           
        }
        
</style>
<script>
    function call_delete(id){
        $("#delete_id").val(id);
        $("#confirmModel").show();

    }

    function close_model()
    {
        $("#confirmModel").fadeOut();
    }
</script>
</br></br>
<h3>Recording History</h3>
<? if($this->session->flashdata('msg')){?>
    <div class="alert alert-success" role="alert">
             <?=$this->session->flashdata('msg')?>
     </div><? }?>
     <? if($this->session->flashdata('error')){?>
    <div class="alert alert-danger" role="alert">
             <?=$this->session->flashdata('error')?>
     </div><? }?>
<hr>
<div>
    <?if($this->session->userdata("admintype") == "SUPER"){?>
        <div class="row" style="float:right; padding:5px; margin-bottom:20px; margin-right:12px;">
            <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#userModel"><i class="fa fa-user-circle-o"></i>&nbsp;Add Admin</button>
        </div>
    <?}?>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Messured Stress Level</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?if($stress_data){
            $count = 1;
            foreach($stress_data as $row){

                $span = '';
                if($this->session->userdata('usertype') == "EMPLOYEE")
                {
                    if($row->stress_level == 7 || $row->stress_level == 8)
                    {   
                        $span = '<span class="badge badge-danger" title="Range: 7-8">HIGH</span>';
                    }
                    elseif($row->stress_level == 4 || $row->stress_level == 5 || $row->stress_level == 6)
                    {   
                        $span = '<span class="badge badge-warning" title="Range: 4-6">MID</span>';
                    }
                    elseif($row->stress_level == 1 || $row->stress_level == 2 || $row->stress_level == 3)
                    {
                        $span = '<span class="badge badge-success" title="Range: 1-3">LOW</span>';
                    }
                }
                elseif($this->session->userdata('usertype') == "STUDENT")
                {
                    if($row->stress_level == 4 || $row->stress_level == 5)
                    {   
                        $span = '<span class="badge badge-danger" title="Range: 4-5">HIGH</span>';
                    }
                    elseif($row->stress_level == 3)
                    {   
                        $span = '<span class="badge badge-warning" title="Range: 3">MID</span>';
                    }
                    elseif($row->stress_level == 1 || $row->stress_level == 2)
                    {
                        $span = '<span class="badge badge-success" title="Range: 1-2">LOW</span>';
                    }
                }
                
                ?>
            <tr <?if($count%2 == 0 ){?> class="info" <?}?>>
                <td><?=$count?></td>
                <td><?=$row->saved_at?></td>
                <td><?=$span?></td>
                <td>
                    <a href="javascript:call_delete(<?=$row->id?>)" title="DELETE"><i class="fa fa-trash icon-red" aria-hidden="true" style="color:red"></i></a>
                </td>
            </tr>
        <?
            $count++;
            }}else{?>
             <tr>
                <td colspan=7>Records Not Found!</td>
             </tr>
          <?}?>
        </tbody>
    </table>
</div>

<div class="modal" id="userModel">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Admin</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form action="<?=base_url()?>/admin/addAdmin" method="POST">
        <div class="modal-body">
            <div class="form-group">
                <input type="text"  class="form-control" id="first_name" name="first_name" placeholder="First Name" required autocomplete='off'>
            </div>
            <div class="form-group">
                <input type="text"  class="form-control" id="last_name" name="last_name" placeholder="Last Name" required autocomplete='off'>
            </div>
            <div class="form-group">
                <input type="date"  class="form-control" id="dob" name="dob" placeholder="Date Of Birth" required autocomplete='off'>
            </div>
            <div class="form-group">
                <input type="text"  class="form-control" id="nic" name="nic" placeholder="NIC No" required autocomplete='off'>
            </div>
            <div class="form-group">
                <select class="form-control" id="type" name="type">
                    <option value="">Select User Type</option>
                    <option value="SUPER">Super User</option>
                    <option value="NORMAL">Normal User</option>
                </select>
            </div>
            <div class="form-group">
                <input type="email"  class="form-control" id="email" name="email" placeholder="Email Address" required autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password"  class="form-control" id="password" name="password" placeholder="Password" required autocomplete="off">
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="nextButton">
                Save
            </button>
        </div>
        </form>
    </div>
  </div>
</div>


<div class="modal" id="confirmModel">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete Record</h4>
      </div>

      <!-- Modal body -->
      <form action="<?=base_url()?>/User/delete_stress_record" method="POST">
        <div class="modal-body">
        <input type="hidden" id="delete_id" name="delete_id" value="">
        <p>Are you sure you want to delete this record?</p>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger" id="nextButton">
                Yes
            </button>
            <button type="button" class="btn btn-warning" onclick="close_model()" data-dismiss="modal">
                No
            </button>
        </div>
        </form>
    </div>
  </div>
</div>

<div class="col-md-4 modal-grids">
                            <button type="button" style="display:none" class="btn btn-primary"  id="flagchertbtn"  data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>
                            <div class="modal fade bs-example-modal-sm"tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title" id="mySmallModalLabel"><i class="fa fa-info-circle nav_icon"></i> Alert</h4>
                                        </div>
                                        <div class="modal-body" id="checkflagmessage">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button type="button" style="display:none" class="btn btn-delete" id="complexConfirm_subtask" name="complexConfirm_subtask"  value="DELETE"></button>
                        <button type="button" style="display:none" class="btn btn-delete" id="complexConfirm_confirm" name="complexConfirm_confirm"  value="DELETE"></button>
                        
                        <form name="deletekeyform">  
                            <input name="deletekey" id="deletekey" value="0" type="hidden">
                        </form>

                        <div class="clearfix"> </div>
                    </div>
                </div>
                <!--footer-->
        <script type="text/javascript">

            $("#complexConfirm_confirm").confirm({
                title:"Delete Admin",
                text: "Are You sure you want to delete this admin?" ,
                headerClass:"modal-header",
                confirm: function(button) {
                    button.fadeOut(2000).fadeIn(2000);
                    var id = document.deletekeyform.deletekey.value;
                    grn_appr_disappr(id,1);
                },
                cancel: function(button) {
                    button.fadeOut(2000).fadeIn(2000);
                   // alert("You aborted the operation.");
                },
                confirmButton: "Yes I am",
                cancelButton: "No"
            });
</script>
<?$this->load->view('./includes/footer_user')?>