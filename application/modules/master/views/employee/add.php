
<main id="myclsid" class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="container-fluid">
                        <!--<h4 class="c-grey-900 mT-10 mB-30"> List </h4>-->
                        <div class="row">
                            <div class="masonry-item col-md-12">
                                <div class="bgc-white p-20 bd">
                                    <h6 class="c-grey-900">Add Payment Term Days</h6>
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
                                                    <label for="inputEmail4">Last Name *</label>
                                                   <?php  $name = @$result->last_name;
                                                    $postvalue = @$_POST['last_name'];
                                                    echo form_input(array('name' => 'last_name','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Last Name', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('last_name'); ?></div></label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                           
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Designation*</label>
                                                    <select id="desg_id"  class="form-control" name="desg_id">
                                                    <option value="">Select Designation</option>
                                                        <?php if(!empty(@$emp_cat) ){
                                                             foreach($emp_cat as $key=>$value){  ?>
                                                       <?php if($value->isdepartment == 0){?>      
                                                              <option <?php if(@$result->desg_id == $value->id){ echo "selected"; }?>  value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
                                                       
                                                       <?php }?>      
                                                       
                                                       <?php }}?>
                                                </select>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('desg_id'); ?></div></label>
                                                </div>
                                                  
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Department*</label>
                                                    <select id="department_id"  class="form-control" name="department_id">
                                                    <option value="">Select Department</option>
                                                        <?php if(!empty(@$emp_cat) ){
                                                             foreach($emp_cat as $key=>$value){  ?>
                                                       <?php if($value->isdepartment == 1){?>      
                                                              <option <?php if(@$result->department_id == $value->id){ echo "selected"; }?>  value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
                                                       
                                                       <?php }?>      
                                                       
                                                       <?php }}?>
                                                </select>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('department_id'); ?></div></label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                           
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Pan Number*</label>
                                                   <?php  $name = @$result->pan_number;
                                                    $postvalue = @$_POST['pan_number'];
                                                    echo form_input(array('name' => 'pan_number','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'pan_number', 'placeholder' => 'Pan Number', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('pan_number'); ?></div></label>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Emp Code*</label>
                                                   <?php  $name = @$result->emp_code;
                                                    $postvalue = @$_POST['emp_code'];
                                                    echo form_input(array('name' => 'emp_code','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'emp_code', 'placeholder' => 'Emp Code', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('emp_code'); ?></div></label>
                                                </div>

                                   
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Date Of Birth *</label>
                                                   <?php  
                                                        $name = @$result->dob;

                                                        $middles = strtotime($name);             // returns bool(false)
                                                        $new_dates = date('d-m-Y', $middles);            
                
                                                      // pr($new_dates); die;
                                                       $postvalue = date('d-m-Y');//@$_POST['billing_date'];
                                                        echo form_input(array('name' => 'dob', 'maxlength'=>'150', 'class' => 'form-control', 'id' => 'dob', 'placeholder' => 'Date of Birth', 'value' => !empty($name) ? $new_dates : $postvalue )); ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('dob'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Date of Joining *</label>
                                                   <?php  
                                                        $name = @$result->doj;
                                                        $middles = strtotime($name);             // returns bool(false)
                                                        $new_dates = date('d-m-Y', $middles);            
                
                                                        $postvalue = date('d-m-Y');//@$_POST['billing_date'];
                                                        echo form_input(array('name' => 'doj', 'maxlength'=>'150', 'class' => 'form-control', 'id'=>'doj', 'placeholder' => 'Date Of Joining', 'value' => !empty($name) ? $new_dates : $postvalue )); ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('doj'); ?></div></label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-row">
                                           
                                              
                                          
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Bank Name*</label>
                                                   <?php  $name = @$result->bank_name;
                                                    $postvalue = @$_POST['bank_name'];
                                                    echo form_input(array('name' => 'bank_name','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'bank_name', 'placeholder' => 'Bank Name', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('bank_name'); ?></div></label>
                                                </div>

                                   
                                       
                                               

                                              
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Account Number*</label>
                                                   <?php  $name = @$result->account_number;
                                                    $postvalue = @$_POST['account_number'];
                                                    echo form_input(array('name' => 'account_number','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'account_number', 'placeholder' => 'Account Number', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('account_number'); ?></div></label>
                                                </div>

                                            </div>
                                            <div class="form-row">
                                           
                                              
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Mobile Number*</label>
                                                   <?php  $name = @$result->mobile;
                                                    $postvalue = @$_POST['mobile'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'mobile','type'=>'number','maxlength'=>'150', 'class' => 'form-control', 'id' => 'mobile', 'placeholder' => 'Mobile Number', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('mobile'); ?></div></label>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Email*</label>
                                                   <?php  $name = @$result->email;
                                                    $postvalue = @$_POST['email'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'email','type'=>'email','maxlength'=>'150', 'class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('email'); ?></div></label>
                                                </div>

                                            </div>
                                          
                                            <div class="form-row">
                                           
                                              
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Address*</label>
                                                   <?php  $name = @$result->address;
                                                    $postvalue = @$_POST['address'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'address','type'=>'text','maxlength'=>'250', 'class' => 'form-control', 'id' => 'address', 'placeholder' => 'Address', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('address'); ?></div></label>
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
                                           
<?php //pr(@$result); die; ?>
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
                                                   <a href="<?php echo base_url('master/employee/');?>"><button type="button" class="btn btn-primary"> Cancel </button></a>

                                                   
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
    $( "#dob, #doj" ).datepicker({ 
        
        dateFormat: "dd-mm-yy",
      //  setDate:<?php if(@$new_dates) { echo $new_dates; } else { date('d-m-Y'); } ?>,
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
        desg_id:{
            required:true,
        },
        department_id:{
            required:true,
        },
        pan_number:{
            required:true,
        },
        emp_code:{
            required:true,
        },
        dob:{
            required:true,
        },
        doj:{
            required:true,
        },
        bank_name:{
            required:true,
        },
        account_number:{
            required:true,
        },
        mobile:{
            required:true,
        },
        email:{
            required:true,
        },
        address:{
            required:true,
        },
        status:{
            required:true,
        },
    },
    messages:{
        first_name:{
            required:'<div style="color:red">First Name field is required.</div>',
        },
        last_name:{
            required:'<div style="color:red">Last Name field is required.</div>',
        },
        desg_id:{
            required:'<div style="color:red">Designation field is required.</div>',
        },
        department_id:{
            required:'<div style="color:red">Department field is required.</div>',
        },
        pan_number:{
            required:'<div style="color:red">Pan Number field is required.</div>',
        },
        emp_code:{
            required:'<div style="color:red">Employee Code field is required.</div>',
        },
        dob:{
            required:'<div style="color:red">Date Of Birth field is required.</div>',
        },
        doj:{
            required:'<div style="color:red">Date Of Joining field is required.</div>',
        },
        bank_name:{
            required:'<div style="color:red">Bank Name field is required.</div>',
        },
        account_number:{
            required:'<div style="color:red">Account Number field is required.</div>',
        },
        mobile:{
            required:'<div style="color:red">Mobile Number field is required.</div>',
        },
        email:{
            required:'<div style="color:red">Email Id field is required.</div>',
        },
        address:{
            required:'<div style="color:red">Address field is required.</div>',
        },
        status:{
            required:'<div style="color:red">Status field is required.</div>',
        },
    }
});


</script>

