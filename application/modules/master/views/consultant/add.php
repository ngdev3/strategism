
<main id="myclsid" class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="container-fluid">
                        <!--<h4 class="c-grey-900 mT-10 mB-30"> List </h4>-->
                                     <?php //pr($result); die; ?>
                        <div class="row">
                            <div class="masonry-item col-md-12">
                                <div class="bgc-white p-20 bd">
                                    <h6 class="c-grey-900">Add Consultant</h6>
                                     <?=get_flashdata();?>
                                    <div class="mT-30">
                                        <?php echo form_open_multipart('', array('class' => '', 'id' => 'ciatyform_id',)); ?>
                                            <div class="form-row">
                                           
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">First Name*</label>
                                                   <?php  $name = @$result->first_name;
                                                    $postvalue = @$_POST['first_name'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'first_name','maxlength'=>'150', 'class' => 'form-control', 'id' => 'first_name', 'placeholder' => 'First Name', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('first_name'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Last Name</label>
                                                   <?php  $name = @$result->last_name;
                                                    $postvalue = @$_POST['last_name'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'last_name','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Last Name', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('last_name'); ?></div></label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                           
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Visa Type*</label>
                                                    <select id="visa_id"  class="form-control" name="visa_id">
                                                    <option value="">Select Visa Type</option>
                                                        <?php if(!empty(@$visa_type)){
                                                             foreach($visa_type as $key=>$value){  ?>
                                                              <option <?php if(@$result->visa_id == $value->visa_id){ echo "selected"; }?>  value="<?php echo $value->visa_id;?>"><?php echo $value->name;?></option>
                                                       <?php }}?>
                                                </select>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('visa_id'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Skil Type*</label>
                                                    <select id="skills"  class="form-control" name="skills">
                                                    <option value="">Select Skill Type</option>
                                                        <?php if(!empty(@$skill_type)){
                                                             foreach($skill_type as $key=>$value){  ?>
                                                              <option <?php if(@$result->skills == $value->skill_id){ echo "selected"; }?> value="<?php echo $value->skill_id;?>"><?php echo $value->skill_name;?></option>
                                                       <?php }}?>
                                                </select>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('skills'); ?></div></label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                           
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Client Name*</label>
                                                    <select id="client_id"  class="form-control" name="client_id">
                                                    <option value="">Select Client Name</option>
                                                        <?php if(!empty(@$client_type)){
                                                             foreach($client_type as $key=>$value){  ?>
                                                              <option <?php if(@$result->client_id == $value->client_id){ echo "selected"; }?> value="<?php echo $value->client_id;?>"><?php echo $value->client_name;?></option>
                                                       <?php }}?>
                                                </select>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('client_id'); ?></div></label>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Project Duration *</label>
                                                    <select id="duration_id"  class="form-control" name="duration_id">
                                                    <option value="">Select Duration</option>
                                                        <?php if(!empty(@$duration)){
                                                             foreach($duration as $key=>$value){  ?>
                                                              <option <?php if(@$result->duration_id == $value->duration_id){ echo "selected"; }?> value="<?php echo $value->duration_id;?>"><?php echo $value->duration.' Months+';?></option>
                                                       <?php }}?>
                                                </select>  
                                                 <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('duration_id'); ?></div></label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Project Start Date *</label>
                                                   <?php  
                                                        $name = @$result->project_start_date;
                                                        $middles = strtotime($name);             // returns bool(false)
                                                        $new_dates = date('d-m-Y', $middles);            
                
                                                        $postvalue = date('d-m-Y');//@$_POST['billing_date'];
                                                        echo form_input(array('name' => 'project_start_date', 'maxlength'=>'150', 'class' => 'form-control', 'id' => 'datepicker', 'placeholder' => 'Project Start Date', 'value' => !empty($name) ? $new_dates : $postvalue )); ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('project_start_date'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Project End Date *</label>
                                                   <?php  
                                                        $name = @$result->project_end_date;
                                                        $middles = strtotime($name);             // returns bool(false)
                                                        $new_dates = date('d-m-Y', $middles);            
                
                                                        $postvalue = date('d-m-Y');//@$_POST['billing_date'];
                                                        echo form_input(array('readonly'=>'readonly','name' => 'project_end_date', 'maxlength'=>'150', 'class' => 'form-control', 'id'=>'end_date', 'placeholder' => 'Project End Date', 'value' =>!empty($name) ? $new_dates : $postvalue )); ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('project_end_date'); ?></div></label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-row">
                                           
                                              
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Job Type</label>
                                              
                                                   <select id="aa_job_type"  class="form-control" name="aa_job_type">
                                                    <option value="">Job Type</option>
                                                        <?php if(!empty(@$job_type)){
                                                             foreach($job_type as $key=>$value){  ?>
                                                              <option <?php if(@$result->aa_job_type == $value->job_type_id){ echo "selected"; }?> value="<?php echo $value->job_type_id;?>"><?php echo $value->job_type;?></option>
                                                       <?php }}?>
                                                </select> 
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('aa_job_type'); ?></div></label>
                                                </div>
                                               

                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Pay Bill</label>
                                                   <?php  $name = @$result->pay_bill;
                                                    $postvalue = @$_POST['pay_bill'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'pay_bill','type'=>'number','maxlength'=>'150', 'class' => 'form-control', 'id' => 'pay_bill', 'placeholder' => 'Pay Bill', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('pay_bill'); ?></div></label>
                                                </div>

                                            </div>
                                            <div class="form-row">
                                           
                                              
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Bill Rate</label>
                                                   <?php  $name = @$result->bill_rate;
                                                    $postvalue = @$_POST['bill_rate'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'bill_rate','type'=>'number','maxlength'=>'150', 'class' => 'form-control', 'id' => 'bill_rate', 'placeholder' => 'Bill Rate', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('bill_rate'); ?></div></label>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Phone Number</label>
                                                   <?php  $name = @$result->mobile;
                                                    $postvalue = @$_POST['mobile'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'mobile','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'mobile', 'placeholder' => 'Mobile Number', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('mobile'); ?></div></label>
                                                </div>

                                            </div>
                                          
                                            <div class="form-row">
                                           
                                              
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Email</label>
                                                   <?php  $name = @$result->email;
                                                    $postvalue = @$_POST['email'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'email','type'=>'email','maxlength'=>'150', 'class' => 'form-control', 'id' => 'cate_id', 'placeholder' => 'Email', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('email'); ?></div></label>
                                                </div>

                                               <div class="form-group col-md-6">
                                                   <label for="inputEmail4">Joining Status</label>
                                                  <?php  $name = @$result->joining_status;
                                                   $postvalue = @$_POST['joining_status'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                   echo form_input(array('name' => 'joining_status','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'joining_status', 'placeholder' => 'Joining Status', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                ?>
                                                  <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('joining_status'); ?></div></label>
                                               </div>

                                           </div>
                                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Sales</label>
                                              
                                                   <select id="sales"  class="form-control" name="sales">
                                                    <option value="">Select Sales</option>
                                                    <option value="0" <?php if(@$result->sales == "0"){ echo "selected"; }?>>N.A</option>
                                                        <?php if(!empty(@$emp)){
                                                            foreach($emp as $key=>$value){  ?>
                                                              <?php if($value->department_id == 1){?>    
                                                              <option <?php if(@$result->sales == $value->id){ echo "selected"; }?> value="<?php echo $value->id;?>"><?php echo $value->first_name.' '.$value->last_name.' ( '.$value->depart.' )';?></option>
                                                                
                                                       <?php } }}?>
                                                </select> 
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('sales'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Recruiter</label>
                                              
                                                   <select id="recruiter"  class="form-control" name="recruiter">
                                                    <option value="">Select Recruiter</option>
                                                    <option value="0" <?php if(@$result->recruiter == "0"){ echo "selected"; }?>>N.A</option>
                                                        <?php if(!empty(@$emp)){
                                                            foreach($emp as $key=>$value){  ?>
                                                              <?php if($value->department_id == 2){?>    
                                                              <option <?php if(@$result->recruiter == $value->id){ echo "selected"; }?> value="<?php echo $value->id;?>"><?php echo $value->first_name.' '.$value->last_name.' ( '.$value->depart.' )';?></option>
                                                                
                                                       <?php } }}?>
                                                </select> 
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('recruiter'); ?></div></label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Team Lead</label>
                                              
                                                   <select id="team_lead_id"  class="form-control" name="team_lead_id">
                                                    <option value="">Select Team Lead</option>
                                                    <option value="0" <?php if(@$result->team_lead_id == "0"){ echo "selected"; }?>>N.A</option>
                                                        <?php if(!empty(@$emp)){
                                                            foreach($emp as $key=>$value){  ?>
                                                              <?php if($value->desg_id == 4){?>    
                                                              <option <?php if(@$result->team_lead_id == $value->id){ echo "selected"; }?> value="<?php echo $value->id;?>"><?php echo $value->first_name.' '.$value->last_name.' ( '.$value->depart.' )';?></option>
                                                                
                                                       <?php } }}?>
                                                </select> 
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('sales'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                   <label for="inputEmail4">Details If Any</label>
                                                  <?php  $name = @$result->details;
                                                   $postvalue = @$_POST['details'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                   echo form_input(array('name' => 'details','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'details', 'placeholder' => 'Details', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                ?>
                                                  <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('details'); ?></div></label>
                                               </div>
                                            </div>
                                            
                                            <div class="form-row">
                                           

                                                <div class="form-group col-md-6">
                                                    <label for="inputState2">Status*</label>
                                                        <select id="inputState2" class="form-control" name="status">
                                                        <option <?php if(@$result->emp_status == 'Active') echo "selected";?> value="Active">Active</option>
                                                        <option <?php if(@$result->emp_status == 'Inactive') echo "selected";?> value="Inactive">Inactive</option>

                                                           
                                                        </select>
                                                
                                                </div> 
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="checkbox checkbox-circle checkbox-info peers ai-c text-center">
                                                   <div class="peer"> 
                                                   
                                                   <button type="submit" class="btn btn-primary"> Submit </button>
                                                   <a href="<?php echo base_url('master/consultant/');?>"><button type="button" class="btn btn-primary"> Cancel </button></a>

                                                   
                                                   </div>
                                                </div>
                                            </div>
                                        </form>
									</div>
								</div>
	    					</div>
                        </div>
                    </div>
                           
                        </div>
                    </div>
                </div>
            </main>


<script>
 $.validator.addMethod("leters_space",function(value,element){
        if(value=='' || value==null)
        {
            return true;
        }
        return  /^[A-Za-z]+( [A-Za-z]+)*$/.test(value);
},'');  


$('#duration_id').change(function(val_id) {
//  console.log(val);
 var selectedCountry = $(this).children("option:selected").text();
 selectedCountry = selectedCountry.split(' ')
  if(val_id != ''){
    calculatedate($('#datepicker').val(), selectedCountry[0])
  }
});

function calculatedate(date, daysop){
daysop = parseInt(daysop)
console.log(daysop)
 var dateString =  moment(date,'DD-MM-YYYY').add(daysop, 'M').format('DD-MM-YYYY');
 $('#end_date').val(dateString)
}

$( function() {
    $( "#datepicker" ).datepicker({ 
        
        dateFormat: "dd-mm-yy",
        setDate:new Date(),
        onSelect: function(selected,evnt) {
            var selectedCountry = $('#duration_id').children("option:selected").text();
                selectedCountry = selectedCountry.split(' ')
            calculatedate(selected, selectedCountry[0]);
            }
        })
  } );
  
$('#ciatyform_id').validate({
    rules:{
        first_name:{
            required:true,
        },
        last_name:{
            required:true,
        },
        visa_id:{
            required:true,
        },
        skills:{
            required:true,
        },
        client_id:{
            required:true,
        },
        duration_id:{
            required:true,
        },
        project_start_date:{
            required:true,
        },
        project_end_date:{
            required:true,
        },
        aa_job_type:{
            required:true,
        },
        pay_bill:{
            required:true,
        },
        bill_rate:{
            required:true,
        },
        mobile:{
            required:true,
        },
        email:{
            required:true,
        },
        joining_status:{
            required:true,
        },
        sales:{
            required:true,
        },
        recruiter:{
            required:true,
        },
        team_lead_id:{
            required:true,
        },
        status:{
            required:true,
        },
    },
    messages:{
        first_name:{
            required:'<div style="color:red"> First Name field is required.</div>',
        },
        last_name:{
            required:'<div style="color:red"> Last Name field is required.</div>',
        },
        visa_id:{
            required:'<div style="color:red"> Visa Type field is required.</div>',
        },
        skills:{
            required:'<div style="color:red"> Skills field is required.</div>',
        },
        client_id:{
            required:'<div style="color:red"> Client field is required.</div>',
        },
        duration_id:{
            required:'<div style="color:red"> Project Duration field is required.</div>',
        },
        project_start_date:{
            required:'<div style="color:red"> Start Date field is required.</div>',
        },
        project_end_date:{
            required:'<div style="color:red"> End Date field is required.</div>',
        },
        aa_job_type:{
            required:'<div style="color:red"> Job Type field is required.</div>',
        },
        pay_bill:{
            required:'<div style="color:red"> Pay Bill field is required.</div>',
        },
        bill_rate:{
            required:'<div style="color:red"> Bill Rate field is required.</div>',
        },
        mobile:{
            required:'<div style="color:red"> Mobile field is required.</div>',
        },
        email:{
            required:'<div style="color:red"> Email field is required.</div>',
        },
        joining_status:{
            required:'<div style="color:red"> Joining Status field is required.</div>',
        },
        sales:{
            required:'<div style="color:red"> Sales field is required.</div>',
        },
        recruiter:{
            required:'<div style="color:red"> Recruiter field is required.</div>',
        },
        team_lead_id:{
            required:'<div style="color:red"> Team Lead field is required.</div>',
        },
        status:{
            required:'<div style="color:red"> Status field is required.</div>',
        },
    }
});


</script>

