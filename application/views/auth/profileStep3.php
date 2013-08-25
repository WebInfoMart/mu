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
                  <aside class="pull-right" id="step"><img  src="<?php echo base_url();?>assets/img/s_3.png"></aside>
               </div>
               <div class="name">
                  <div  class="well well-small">
                     <h2>Ryan Benston</h2>
                  </div>
               </div>
               <div id="l_more">
                  <div class="well well-small">
                     <h4>Extended Info</h4>
                  </div>
               </div>
               <div class="row">
                  <article class="span2 l_col_sing " style="background:none;">
                     <div  class="text-center" id="profile_2">
                        <div id="real_profile_pic">
                           <img src="<?php echo base_url();?>assets/img/avatar.png">
                        </div>
                        <p>Ryan, male
                           <br>17/0ct/1991
                        </p>
                        <p>St Georges
                           BDS, <br>
                           Year-2009
                        </p>
                        <p class="edit_profile_link"><a href="#">Edit Profile</a></p>
                     </div>
                  </article>
                  <article class="span9 r_col_sing row">
				  <?php
					$sat_math=array('name'	=>	'sat_math','id'	=>	'sat_math','value'	=>	set_value('sat_math'),'class'=>'span2','placeholder'=>'Math');
					$sat_reading=array('name'	=>	'sat_reading','id'	=>	'sat_reading','value'	=>	set_value('sat_reading'),'class'=>'span2','placeholder'=>'Reading');
					$sat_writing=array('name'	=>	'sat_writing','id'	=>	'sat_writing','value'	=>	set_value('sat_writing'),'class'=>'span2','placeholder'=>'Writing');
					$sat_composite=array('name'	=>	'sat_composite','id'	=>	'sat_composite','value'	=>	set_value('sat_composite'),'class'=>'span2','placeholder'=>'Composite');
					$act_math=array('name'	=>	'act_math','id'	=>	'act_math','value'	=>	set_value('act_math'),'class'=>'span2','placeholder'=>'Math');
					$act_reading=array('name'	=>	'act_reading','id'	=>	'act_reading','value'	=>	set_value('act_reading'),'class'=>'span2','placeholder'=>'Reading');
					$act_writing=array('name'	=>	'act_writing','id'	=>	'act_writing','value'	=>	set_value('act_writing'),'class'=>'span2','placeholder'=>'Writing');
					$act_composite=array('name'	=>	'act_composite','id'	=>	'act_composite','value'	=>	set_value('act_composite'),'class'=>'span2','placeholder'=>'Composite');
					
					$ielts=array('name'=>'ielts','id'=>'ielts','value'=>set_value('ielts'));
					$pte=array('name'=>'pte','id'=>'pte','value'=>set_value('pte'));
					?>
                     <?php echo form_open($this->uri->uri_string());?>
                        <div class="sat span9" >
                           <input type="radio" name="sat_or_act" class="styled"> 
                           <h4>SAT</h4>
                           <div class="clearfix"></div>
                           <!--<input type="text" class="span2" placeholder="Marks">
                           <input type="text" class="span2" placeholder="Heading">
                           <input type="text" class="span2" placeholder="Writing">
                           <input type="text" class="span2" placeholder="Combine">-->
						   <?php echo form_input($sat_math);?>
							<?php echo form_input($sat_reading);?>
							<?php echo form_input($sat_writing);?>
							<?php echo form_input($sat_composite);?>
                        </div>
                        <div class="act span9">
                           <input type="radio" name="sat_or_act" class="styled"> 
                           <h4>ACT</h4>
                           <div class="clearfix"></div>
							<?php echo form_input($act_math);?>
							<?php echo form_input($act_reading);?>
							<?php echo form_input($act_writing);?>
							<?php echo form_input($act_composite);?>
                           <div class="span2">
                              <h4>IELTS</h4>
                              <input type="text" class="span2" placeholder="IELTS">
                           </div>
                           <div class="span2">
                              <h4>PTB</h4>
                              <input type="text" class="span2" placeholder="PTB">
                           </div>
                        </div>
                        <div class="clearfix"></div>
                        <div id="bu_next" class="pull-right">
                           <button class="btn " type="button">Back</button>
                           <input class="btn " type="submit" onclick="" value="Finish" name="save_external_info">
                        </div>
                     <?php form_close();?>
                  </article>
               </div>
            </section>
         </div>
      </div>
      <!--end main-->