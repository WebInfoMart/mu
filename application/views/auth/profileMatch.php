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
                     <h2>Ryan Benston</h2>
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
							if($userProfile['profilePic'])
							{
						?>
							<img src="<?php echo base_url();?>assets/img/<?php echo $userProfile['profilePic'];?>">
						<?php 
							}
							else
							{
						?>
								<img src="<?php echo base_url();?>assets/img/avatar.png"> 
						<?php
							} 
						?>
						</div>
                        <p>Ryan, male <br>
                           17/0ct/1991 
                        </p>
                        <p class="edit_profile_link"><a href="#">Edit Profile</a></p>
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
						<div class="input-prepend span8">
                           <h4>School Name</h4>
						   <?php echo form_input($school);?>
                        </div>
					  </div>
					</div>
					<div class="control-group">
					  <div class="controls">
						<div class="input-prepend span8">
                           <h4>I Have Done</h4>
						   <label class="inline">
						    <input type="radio" value="XII" class="lookingfor" name="lookingfor">XII</label>
							<label class="inline">
							<input type="radio" value="UG" class="lookingfor" name="lookingfor">UG</label>
							<label class="inline">
							<input type="radio" value="PG" class="lookingfor" name="lookingfor">PG</label>
                        </div>
					  </div>
					</div>
					<div class="control-group" id="XII">
					  <div class="controls">
						<div class="input-prepend span8">
                           <h5>XII Details</h5>
						    <input class="span2" type="text" value="" name="XIIpercentage" placeholder="Percentage">
							<input class="span2" type="text" value="" name="XIIyearofpassout" placeholder="Year of Passout">
							<input class="span2" type="text" value="" name="XIIfields" placeholder="Field">
                        </div>
					  </div>
					</div>
					<div class="control-group" id="UG">
					  <div class="controls">
						<div class="input-prepend span8">
                           <h5>UG Details</h5>
							<input class="span2" type="text" value="" name="UGpercentage" placeholder="Percentage">
							<input class="span2" type="text" value="" name="UGyearofpassout" placeholder="Year of Passout">
							<input class="span2" type="text" value="" name="UGfields" placeholder="Fields">
                        </div>
					  </div>
					</div>
					<div class="control-group" id="PG">
					  <div class="controls">
						<div class="input-prepend span8">
                           <h5>PG Details</h5>
							<input class="span2" type="text" value="" name="PGpercentage" placeholder="Percentage">
							<input class="span2" type="text" value="" name="PGyearofpassout" placeholder="Year of Passout">
							<input class="span2" type="text" value="" name="PGfields" placeholder="Fields" name="save_profile_match">
                        </div>
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
                           <button class="btn " type="button">Skip</button>
                           <input class="btn " type="submit" onclick=""  name="save_profile_match" value="Next">
                        </div>
                     <?php form_close();?>
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