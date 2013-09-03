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

                     <h2><?php echo $userData['fullname']?></h2>

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

								'value'	=>	'male'

								),

						1=>array(

								'name'	=>	'gender',

								'value'	=>	'female'

								)

				);

				$profile_pic=array(

						'name'	=>	'profile_pic',

						'id'	=>	'profile_pic',

						'value'	=>	'choose file',

				);

				

				?>

			   <?php echo form_open_multipart($this->uri->uri_string());?>
				<div class="row">
               <article class="span6 l_col_sing">

                  

				<div class="controls controls-row">

					<h4>D.O.B</h4>
						<?php 
						$month=$date=$year=0;
						if($this->session->userdata('birthday'))
						{
							$dob=$this->session->userdata('birthday');
							$birthday = explode("/", $dob);
							$month=$birthday[0]; 
							$date=$birthday[1]; 
							$year=$birthday[2]; 
						}			
						?>
                       <select class="span1" id="birthDay" onchange="changeDob();">

						<option value="0">Date</option>
						
						<?php 

						for($counter=1;$counter<=31;$counter++)

						{

						?>

						<option value="<?php echo $counter;?>" <?php echo ($date==$counter)?"selected":"";?>><?php echo $counter;?></option>

						<?php

						}

						?>

					</select>

					<select class="span1" id="birthMonth" onchange="changeDob();">

						<option value="0" <?php echo ($month==0)?"selected":"" ?>>Month</option>
						<option value="1" <?php echo ($month==1)?"selected":"" ?>>Jan</option>
						<option value="2" <?php echo ($month==2)?"selected":"" ?>>Feb</option>
						<option value="3" <?php echo ($month==3)?"selected":"" ?>>Mar</option>
						<option value="4" <?php echo ($month==4)?"selected":"" ?>>Apr</option>
						<option value="5" <?php echo ($month==5)?"selected":"" ?>>May</option>
						<option value="6" <?php echo ($month==6)?"selected":"" ?>>Jun</option>
						<option value="7" <?php echo ($month==7)?"selected":"" ?>>Jul</option>
						<option value="8" <?php echo ($month==8)?"selected":"" ?>>Aug</option>
						<option value="9" <?php echo ($month==9)?"selected":"" ?>>Sep</option>
						<option value="10"<?php echo ($month==10)?"selected":"" ?>>Oct</option>
						<option value="11"<?php echo ($month==11)?"selected":"" ?>>Nov</option>
						<option value="12"<?php echo ($month==12)?"selected":"" ?>>Dec</option>

					</select>

					<select class="span2" id="birthYear" onchange="changeDob();">

						<option value="0">Year</option>

						<?php for($counter=1980;$counter<=2005;$counter++)

						{

						?>

						<option value="<?php echo $counter;?>" <?php echo ($year==$counter)?"selected":"";?> ><?php echo $counter;?></option>

						<?php

						}

						?>

					</select>

					<span class="help-inline" style="color:red;"><?php echo form_error($dob['name'])?></span>

					<?php //echo form_input($dob);?>
					<input type="hidden" name="dob" id="dob" value="<?php echo ($date)?$year."/".$month."/".$date:"";?>">

				</div>

				<div class="control-group">

				<h4>Gender</h4>

					<div class="controls">

                           <!--<input type="radio" name="radio"  class="styled" selected>-->

						   <label class="radio inline span1 no_margin">

						   <?php echo form_radio($gender[0]);?>

                           <img src="<?php echo base_url();?>assets/img/man.png">

						   </label>

                           <!--<input type="radio" name="radio"  class="styled">-->

						   <label class="radio inline">

						   <?php echo form_radio($gender[1]);?>

                           <img src="<?php echo base_url();?>assets/img/woman.png">

						   </label>

					</div>

				</div>

				<div class="control-group">

					<div class="controls controls-row">

						<h4>Location</h4>

							<select class="span2" name="country">

								<option value="">Country</option>

								<option value="1">India</option>

							</select>

							<select name="city" class="span2">

								<option value="">City</option>

								<option value="1">Dehradun</option>

							</select>

						<span class="help-inline" style="color:red;">

							<?php echo form_error('city');?>

							<?php echo form_error('country');?>

						</span>

					</div>

				</div>

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

                     

					 <a href="<?php echo base_url('auth/profileMatch');?>"><button class="btn " type="button">Skip</button></a>

                     <input class="btn " type="submit" name="save_profile" onclick="" value="Next">

                  </div>

               </article>
				</div>
			   <?php echo form_close();?>

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



	  