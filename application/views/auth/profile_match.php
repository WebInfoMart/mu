<html>
<head>
<script src="<?php echo base_url()."js/jquery.js";?>"></script>
<script src="<?php echo base_url()."js/custom/profile_match.js";?>"></script>
<script>
$(document).ready(function(){

	$(".lookingfor").live('click',function(){
		var lookingfor=$(this).val();
		if(lookingfor=='XII')
		{
			$('#XII').show();
			$('#UG').hide();
			$('#PG').hide();
		}
		else if(lookingfor=='UG')
		{
			$('#XII').show();
			$('#UG').show();
			$('#PG').hide();
		}
		else
		{
			$('#XII').show();
			$('#UG').show();
			$('#PG').show();
		}
		
		
	});

});
</script>
</head>
<body>
Match your profile
<!--<form method="post" action="<?php echo base_url('/profile_match')?>">
<br><br>
<br><br>School<input type="text" value="<?php set_value('school');?>" name="school" id="school">
<div style="color:red"><?php echo form_error('school');?></div>
<br><br>Year Of Graduation<input type="text" name="year_of_grad" value="<?php echo set_value('year_of_gad');?>">
<div style="color:red"><?php echo form_error('year_of_grad');?></div>
<br><br>Percentage<input type="text" name="percentage" value="<?php echo set_value('year_of_gad');?>">
<div style="color:red"><?php echo form_error('percentage');?></div>
<br><br>
<input type="checkbox" name="not_yet_grad" value="1" >Not Yet Graduate

<br><br>Looking For
<input type="radio" name="looking_for" value="Undergraduate" checked>Undergraduate
<input type="radio" name="looking_for" value="Graduate">Graduate
<input type="radio" name="looking_for" value="Fundation">Foundation
<input type="submit" value="next" name="save_profile_match">
</form>-->

<?
$school=array(
		'name'	=>	'school',
		'id'	=>	'school',
		'value'	=>	set_value('school'),
		'size'	=>	30
);



?>

<?php echo form_open($this->uri->uri_string());?>
<?php echo form_label('School',$school['id']);?>
<?php echo form_input($school);?>
<?php echo form_error($school['name'])?>
<br>
I Want 
<input type="radio" value="XII" class="lookingfor" name="lookingfor">XII
<input type="radio" value="UG" class="lookingfor" name="lookingfor">UG
<input type="radio" value="PG" class="lookingfor" name="lookingfor">PG
<div id="XII" style="display:none;">
XII Details<br>
Percentage<input type="text" value="" name="XIIpercentage">
Year of Passout<input type="text" value="" name="XIIyearofpassout">
Fields<input type="text" value="" name="XIIfields">
</div>
<br>
<div id="UG" style="display:none;">
UG Details<br>
Percentage<input type="text" value="" name="UGpercentage">
Year of Passout<input type="text" value="" name="UGyearofpassout">
Fields<input type="text" value="" name="UGfields">
</div>
<br>
<div id="PG" style="display:none;">
PG Details<br>
Percentage<input type="text" value="" name="PGpercentage">
Year of Passout<input type="text" value="" name="PGyearofpassout">
Fields<input type="text" value="" name="PGfields">
</div>
<br>
<?php echo form_submit('save_profile_match','Next');?>
<?php echo form_close();?>

</body>
</html>