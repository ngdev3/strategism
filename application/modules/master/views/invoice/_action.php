
<?php 

if(@$_GET['status'] !='delete'){ ?>
<style>
.anchorTag{
margin:5px
}
</style>
<div>
	<a class="anchorTag" download href="<?php echo base_url('./uploads/invoice_slips/'.$row['pdf_url']) ?>" ><i class='fa fa-download'> </i> </a> </a>
	<a class="anchorTag" href="<?php echo base_url();?>master/invoice/edit/<?= ID_encode($row['id'])?>"><i class="fa fa-edit"></i></a>
<!-- 	
	<a class="anchorTag" href="javascript:void(0);" class="btn  btn-xs btn-danger margin-right-10 " title="delete" onclick="delete_state(<?php echo $row['id'] ; ?>);">
    <i class="fa fa-trash"></i>
</a> -->
</div>
<?php }
if(@$_GET['status'] == 'delete')
{
$restoreArr = array(
    'table'=>'fs_users',
    'col1'=> 'status',
    'col2'=> 'id',
    'value'=>'active',
    'id'=>ID_decode($row),    
    ); 
$resA = htmlspecialchars(json_encode($restoreArr));
?>

<?php } ?>