
<main id="myclsid" class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="container-fluid">
                        <!--<h4 class="c-grey-900 mT-10 mB-30"> List </h4>-->
                        <div class="row">
                            <div class="masonry-item col-md-12">
                                <div class="bgc-white p-20 bd">
                                    <h6 class="c-grey-900">Add Skills Name</h6>
                                     <?=get_flashdata();?>
                                    <div class="mT-30">
                                        <?php echo form_open_multipart('', array('class' => '', 'id' => 'ciatyform_id',)); ?>
                                            <div class="form-row">
                                           
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Add Skills Name*</label>
                                                    <!-- <input type="text" name="city_name" value="<?php echo set_value('city_name') ?>"   class="form-control"  placeholder="City Name"> -->
                                                   <?php  $name = @$result->skill_name;
                                                    $postvalue = @$_POST['skill_name'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'skill_name','type'=>'text','maxlength'=>'150', 'class' => 'form-control', 'id' => 'cate_id', 'placeholder' => 'Add Skills Name', 'value' => !empty($postvalue) ? $postvalue : $name ,'onkeyup'=>'validate_character(this)'));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('skill_name'); ?></div></label>
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
                                                   <a href="<?php echo base_url('master/skills/');?>"><button type="button" class="btn btn-primary"> Cancel </button></a>

                                                   
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
        skill_name:{
            required:true,
        }
    },
    messages:{
        skill_name:{
         required:'<div style="color:red">Skills Name field is required.</div>',        
        }
    }
});


</script>

