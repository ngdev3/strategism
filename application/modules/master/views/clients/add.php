
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
                                                   <?php  $name = @$result->client_name;
                                                    $postvalue = @$_POST['client_name'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'client_name','maxlength'=>'25', 'class' => 'form-control', 'id' => 'client_name', 'placeholder' => 'End Client Name', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('client_name'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Client End Client*</label>
                                                    <select id="end_client_id"  class="form-control" name="end_client_id">
                                                    <option value="">Select End Client</option>
                                                    <?php
                                                    if(!empty($countrydata)){
                                                        foreach($countrydata as $key=>$value){
                                                    ?>
                                                    <option value="<?php echo $value->end_client_id;?>" <?php if($value->end_client_id == @$result->end_client_id) {echo "selected";}?> 
                                                    
                                                   
                                                    
                                                    ><?php echo $value->end_client_name;?></option>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('end_client_id'); ?></div></label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                           
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Payment Terms*</label>
                                                    <select id="payment_term_id"  class="form-control" name="payment_term_id">
                                                    <option value="">Select Payment Terms</option>
                                                    <?php
                                                    if(!empty($payment_terms)){
                                                        foreach($payment_terms as $key=>$value){
                                                    ?>
                                                    <option value="<?php echo $value->payment_term_id;?>" <?php if($value->payment_term_id == @$result->payment_term_id) {echo "selected";}?> 
                                                    
                                                   
                                                    
                                                    ><?php echo $value->term_days .' Days';?></option>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('mobile_no'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Client Email</label>
                                                   <?php  $name = @$result->email;
                                                    $postvalue = @$_POST['email'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'email','type'=>'email','maxlength'=>'25', 'class' => 'form-control', 'id' => 'cate_id', 'placeholder' => 'Email', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('email'); ?></div></label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                           
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Client Contact Person </label>
                                                   <?php  $name = @$result->contact_person;
                                                    $postvalue = @$_POST['contact_person'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'contact_person','maxlength'=>'25', 'class' => 'form-control', 'id' => 'cate_id', 'placeholder' => 'Contact Person', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('contact_person'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Client Zip Code*</label>
                                                   <?php  $name = @$result->client_zipcode;
                                                    $postvalue = @$_POST['client_zipcode'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'client_zipcode','maxlength'=>'25', 'class' => 'form-control', 'id' => 'client_zipcode', 'placeholder' => 'Zip Code', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('client_zipcode'); ?></div></label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputState2">Status*</label>
                                                        <select id="inputState2" class="form-control" name="status">
                                                            <option value="Active">Active</option>
                                                            <option value="Inactive">Inactive</option>
                                                           
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

$('#ciatyform_id').validate({
    rules:{
        end_client_name:{
            required:true,
        },
        end_client_location:{
            required:true,
        },
        end_client_zipcode:{
            required:true,
        }
    },
    messages:{
        end_client_name:{
         required:'<div style="color:red">Client Name field is required.</div>',        
        },
        end_client_location:{
         required:'<div style="color:red">Client Location field is required.</div>',        
        },
        end_client_zipcode:{
         required:'<div style="color:red">Client Zipcode field is required.</div>',        
        }
    }
});


</script>

