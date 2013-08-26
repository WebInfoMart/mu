<!--main-->
      <div role="main" id="main">
         <div class="row container no_padding" id="register_page" >
            <ul class="breadcrumb univ_breadcrumb">
               <li><a href="#">Home</a> <span class="divider"><i class=" icon-arrow-right"></i></span></li>
               <li class="active">Edit Profile</li>
            </ul>
            <section id="register_page_steps">
               <div class="well  well-small profile_steps ">
                  <h2 class="pull-left">Complete Your Profile Dashboard</h2>
                  <aside class="pull-right" id="step"><img  src="<?php echo base_url();?>assets/img/s_1.png"></aside>
               </div>
               <div class="name">
                  <div  class="well well-small">
                     <h2>Ryan Benston</h2>
                  </div>
               </div>
               <div id="l_more">
                  <div class="well well-small">
                     <h4>Tell Us Little More!</h4>
                  </div>
               </div>
			   <?php
				$dob=array(
						'name'	=>	'dob',
						'id'	=>	'dob',
						'value'	=>	set_value('dob'),
						'class'	=> 	'span4',
						'placeholder'=>"dd-mm-yy",
						'type'	=> "hidden"
				);
				$gender=array(
						0=>array(
								'name'	=>	'gender',
								'checked'=>	true,
								'value'	=>	'male',
								'class'	=>	'styled'
								),
						1=>array(
								'name'	=>	'gender',
								'value'	=>	'female',
								'class'	=>	'styled'
								)
				);
				$profile_pic=array(
						'name'	=>	'profile_pic',
						'id'	=>	'profile_pic',
						'value'	=>	'choose file',
				);
				
				?>
			   <?php echo form_open_multipart($this->uri->uri_string());?>
               <article class="span6 l_col_sing">
                  
				<div class="control-group">
					<div class="controls">
					 <h4>D.O.B</h4>
                     <div class="input-prepend">
					 <?php echo form_input($dob);?>
                        <select class="span1" id="birthDay" onchange="changeDob();">
							<option value="0">Date</option>
							<?php 
							for($counter=1;$counter<=30;$counter++)
							{
							?>
							<option value="<?php echo $counter;?>"><?php echo $counter;?></option>
							<?php
							}
							?>
						</select>
						<select class="span1" id="birthMonth" onchange="changeDob();">
							<option value="0">Month</option>
							<option value="1">Jan</option>
							<option value="2">Feb</option>
							<option value="3">Mar</option>
							<option value="4">Apr</option>
							<option value="5">May</option>
							<option value="6">Jun</option>
							<option value="7">Jul</option>
							<option value="8">Aug</option>
							<option value="9">Sep</option>
							<option value="10">Oct</option>
							<option value="11">Nov</option>
							<option value="12">Dec</option>
						</select>
						<select class="span2" id="birthYear" onchange="changeDob();">
							<option value="0">Year</option>
							<?php for($counter=1980;$counter<=2005;$counter++)
							{
							?>
							<option value="<?php echo $counter;?>"><?php echo $counter;?></option>
							<?php
							}
							?>
						</select>
                     </div>
					 <span class="help-inline" style="color:red;"><?php echo form_error($dob['name'])?></span>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
                     <h4>Gender</h4>
                     <div class="input-prepend">
                        <div class="span2 no_margin">
                           <!--<input type="radio" name="radio"  class="styled" selected>-->
						   <?php echo form_radio($gender[0]);?>
                           <img src="<?php echo base_url();?>assets/img/man.png">
                        </div>
                        <div class="span2">
                           <!--<input type="radio" name="radio"  class="styled">-->
						   <?php echo form_radio($gender[1]);?>
                           <img src="<?php echo base_url();?>assets/img/woman.png">
                        </div>
                     </div>
					</div>
				</div>
                     <br>
				<div class="control-group">
					<div class="controls">
                     <h4>Location</h4>
                     <div class="input-prepend">
						<select name="city" class="span2">
							<option value="">City</option>
							<option value="1">Dehradun</option>
						</select>
                     </div>
                     <div class="input-prepend">
                        <select class="span2" name="country">
							<option value="">Country</option>
							<option value="1">India</option>
                        </select>
                     </div>
					<span class="help-inline" style="color:red;">
						<?php echo form_error('city');?>
						<?php echo form_error('country');?>
					</span>
					</div>
				</div>
                     <br>
                  
               </article>
               <article class="span5 r_col_sing">
                  <h4> Update profile picture</h4>
                  <div class="profile_pic">
                     <img src="<?php echo base_url();?>assets/img/profile_pic_demo.png" class="pull-left">
                     <div id="profile_text">
                        <p>UPDATE YOUR PROFILE PICTURE<br>
                           TO GIVE INTERACTIVE LOOK OF <br>
                           YOUR ACCOUNT
                        </p>
                     </div>
                     <div class="clearfix"></div>
					 <div class="span2 no_margin">
                        <input type="file" name="profile_pic" value="Choose File">
                     </div>
					 
                     <!--<div class="span2 no_margin">
                        <input type="radio" name="a" class="styled" />
                        Fill Form 
                     </div>
                     <div class="span2 no_margin">
                        <input type="radio" name="a" class="styled" />
                        Click Camra 
                     </div>-->
                  </div>
                  <div class="clearfix"></div>
                  <div id="bu_next" class="pull-right">
                     <button class="btn " type="button">Skip</button>
                     <input class="btn " type="submit" name="save_profile" onclick="" value="Next">
                  </div>
               </article>
			   <?php form_close();?>
            </section>
         </div>
      </div>
      <!--end main-->
	  
	  
	<?php $this->load->view('layout/js');?>
	  
	<script>
		function changeDob()
		{
			if($("#birthMonth").val()!=0 && $("#birthDay").val()!=0 && $("#birthYear").val()!=0 )
			{
			$("#dob").val($("#birthYear").val()+"/"+$("#birthMonth").val()+"/"+$("#birthDay").val());
			}
		}
	</script>

	  