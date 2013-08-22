Complete your profile
<!--<form method="post" action="<?php echo base_url('/profile')?>" enctype="multipart/form-data">
<br><br>
<br><br>Dob<input type="text" value="" name="dob" id="dob"><div style="color:red"><?php echo form_error('dob');?></div>
<br><br>Gender<input type="radio" name="gender" value="male" checked>male<input type="radio" name="gender" value="female">female
<br><br>Profile Pic<input type="file" name="profile_pic" value="Choose File">
<div style="color:red"><?php echo ($error)? $error :"";?></div>
<br><br>location
<select name="city">
<option value="">select</option>
<option value="1">Dehradun</option>
</select><div style="color:red"><?php echo form_error('city');?></div>
<select name="country">
<option value="">select</option>
<option value="1">India</option>
</select><div style="color:red"><?php echo form_error('country');?></div>
<br><br>
<input type="submit" value="next" name="save_profile">
</form>-->
<?php
$dob=array(
		'name'	=>	'dob',
		'id'	=>	'dob',
		'value'	=>	set_value('dob'),
);
$gender=array(
		0=>array(
				'name'	=>	'gender',
				'checked'=>	true,
				'value'	=>	'male',
				),
		1=>array(
				'name'	=>	'gender',
				'value'	=>	'female',
				)
);
$profile_pic=array(
		'name'	=>	'profile_pic',
		'id'	=>	'profile_pic',
		'value'	=>	'choose file',
);

?>
<?php echo form_open_multipart($this->uri->uri_string());?>
<?php echo form_label('Date of Birth',$dob['id'])?>
<?php echo form_input($dob);?>
<div style="color:red"><?php echo form_error($dob['name'])?></div>
<br>
<?php echo form_label('Gender','gender');?>
<?php echo form_radio($gender[0]);?>Male
<?php echo form_radio($gender[1]);?>Female
<br>Profile Pic<input type="file" name="profile_pic" value="Choose File">
<div style="color:red"><?php echo ($error!='SUCCESS')? $error :"";?></div>
<br>
location
<select name="city">
	<option value="">select</option>
	<option value="1">Dehradun</option>
</select>
<div style="color:red"><?php echo form_error('city');?></div>
<select name="country">
	<option value="">select</option>
	<option value="1">India</option>
</select>
<div style="color:red"><?php echo form_error('country');?></div>
<br>
<?php echo form_submit('save_profile','Next');?>
<?php echo form_close();?>