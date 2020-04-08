
<main id="myclsid" class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="container-fluid">
                        <!--<h4 class="c-grey-900 mT-10 mB-30"> List </h4>-->
                        <div class="row">
                            <div class="masonry-item col-md-12">
                                <div class="bgc-white p-20 bd">
                                    <h6 class="c-grey-900">Add End Clients</h6>
                                     <?=get_flashdata();?>
                                    <div class="mT-30">
                                        <?php echo form_open_multipart('', array('class' => '', 'id' => 'ciatyform_id',)); ?>
                                            <div class="form-row">
                                           
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">End Client Name*</label>
                                                   <?php  $name = @$result->end_client_name;
                                                    $postvalue = @$_POST['end_client_name'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'end_client_name','maxlength'=>'150', 'class' => 'form-control', 'id' => 'end_client_name', 'placeholder' => 'End Client Name', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('end_client_name'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">End Client Location*</label>
                                                   <?php  $name = @$result->end_client_location;
                                                    $postvalue = @$_POST['end_client_location'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'end_client_location','maxlength'=>'150', 'class' => 'form-control', 'id' => 'end_client_location', 'placeholder' => 'End Client Location', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('end_client_location'); ?></div></label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                           
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">End Client Phone</label>
                                                   <?php  $name = @$result->mobile_no;
                                                    $postvalue = @$_POST['mobile_no'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'mobile_no','maxlength'=>'150', 'class' => 'form-control', 'id' => 'cate_id', 'placeholder' => 'Mobile Number', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('mobile_no'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Add End Client Email</label>
                                                   <?php  $name = @$result->email;
                                                    $postvalue = @$_POST['email'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'email','type'=>'email','maxlength'=>'150', 'class' => 'form-control', 'id' => 'cate_id', 'placeholder' => 'Email', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('email'); ?></div></label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                           
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">End Client Contact Person </label>
                                                   <?php  $name = @$result->contact_person;
                                                    $postvalue = @$_POST['contact_person'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'contact_person','maxlength'=>'150', 'class' => 'form-control', 'id' => 'cate_id', 'placeholder' => 'Contact Person', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('contact_person'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Add End Client Zip Code*</label>
                                                   <?php  $name = @$result->end_client_zipcode;
                                                    $postvalue = @$_POST['end_client_zipcode'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'end_client_zipcode','maxlength'=>'150', 'class' => 'form-control', 'id' => 'end_client_zipcode', 'placeholder' => 'Zip Code', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('end_client_zipcode'); ?></div></label>
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
                                                   <a href="<?php echo base_url('master/payment_terms/');?>"><button type="button" class="btn btn-primary"> Cancel </button></a>

                                                   
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

