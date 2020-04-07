
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
                                                    <label for="inputEmail4">Client Name*</label>
                                                    <select id="client_id"  class="form-control" name="client_id"  onchange="myclient(this)">
                                                    <option value="">Select Client Name</option>
                                                        <?php if(!empty(@$billTo) ){
                                                             foreach($billTo as $key=>$value){  ?>
                                                              <option data-client_name="<?= $value->client_name; ?>" data-client_address="<?= $value->client_address; ?>" data-zipcode="<?= $value->client_zipcode; ?>" data-term_days="<?= $value->term_days; ?>" <?php if(@$result->client_id == $value->client_id){ echo "selected"; }?>  value="<?php echo $value->client_id;?>"><?php echo $value->client_name;?></option>
                                                       <?php }}?>
                                                    </select>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('client_id'); ?></div></label>
                                                </div>
                                           <script>

                                               <?php if(@$result->client_id){?>
                                                setTimeout(() => {
                                                    
                                                    myclient('5');
                                                    myclients('5');
                                                }, 100);
                                               <?php }?>
                                                 function myclient(id){
       var terms =  $("#client_id :selected").attr('data-term_days');
       var address =  $("#client_id :selected").attr('data-client_address');
       var client_zipcode =  $("#client_id :selected").attr('data-zipcode');
       var client_name =  $("#client_id :selected").attr('data-client_name');

       $('#client_name').val(client_name)
       $('#address').val(address)
       $('#term_days').val(terms+" Days")
       $('#zip_code').val(client_zipcode)
      // alert(client_zipcode)
       
    }
                                           </script>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Client Terms*</label>
                                                   <?php  $name = @$result->term_days;
                                                    $postvalue = @$_POST['term_days'];
                                                    echo form_input(array('readonly'=>'readonly','name' => 'term_days','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'term_days', 'placeholder' => 'Term Days', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('term_days'); ?></div></label>
                                                </div>

                                            </div>
                                            <div class="form-row">
                                           
                                                                   
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Client Address*</label>
                                                   <?php  $name = @$result->address;
                                                    $postvalue = @$_POST['address'];
                                                    echo form_input(array('readonly'=>'readonly','name' => 'address','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'address', 'placeholder' => 'Client Address', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('address'); ?></div></label>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Zip Code*</label>
                                                   <?php  $name = @$result->zip_code;
                                                    $postvalue = @$_POST['zip_code'];
                                                    echo form_input(array('name' => 'zip_code','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'zip_code', 'placeholder' => 'Zip Code', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('zip_code'); ?></div></label>
                                                </div>
                                                
                                                  
                                               
</div>
<div class="form-row">
                                           
                                           <?php //pr(@$result); die; ?>
                                           
                                                  
                                           <div class="form-group col-md-6">
                                                <label for="inputEmail4">Consultant*</label>
                                                <select id="consultant_id"  class="form-control" name="consultant_id" onchange="myclients(this)">
                                                <option value="">Select Consultant</option>
                                                    <?php if(!empty(@$consultant) ){
                                                        foreach($consultant as $key=>$value){  ?>
                                                            <option data-bill_rate="<?= $value->bill_rate; ?>" data-consultant_name="<?= $value->consultant_name; ?>" data-skill_name="<?= $value->skill_name; ?>" <?php if(@$result->consultant_id == $value->id){ echo "selected"; }?>  value="<?php echo $value->id;?>"><?php echo $value->consultant_name.' ( Skills: '.$value->skill_name.', Bill Rate: $'.$value->bill_rate.'</b>)'?></option>
                                                    <?php }}?>
                                            </select>
                                                <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('consultant_id'); ?></div></label>
                                            </div>

                                            <script>
                                                 function myclients(id){
       var bill_rate =  $("#consultant_id :selected").attr('data-bill_rate');
       var consultant_name =  $("#consultant_id :selected").attr('data-consultant_name');
       var skill_name =  $("#consultant_id :selected").attr('data-skill_name');
//alert(bill_rate)
       $('#bill_rate').val("$"+bill_rate)
       $('#consultant_name').val(consultant_name)
       $('#skills').val(skill_name)
       
    }
                                           </script>

                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Bill Rate*</label>
                                                   <?php  $name = @$result->bill_rate;
                                                    $postvalue = @$_POST['bill_rate'];
                                                    echo form_input(array('readonly'=>'readonly','name' => 'bill_rate','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'bill_rate', 'placeholder' => 'Bill Rate', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('bill_rate'); ?></div></label>
                                                </div>
                                        </div>


                                            <div class="form-row">
                                           
                                                                   
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Skills*</label>
                                                   <?php  $name = @$result->skills;
                                                    $postvalue = @$_POST['skills'];
                                                    echo form_input(array('readonly'=>'readonly','name' => 'skills','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'skills', 'placeholder' => 'Skills', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('skills'); ?></div></label>
                                                </div>

                                                <div class="form-group col-md-6">
                                                <label for="inputEmail4">Enclosed*</label>
                                                <select id="enclosed"  class="form-control" name="enclosed" >
                                                <option value="">Select Enclosed</option>
                                                <option value="na" <?php if(@$result->enclosed_type == 'na'){ echo  "selected";}?>>N.A</option>
                                                <option value="timesheet"  <?php if(@$result->enclosed_type == 'timesheet'){ echo  "selected";}?>>TimeSheet</option>
                                                   
                                            </select>
                                                <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('enclosed'); ?></div></label>
                                            </div>
                                                
                                                  
                                               
</div>

<div class="form-row">
                                           
                                                                   
                                           <div class="form-group col-md-6">
                                                   <label for="inputEmail4">Hours*</label>
                                                  <?php  $name = @$result->hours;
                                                   $postvalue = @$_POST['hours'];
                                                   echo form_input(array('text'=>'number','name' => 'hours','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'hours', 'placeholder' => 'hours', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'recal(this)'));
                                                ?>
                                                  <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('hours'); ?></div></label>
                                               </div>

                                               <script>
function recal(id){
var bill_rate =  $("#consultant_id :selected").attr('data-bill_rate');
var hours = $('#hours').val();
if(bill_rate == undefined || bill_rate == ''){
    jAlert('Select Bill Rate First');
    $('#hours').val("");
    return
}
if(hours == undefined || hours == ''){
    jAlert('Enter Hours');
    $('#due_amount').val("");
    return
}
var tt = hours * bill_rate;
$('#due_amount').val("$"+tt)
calstartdate();
//alert(hours * bill_rate)
}
                                               </script>
                                               <div class="form-group col-md-6">
                                                   <label for="inputEmail4">Due Amount*</label>
                                                  <?php  $name = @$result->due_amount;
                                                   $postvalue = @$_POST['due_amount'];
                                                   echo form_input(array('readonly'=>'readonly','text'=>'number','name' => 'due_amount','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'due_amount', 'placeholder' => 'Due Amount', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                ?>
                                                  <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('hours'); ?></div></label>
                                               </div>
                                               
                                                 
                                              
</div>

                                            <div class="form-row">
                                           
                                                                   
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Start Date *</label>
                                                   <?php  
                                                        $name = @$result->start_date;
                                                        $middles = strtotime($name);             // returns bool(false)
                                                        $new_dates = date('d-m-Y', $middles);            
                
                                                        $postvalue = date('d-m-Y');//@$_POST['billing_date'];
                                                        echo form_input(array('name' => 'start_date', 'maxlength'=>'150', 'class' => 'form-control', 'id'=>'start_date', 'placeholder' => 'Start Date', 'value' => !empty($name) ? $new_dates : $postvalue ,'onchange'=>'calstartdate(this)')); ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('start_date'); ?></div></label>
                                                </div>

                                                                                         
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">End Date *</label>
                                                   <?php  
                                                        $name = @$result->end_date;
                                                        $middles = strtotime($name);             // returns bool(false)
                                                        $new_dates = date('d-m-Y', $middles);            
                
                                                        $postvalue = date('d-m-Y');//@$_POST['billing_date'];
                                                        echo form_input(array('name' => 'end_date', 'maxlength'=>'150', 'class' => 'form-control', 'id'=>'end_date', 'placeholder' => 'End Date', 'value' => !empty($name) ? $new_dates : $postvalue )); ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('end_date'); ?></div></label>
                                                </div>
                                                
                                                  
                                               
</div>

                                            <div class="form-row">
                                           
                                                                   
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Due Date *</label>
                                                   <?php  
                                                        $name = @$result->due_date;
                                                        $middles = strtotime($name);             // returns bool(false)
                                                        $new_dates = date('d-m-Y', $middles);            
                
                                                        $postvalue = date('d-m-Y');//@$_POST['billing_date'];
                                                        echo form_input(array('readonly' => 'readonly','name' => 'due_date', 'maxlength'=>'150', 'class' => 'form-control', 'id'=>'due_date', 'placeholder' => 'Due Date', 'value' => !empty($name) ? $new_dates : $postvalue )); ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('due_date'); ?></div></label>
                                                </div>

                                               <div class="form-group col-md-6">
                                                   <label for="inputEmail4">Old Invoice Number</label>
                                                  <?php  $name = @$result->old_invoice_number;
                                                   $postvalue = @$_POST['old_invoice_number'];
                                                   echo form_input(array('text'=>'number','name' => 'old_invoice_number','type'=>'number','maxlength'=>'150', 'class' => 'form-control', 'id' => 'old_invoice_number', 'placeholder' => 'Old Invoice Number', 'value' => !empty($postvalue) ? $postvalue : $name));
                                                ?>
                                                  <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('old_invoice_number'); ?></div></label>
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
                                                   
                                                   <button type="submit" class="btn btn-primary">Generate Invoice</button>
                                                   <a href="<?php echo base_url('master/invoice/');?>"><button type="button" class="btn btn-primary"> Cancel </button></a>

                                                   
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




function calstartdate(){
    date =  $('#start_date').val()
    daysop =  terms =  $("#client_id :selected").attr('data-term_days');
if(daysop == '' || daysop == undefined){
    jAlert("Select Client Name First")
    return
}
daysop = parseInt(daysop)
console.log(daysop)
 var dateString =  moment(date,'DD-MM-YYYY').add(daysop, 'day').format('DD-MM-YYYY');
 $('#due_date').val(dateString)
}

$( function() {
    $( "#end_date, #start_date" ).datepicker({ 
        
        dateFormat: "dd-mm-yy",
      //  setDate:<?php if(@$new_dates) { echo $new_dates; } else { date('d-m-Y'); } ?>,
        onSelect: function(selected,evnt) {
            
                calstartdate();
            }
        })
  } );
  
$('#ciatyform_id').validate({
    rules:{
        client_id:{
            required:true,
        },
        start_date:{
            required:true,
        },
        end_date:{
            required:true,
        },
        consultant_id:{
            required:true,
        },
        hours:{
            required:true,
        },
        enclosed:{
            required:true,
        },
        due_amount:{
            required:true,
        },
        status:{
            required:true,
        },
        
    },
    messages:{
        client_id:{
            required:'<div style="color:red">Client field is required.</div>',
        },
        start_date:{
            required:'<div style="color:red">Start Date field is required.</div>',
        },
        end_date:{
            required:'<div style="color:red">End Date field is required.</div>',
        },
        consultant_id:{
            required:'<div style="color:red">Consultant field is required.</div>',
        },
        hours:{
            required:'<div style="color:red">Hours field is required.</div>',
        },
        enclosed:{
            required:'<div style="color:red">Enclosed field is required.</div>',
        },
        due_amount:{
            required:'<div style="color:red">Due Amount field is required.</div>',
        },
        status:{
            required:'<div style="color:red">Status field is required.</div>',
        }
    }
});


</script>

