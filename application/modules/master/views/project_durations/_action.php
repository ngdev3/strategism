
<?php 

if(@$_GET['status'] !='delete'){ ?>
<style>
.anchorTag{
margin:5px
}
</style>
<div>
	<a class="anchorTag" href="<?php echo base_url();?>master/project_durations/view/<?= ID_encode($row['duration_id'])?>"><i class='fa fa-eye'> </i> </a> </a>
	<a class="anchorTag" href="<?php echo base_url();?>master/project_durations/edit/<?= ID_encode($row['duration_id'])?>"><i class="fa fa-edit"></i></a>
	
	<a class="anchorTag" href="javascript:void(0);" class="btn  btn-xs btn-danger margin-right-10 " title="delete" onclick="delete_state(<?php echo $row['duration_id'] ; ?>);">
    <i class="fa fa-trash"></i>
</a>
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