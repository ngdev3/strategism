
<main id="myclsid" class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="container-fluid">
                        <!--<h4 class="c-grey-900 mT-10 mB-30"> List </h4>-->
                        <div class="row">
                            <div class="masonry-item col-md-12">
                                <div class="bgc-white p-20 bd">
                                    <h6 class="c-grey-900">Add Billing Form</h6>
                                     <?=get_flashdata();
                                    // pr($result);
                                     ?>
                                    <div class="mT-30">
                                        <?php echo form_open_multipart('', array('class' => '', 'id' => 'ciatyform_id',)); ?>
                                            <div class="form-row">
                                           
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Billing Date *</label>
                                                   <?php  
                                                        $name = @$result->billing_date;
                                                        $postvalue = date('d-m-Y');//@$_POST['billing_date'];
                                                        echo form_input(array('readonly'=>'readonly','name' => 'billing_date', 'maxlength'=>'25', 'class' => 'form-control', 'id' => 'datepicker', 'placeholder' => 'Billing Date', 'value' => !empty($postvalue) ? $postvalue : $name )); ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('billing_date'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState2">Truck No *</label>
                                                    <?php  $nameS = @$result->truck_no;
                                                    $postvalueS = @$_POST['truck_no'];
                                                   // pr($postvalueS); die;
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('name' => 'truck_no','maxlength'=>'25', 'class' => 'form-control', 'id' => 'cate_id', 'placeholder' => 'Truck Number', 'value' => !empty($postvalueS) ? $postvalueS : $nameS ));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('truck_no'); ?></div></label>
                                                                                              
                                                </div> 
                                            </div>
                                            <div class="form-row">
                                           
                                           <div class="form-group col-md-6">
                                               <label for="inputEmail4">Challan No *</label>
                                              <?php  $name = @$result->challan_no;
                                               $postvalue = @$_POST['challan_no'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                               echo form_input(array('name' => 'challan_no','maxlength'=>'25', 'class' => 'form-control', 'id' => 'cate_id', 'placeholder' => 'Challan No.', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
                                              <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('challan_no'); ?></div></label>
                                           </div>
                                           <div class="form-group col-md-6">
                                               <label for="inputState2">Bill No. *</label>
                                               <?php  
                                               $name = @$result->bill_no;
                                               $postvalue = @$_POST['bill_no'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                               echo form_input(array('name' => 'bill_no','maxlength'=>'25', 'class' => 'form-control', 'id' => 'cate_id', 'placeholder' => 'Bill No', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
                                              <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('bill_no'); ?></div></label>
                                                                                         
                                           </div> 
                                           <?php 
                                                    // $name = @$result->bill_no;
                                                    //  $postvalue = @$_POST['quality'];
                                                    //   pr($postvalue); die;
                                                      ?>
                                       </div>
                                            <div class="form-row">
                                           
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Quality *</label>
                                                    <select id="inputState3"  class="form-control" name="quality" >
                                                    <option value="" >Select Quality</option>
                                                    <?php 
                                                    $name = @$result->quality;
                                                     $postvalue = @$_POST['quality'];
                                                     $val = !empty($postvalue)? $postvalue:$name;
                                                    //   pr($postvalueS); die;
                                                    if(!empty($quality)){
                                                           foreach($quality as $key=>$value){ ?>
                                                    <option <?php if($val == $value->quality_id){ echo "selected=selected";}?> value="<?php echo $value->quality_id;?>"><?php echo $value->name;?></option>
                                                    <?php } } ?>
                                                </select>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('quality'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState2">Product Quantity (MT / CFT) *</label>
                                                    <?php  $name = @$result->quantity;
                                                    $postvalue = @$_POST['quantity'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('type' =>'number' , 'step'=>'0.01', 'min' =>'0', 'min' =>'0', 'name' => 'quantity','maxlength'=>'25', 'class' => 'form-control', 'id' => 'quantity', 'placeholder' => 'Product Quantity', 'value' => !empty($postvalue) ? $postvalue : $name));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('quantity'); ?></div></label>
                                                                                              
                                                </div> 
                                            </div>
                                            <div class="form-row">
                                           
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Purchaser Name. *</label>
                                                    <select id="inputState3"  class="form-control" name="purchaser_name" >
                                                    <option value="" >Select Purchaser Name</option>
                                                    
                                                    <?php  
                                                     $name = @$result->purchaser_name;
                                                    $postvalue = @$_POST['purchaser_name'];
                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    if(!empty($purchaser)){
                                                           foreach($purchaser as $key=>$value){ ?>
                                                          
                                                    <option <?php if($val == $value->purchaser_id){ echo "selected=selected";}?> value="<?php echo $value->purchaser_id;?>"><?php echo $value->name;?></option>
                                                    <?php } } ?>
                                                </select>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('purchaser_name'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState2">Purchaser Rate. *</label>
                                                    <?php  $name = @$result->purchaser_rate;
                                                    $postvalue = @$_POST['purchaser_rate'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('type' =>'number' , 'step'=>'0.01', 'min' =>'0', 'name' => 'purchaser_rate','maxlength'=>'25', 'class' => 'form-control', 'id' => 'p_rate', 'placeholder' => 'Purchaser Rate.', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('purchaser_rate'); ?></div></label>
                                                                                              
                                                </div> 
                                            </div>
                                            <div class="form-row">
                                           
                                                <div class="form-group col-md-6">
                                                    <label for="inputState2">Purchaser Amount. *</label>
                                                    <?php  $name = @$result->purchaser_amount;
                                                    $postvalue = @$_POST['purchaser_amount'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('readonly'=>'readonly', 'type' =>'number' , 'step'=>'0.01', 'min' =>'0', 'name' => 'purchaser_amount','maxlength'=>'25', 'class' => 'form-control', 'id' => 'p_amount', 'placeholder' => 'Purchaser Amount.', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('purchaser_amount'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState2">Site Name. </label>
                                                    <select id="inputState3"  class="form-control" name="site_name" >
                                                    <option value="" >Select Site Name</option>
                                                    <?php  
                                                      $name = @$result->site_name;
                                                      $postvalue = @$_POST['site_name'];
                                                      $val = !empty($postvalue)? $postvalue:$name;
                                                   // $postvalue = @$_POST['site_name'];
                                                    
                                                    if(!empty($site)){
                                                           foreach($site as $key=>$value){ ?>
                                                          
                                                    <option <?php if($val == $value->site_id){ echo "selected=selected";}?> value="<?php echo $value->site_id;?>"><?php echo $value->name;?></option>
                                                    <?php } } ?>
                                                </select>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('site_name'); ?></div></label>
                                                                                              
                                                </div> 
                                            </div>
                                            <div class="form-row">
                                           
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Seller Name *</label>
                                                    <select id="inputState3"  class="form-control" name="seller_name" >
                                                    <option value="" >Select Seller Name</option>
                                                    <?php  
                                                    
                                                   // $postvalue = @$_POST['seller_name'];
                                                    $name = @$result->seller_name;
                                                    $postvalue = @$_POST['seller_name'];
                                                    $val = !empty($postvalue)? $postvalue:$name;


                                                    if(!empty($seller)){
                                                           foreach($seller as $key=>$value){ ?>
                                                          
                                                    <option <?php if($val == $value->seller_id){ echo "selected=selected";}?> value="<?php echo $value->seller_id;?>"><?php echo $value->name;?></option>
                                                    <?php } } ?>
                                                </select>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('seller_name'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState2">Seller Rate. *</label>
                                                    <?php  $name = @$result->seller_rate;
                                                    $postvalue = @$_POST['seller_rate'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('type' =>'number' , 'step'=>'0.01', 'min' =>'0', 'name' => 'seller_rate','maxlength'=>'25', 'class' => 'form-control', 'id' => 's_rate', 'placeholder' => 'Seller Rate.', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('seller_rate'); ?></div></label>
                                                                                              
                                                </div> 
                                            </div>
                                            <div class="form-row">
                                           
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Seller Amount *</label>
                                                   <?php  $name = @$result->seller_amount;
                                                    $postvalue = @$_POST['seller_amount'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('readonly'=>'readonly', 'type' =>'number' , 'step'=>'0.01', 'min' =>'0', 'name' => 'seller_amount','maxlength'=>'25', 'class' => 'form-control', 'id' => 's_amount', 'placeholder' => 'Seller Amount', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('seller_amount'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState2">Gross Profit (GP). *</label>
                                                    <?php  
                                                    $name = @$result->profit;
                                                    $postvalue = @$_POST['profit'];

//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                                    echo form_input(array('readonly'=>'readonly','type' =>'number' , 'step'=>'0.01', 'min' =>'0', 'name' => 'profit','maxlength'=>'25', 'class' => 'form-control', 'id' => 'profit', 'placeholder' => 'Profit', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                                 ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('profit'); ?></div></label>
                                                                                              
                                                </div> 
                                            </div>
                                            <div class="form-row">
                                           
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">CGST *<span id="cgst"></span></label>
                                                    <select id="cgst_val"  class="form-control" name="cgst" >
                                                    <option value="" >Select CGST</option>
                                                    <?php  
                                                    
                                                    //$postvalue = @$_POST['cgst'];
                                                    $name = @$result->cgst;
                                                    $postvalue = @$_POST['cgst'];
                                                    $val = !empty($postvalue)? $postvalue:$name;


                                                    if(!empty($sgst)){
                                                           foreach($sgst as $key=>$value){ ?>
                                                          
                                                    <option <?php if($val == $value->cgst){ echo "selected=selected";}?>  value="<?php echo $value->cgst;?>"><?php echo $value->cgst.' %';?></option>
                                                    <?php } } ?>
                                                </select>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('cgst'); ?></div></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState2">SGST. * <span id="sgst"></span></label>
                                                    <select id="sgst_val"  class="form-control" name="sgst" >
                                                    <option value="" >Select SGST</option>
                                                    <?php  
                                                    
                                                    //$postvalue = @$_POST['sgst'];
                                                    $name = @$result->sgst;
                                                    $postvalue = @$_POST['sgst'];
                                                    $val = !empty($postvalue)? $postvalue:$name;


                                                    if(!empty($sgst)){
                                                           foreach($sgst as $key=>$value){ ?>
                                                          
                                                    <option <?php if($val == $value->sgst){ echo "selected=selected";}?> value="<?php echo $value->sgst;?>"><?php echo $value->sgst. ' %';?></option>
                                                    <?php } } ?>
                                                </select>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('sgst'); ?></div></label>
                                                                                              
                                                </div> 
                                            </div>
                                            <div class="form-row">
                                           
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Amount After GST *</label>
                                                    <?php  $name = @$result->gst_amount;
                                               $postvalue = @$_POST['gst_amount'];
//                                                    $val = !empty($postvalue)? $postvalue:$name;
                                               echo form_input(array('readonly'=>'readonly','type' =>'number' , 'step'=>'0.01', 'min' =>'0', 'name' => 'gst_amount','maxlength'=>'25', 'class' => 'form-control', 'id' => 'gst_amount', 'placeholder' => 'Amount After GST', 'value' => !empty($postvalue) ? $postvalue : $name ));
                                            ?>
                                                   <label  class="error"><div class="help-block" style="color:red"> <?php echo form_error('gst_amount'); ?></div></label>
                                                </div>
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
                                                   <a href="<?php echo base_url('admin/billing/listing/');?>"><button type="button" class="btn btn-primary"> Cancel </button></a>
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

    $( function() {
    $( "#datepicker" ).datepicker({ 
        
        dateFormat: "dd-mm-yy",
        setDate:new Date()
        
        });
  } );
  
    var quant;
    var rate;
    var s_rate;

    var total;
    var s_total ;
    var net_profit;
    var cgst ;
    var sgst;
    var gst_total;
    var scgst_total;
    var final_amount;



  function logicConversion(data, val){
      if(data != undefined && val != undefined){
            return data * val;
      }
  }
  function TotalProfit(s_price, p_price){

      if(s_price != undefined && p_price != undefined){
            return s_price - p_price;
      }

  }

function GstCal(gst, s_total){

if(gst != undefined && s_total != undefined){
      return s_total * gst / 1000;
}

}


$('#quantity, #p_rate, #s_rate, #cgst_val, #sgst_val').keyup(function(){

     quant = $('#quantity').val();
     rate = $('#p_rate').val();
     s_rate = $('#s_rate').val();

     total = logicConversion(quant, rate);
     s_total = logicConversion(quant, s_rate);
     net_profit = TotalProfit(s_total, total);

    if(quant != undefined && rate != undefined && s_rate != undefined){

        if( total !=0 ){
            $('#p_amount').val(total.toFixed(2));
        }

        if(s_total != 0){

            $('#s_amount').val(s_total.toFixed(2));
        }
        if(net_profit != 0 && net_profit > 0){

            $('#profit').val(net_profit.toFixed(2));
        }
    }
});


$('#quantity, #p_rate, #s_rate, #cgst_val, #sgst_val').change(function(){
     cgst = $('#cgst_val').val();
     sgst = $('#sgst_val').val();
     if(s_total > 0 && cgst != undefined && sgst != undefined){

    gst_total = GstCal(cgst, s_total.toFixed(2));
    scgst_total = GstCal(sgst, s_total.toFixed(2));
   // alert(s_total);
    final_amount = (gst_total) + (scgst_total) + (s_total);
    if(gst_total >0 && scgst_total > 0){
        $('#gst_amount').val(final_amount.toFixed(2));
        $('#cgst').html('- (<b>'+gst_total+'Rs.</b>)');
        $('#sgst').html('- (<b>'+scgst_total+'Rs.</b>)');
            }
     }
})



</script>

