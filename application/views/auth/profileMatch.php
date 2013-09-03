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
                  <aside class="pull-right" id="step"><img  src="<?php echo base_url();?>assets/img/s_2.png"></aside>
               </div>
               <div class="name">
                  <div  class="well well-small">
                     <h2><?php echo $userData['fullname'];?></h2>
                  </div>
               </div>
               <div id="l_more">
                  <div class="well well-small">
                     <h4>Match Me</h4>
                  </div>
               </div>
               <div class="row">
                  <article class="span2 l_col_sing " style="background:none;">
                     <div  class="text-center" id="profile_2">
                        <div id="real_profile_pic"> 
						
						<?php 
							if(isset($userProfile['profilePic']) && $userProfile['profilePic'])

							{
								if(substr($userProfile['profilePic'],0,1)=='f')
								{
								?>
								<img src="https://graph.facebook.com/<?php echo substr($userProfile['profilePic'],1)?>/picture?type=large"/>
								<?php
								}
								else
								{
						?>

							<img src="<?php echo base_url();?>uploads/user_pic/<?php echo $userProfile['profilePic'];?>">
							

						<?php 
								}
							}

							else

							{

						?>

								<img src="<?php echo base_url();?>assets/img/avatar.png"> 

						<?php

							} 

						?>
						</div>
                        <p>
							<?php echo ($userData['fullname']);?>
							<?php echo (isset($userProfile['gender']))?", ".$userProfile['gender']:"";?> <br>
						   <?php echo (isset($userProfile['dob']))?$userProfile['dob']:"";?> 
                        </p>
                        <!--<p class="edit_profile_link"><a href="#">Edit Profile</a></p>-->
                     </div>
                  </article>
                  <article class="span9 r_col_sing">
					<?php
						$school=array(
								'name'	=>	'school',
								'id'	=>	'school',
								'value'	=>	set_value('school'),
								'size'	=>	30,
								'class'	=> 	'span4',
								'placeholder'=> 'School Name'
						);
						
					?>
                     <?php echo form_open($this->uri->uri_string());?>
                    <div class="control-group">
					  <div class="controls">
                           <h4>School Name</h4>
						   <?php echo form_input($school);?>
							<span class="help-inline" style="color:red;">
							<?php echo form_error('school');?>
						</span>
					  </div>
					</div>
					<div class="control-group">
					  <div class="controls">
                           <h4>I Have Done</h4>
							<label class="radio inline">
								<input type="radio" value="XII" class="lookingfor" name="lookingfor">XII&nbsp;&nbsp;
							</label>
							<label class="radio inline">
								<input type="radio" value="UG" class="lookingfor" name="lookingfor">UG&nbsp;&nbsp;
							</label>
							<label class="radio inline">
								<input type="radio" value="PG" class="lookingfor" name="lookingfor">PG&nbsp;&nbsp;
							</label>
					  </div>
					</div>
					<div class="controls controls-row" id="XII" style="display:none;">
                        <h5>XII Details</h5>
							<!--<input class="span2" type="text" value="" name="XIIyearofpassout" placeholder="Year of Passout">-->
						<select class="span2" name="XIIyearofpassout">
							<option>Year of Passout</option>
							<?php for($counter=2013;$counter>=1995;$counter--)
							{?>
							<option value="<?php echo $counter;?>"><?php echo $counter;?></option>
							<?php 
							}?>
						</select>
						<input class="span2" type="text" value="" name="XIIfields" placeholder="Field">
						<div class="input-append span2">
						    <input class="span1" type="text" value="" name="XIIpercentage" placeholder="%%">
							<span class="add-on">%</span>
						</div>
					</div>
					<div class="controls controls-row" id="UG" style="display:none;">
                           <h5>UG Details</h5>
							<!--<input class="span2" type="text" value="" name="UGyearofpassout" placeholder="Year of Passout">-->
							<select class="span2" name="UGyearofpassout">
								<option>Year of Passout</option>
								<?php for($counter=2013;$counter>=1995;$counter--)
								{?>
								<option value="<?php echo $counter;?>"><?php echo $counter;?></option>
								<?php 
								}?>
							</select>
							<input class="span2" type="text" value="" name="UGfields" placeholder="Fields">
							<div class="input-append span2">
								<input class="span1" type="text" value="" name="UGpercentage" placeholder="%%">
								<span class="add-on">%</span>
							</div>
					</div>
					<div class="controls controls-row" id="PG" style="display:none;">
                           <h5>PG Details</h5>
							<!--<input class="span2" type="text" value="" name="PGyearofpassout" placeholder="Year of Passout">-->
							<select class="span2" name="PGyearofpassout">
								<option>Year of Passout</option>
								<?php for($counter=2013;$counter>=1995;$counter--)
								{?>
								<option value="<?php echo $counter;?>"><?php echo $counter;?></option>
								<?php 
								}?>
							</select>
							<input class="span2" type="text" value="" name="PGfields" placeholder="Fields" name="save_profile_match">
							<div class="input-append span2">
								<input class="span1" type="text" value="" name="PGpercentage" placeholder="%%">
								<span class="add-on">%</span>
							</div>
					</div>
					
                        <!--<div class="input-prepend span2">
                           <h4>Year of Graduation</h4>
                           <select class="span2">
                              <option >City</option>
                           </select>
                        </div>
                        <div class="input-prepend span2 pos_check">
                           <div class="span2" >
                              <input type="checkbox" class="styled" name="checkbox" id="checkbox">
                              <label>If Not Yet</label>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="clearfix span6">
                           <h4>Percentage</h4>
                           <div class="input-append" id="save_me">
                              <input class="span2" type="text">
                              <span class="add-on">%</span> 
                           </div>
                        </div>-->
                        <div class="clearfix"></div>
                        <div id="bu_next" class="pull-right">
                            <a href="<?php echo base_url('auth/profileStep3');?>"><button class="btn " type="button">Skip</button></a>
                           <input class="btn " type="submit" onclick=""  name="save_profile_match" value="Next">
                        </div>
                     <?php echo form_close();?>
                  </article>
               </div>
            </section>
         </div>
      </div>
      <!--end main-->
	  
	  
	  <?php $this->load->view('layout/js');?>
	  
	  <script>
		$(document).ready(function(){
			$(".lookingfor").click(function(){
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