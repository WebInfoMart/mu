<?
$sat_math=array('name'	=>	'sat_math','id'	=>	'sat_math','value'	=>	set_value('sat_math'));
$sat_reading=array('name'	=>	'sat_reading','id'	=>	'sat_reading','value'	=>	set_value('sat_reading'));
$sat_writing=array('name'	=>	'sat_writing','id'	=>	'sat_writing','value'	=>	set_value('sat_writing'));
$sat_composite=array('name'	=>	'sat_composite','id'	=>	'sat_composite','value'	=>	set_value('sat_composite'));
$act_math=array('name'	=>	'act_math','id'	=>	'act_math','value'	=>	set_value('act_math'));
$act_reading=array('name'	=>	'act_reading','id'	=>	'act_reading','value'	=>	set_value('act_reading'));
$act_writing=array('name'	=>	'act_writing','id'	=>	'act_writing','value'	=>	set_value('act_writing'));
$act_composite=array('name'	=>	'act_composite','id'	=>	'act_composite','value'	=>	set_value('act_composite'));

$ielts=array('name'=>'ielts','id'=>'ielts','value'=>set_value('ielts'));
$pte=array('name'=>'pte','id'=>'pte','value'=>set_value('pte'));
?>
Fill External Info<br>
<?php echo form_open($this->uri->uri_string());?>
<?php echo form_label('SAT');?>
<?php echo form_input($sat_math);?>
<?php echo form_input($sat_reading);?>
<?php echo form_input($sat_writing);?>
<?php echo form_input($sat_composite);?>
<br>
<?php echo form_label('ACT');?>
<?php echo form_input($act_math);?>
<?php echo form_input($act_reading);?>
<?php echo form_input($act_writing);?>
<?php echo form_input($act_composite);?>
<br>
<?php echo form_label('IELTS');?>
<?php echo form_input($ielts);?>
<?php echo form_error($ielts['name']);?>

<?php echo form_label('PTE');?>
<?php echo form_input($pte);?>
<?php echo form_error($pte['name']);?>
<br>
<?php echo form_submit('save_external_info','Save');?>
<?php echo form_close();?>