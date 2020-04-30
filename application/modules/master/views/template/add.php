
<main id="myclsid" class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="container-fluid">
                        <!--<h4 class="c-grey-900 mT-10 mB-30"> List </h4>-->
                        <div class="row">
                            <div class="masonry-item col-md-12">
                                <div class="bgc-white p-20 bd">
                                    <h6 class="c-grey-900">Add Client</h6>
                                     <?=get_flashdata();?>
                                    <div class="mT-30">
                                        <?php echo form_open_multipart('', array('class' => '', 'id' => 'ciatyform_id',)); ?>
                                            <div class="form-row">
                                           
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Template Name*</label>
                                                   <?php  $name = @$result->template_name;
                                                    $postvalue = @$_POST['template_name'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'template_name','maxlength'=>'150', 'class' => 'form-control', 'id' => 'template_name', 'placeholder' => 'Template Name', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('template_name'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Content</label>
                                                   <?php  $name = @$result->content;
                                                    $postvalue = @$_POST['content'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'content','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'content', 'placeholder' => 'Content', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('content'); ?></div></label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                           
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Heading</label>
                                                   <?php  $name = @$result->heading;
                                                    $postvalue = @$_POST['heading'];
                                                    echo form_input(array('name' => 'heading','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'heading', 'placeholder' => 'Heading', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('heading'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">App ID</label>
                                                   <?php  $name = @$result->app_id;
                                                    $postvalue = @$_POST['app_id'];
                                                    echo form_input(array('name' => 'app_id','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'app_id', 'placeholder' => 'app_id', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('app_id'); ?></div></label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                           
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Big Picture URL</label>
                                                   <?php  $name = @$result->big_picture;
                                                    $postvalue = @$_POST['big_picture'];
                                                    echo form_input(array('name' => 'big_picture','maxlength'=>'150', 'class' => 'form-control', 'id' => 'big_picture', 'placeholder' => 'Big Picture Url', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('big_picture'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState2">Time*</label>
                                                        <select id="inputState2" class="form-control" name="time">
                                                        <option value="">Select Time</option>
                                                        <option <?php if(@$result->time == 'daily') echo "selected";?> value="daily">Daily</option>
                                                        <option <?php if(@$result->time == 'once') echo "selected";?> value="once">Once</option>
                                                        <option <?php if(@$result->time == 'once_in_a_week') echo "selected";?> value="once_in_a_week">Once In A Week</option>
                                                        <option <?php if(@$result->time == 'once_in_a_month') echo "selected";?> value="once_in_a_month">Once In A Month</option>

                                                        </select>
                                                
                                                </div> 
                                            </div>
                                            <div class="form-row">
                                        
                                        
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4">API Key</label>
                                                   <?php  $name = @$result->api_key;
                                                    $postvalue = @$_POST['api_key'];
                                                    echo form_input(array('name' => 'api_key','maxlength'=>'250', 'class' => 'form-control', 'id' => 'api_key', 'placeholder' => 'API Key', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('api_key'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState2">Status*</label>
                                                        <select id="inputState2" class="form-control" name="status">
                                                        <option <?php if(@$result->status == 'Active') echo "selected";?> value="Active">Active</option>
                                                        <option <?php if(@$result->status == 'Inactive') echo "selected";?> value="Inactive">Inactive</option>

                                                        </select>
                                                
                                                </div> 
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="checkbox checkbox-circle checkbox-info peers ai-c text-center">
                                                   <div class="peer"> 
                                                   
                                                   <button type="submit" class="btn btn-primary"> Submit </button>
                                                   <a href="<?php echo base_url('master/template/');?>"><button type="button" class="btn btn-primary"> Cancel </button></a>

                                                   
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
        template_name:{
            required:true,
        },
        content:{
            required:true,
        },
        heading:{
            required:true,
        },
        app_id:{
            required:true,
        },
        big_picture:{
            required:true,
        },
        time:{
            required:true,
        },
        status:{
            required:true,
        },
    },
    messages:{
        template_name:{
         required:'<div style="color:red">Template Name field is required.</div>',        
        },
        content:{
         required:'<div style="color:red">Content field is required.</div>',        
        },
        heading:{
         required:'<div style="color:red"> Heading field is required.</div>',        
        },
        app_id:{
         required:'<div style="color:red">App Id field is required.</div>',        
        },
        big_picture:{
         required:'<div style="color:red">Big Picture field is required.</div>',        
        },
        time:{
         required:'<div style="color:red">Time field is required.</div>',        
        },
        status:{
         required:'<div style="color:red">Status field is required.</div>',        
        },
    }
});


</script>

