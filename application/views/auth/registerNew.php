<!--main-->
      <div role="main" id="main">
         <div class="row container" id="register_page">
            <div class="well well-small">
               <h2>Create a New Meet Univ’s Account <span>(it’s FREE)</span></h2>
            </div>
			<?php if($this->session->flashdata('message')){?>
			<div class="alert alert-success" style="font-size: 14px;">
				<?php echo $this->session->flashdata('message');?>
			</div>
			<?php }?>
            <div class="border"></div>
			<div class="row">
            <article class="span6 l_col_sing">
               <h3>Sign up <span>or  <a href="<?php echo base_url('login')?>">Login</a></span></h3>
               <h4>Student Details!</h4>
			   <?php
				if ($use_username) {
					$username = array(
						'name'	=> 'username',
						'id'	=> 'username',
						'value' => set_value('username'),
						'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
						'size'	=> 30,
					);
				}
				$fullname = array (
					'name'	=>	'fullname',
					'id'	=>	'fullname',
					'value'	=> set_value('fullname'),
					'size' => 30,
					'class'	=> 'span4',
					'placeholder' => 'Full Name'
				
				);
				$mobile = array(
					'name'	=>	'mobile',
					'id'	=>	'mobile',
					'value'	=>	set_value('mobile'),
					'maxlength'=> 10,
					'size'	=> 30,
					'class'	=> 'span4',
					'placeholder' => 'Mobile'
				);
				$email = array(
					'name'	=> 'email',
					'id'	=> 'email',
					'value'	=> set_value('email'),
					'maxlength'	=> 80,
					'size'	=> 30,
					'class'	=> 'span4',
					'placeholder' => 'Email'
				);
				$password = array(
					'name'	=> 'password',
					'id'	=> 'password',
					'value' => set_value('password'),
					'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
					'size'	=> 30,
					'class'	=> 'span4',
					'placeholder' => 'Password',
					
				);
				$confirm_password = array(
					'name'	=> 'confirm_password',
					'id'	=> 'confirm_password',
					'value' => set_value('confirm_password'),
					'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
					'size'	=> 30,
					'class'	=> 'span4',
					'placeholder' => 'Confirm Password'
				);
				$captcha = array(
					'name'	=> 'captcha',
					'id'	=> 'captcha',
					'maxlength'	=> 8,
				);
				$formAttr = array('id' => 'registerForm');
				?>
				<?php echo form_open($this->uri->uri_string(),$formAttr); ?>
				<div class="control-group">
					<div class="controls">
						<div class="input-prepend">
							<span class="add-on"><img src="<?php echo base_url();?>assets/img/student_name.png"></span>
							<?php echo form_input($fullname); ?>
						</div>
						<span class="help-inline" style="color:red;"><?php echo form_error($fullname['name']); ?><?php echo isset($errors[$fullname['name']])?$errors[$fullname['name']]:''; ?></span>
					</div>
				</div>
						
				<div class="control-group">
					<div class="controls">		
						<div class="input-prepend">
							<span class="add-on"><img src="<?php echo base_url();?>assets/img/mail.png"></span>
							<?php echo form_input($email); ?>
							
						</div>
						<span class="help-inline" style="color:red;">
						<?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
						</span>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">	
						<div class="input-prepend">
							<span class="add-on"><img src="<?php echo base_url();?>assets/img/Mobile.png"></span>
							<?php echo form_input($mobile); ?>
						</div>
						<span class="help-inline" style="color:red;">
						<?php echo form_error($mobile['name']); ?><?php echo isset($errors[$mobile['name']])?$errors[$mobile['name']]:''; ?>
						</span>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">	
						<div class="input-prepend">
							<span class="add-on"><img src="<?php echo base_url();?>assets/img/Password.png"></span>
							<?php echo form_password($password); ?>
						</div>
						<span class="help-inline" style="color:red;">
						<?php echo form_error($password['name']); ?>
						</span>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div class="input-prepend">
							<span class="add-on"><img src="<?php echo base_url();?>assets/img/Confirm-Password.png"></span>
							<?php echo form_password($confirm_password); ?>
						</div>
						<span class="help-inline" style="color:red;">
							<?php echo form_error($confirm_password['name']); ?>
						</span>
					</div>
				</div>
						<div class="form_bu clearfix">
						<button class="btn btn-large" type="button" onclick="$('#registerForm').submit();">Create Account</button>
						<button class="btn btn-large" type="button">Cancel</button>
					</div>
				<?php echo form_close();?>
               <form>
                 <!-- <div class="input-prepend">
                     <span class="add-on"><img src="<?php echo base_url();?>assets/img/student_name.png"></span>
                     <input class="span4"  type="text" placeholder="Student Name">
                  </div>
				  <div class="input-prepend">
                     <span class="add-on"><img src="<?php echo base_url();?>assets/img/mail.png"></span>
                     <input class="span4"  type="text" placeholder="Mail">
                  </div>
                  <div class="input-prepend">
                     <span class="add-on"><img src="<?php echo base_url();?>assets/img/Mobile.png"></span>
                     <input class="span4"  type="text" placeholder="Mobile">
                  </div>
                  <div class="input-prepend">
                     <span class="add-on"><img src="<?php echo base_url();?>assets/img/Password.png"></span>
                     <input class="span4"  type="text" placeholder="Password">
                  </div>
                  <div class="input-prepend">
                     <span class="add-on"><img src="<?php echo base_url();?>assets/img/Confirm-Password.png"></span>
                     <input class="span4"  type="text" placeholder="Confirm Password">
                  </div>
                  <div class="form_bu clearfix">
                     <input type="checkbox" name="a" class="styled" />Keep Me Logged In.
                  </div>
                  <div class="form_bu clearfix">
                     <button class="btn btn-large" type="button" onclick="location.href='register_step_1.html'">Create Account</button>
                     <button class="btn btn-large" type="button">Cancel</button>
                  </div>-->
               </form>
               <small>By creating an account, you agree to the <a href="#">Terms 
               of Service </a><br> and to receive product information<br>
               unless you choose <a href="#">otherwise</a>.</small>
            </article>
			
            <article class="span5 r_col_sing">
               <h4>Or,Sign up with</h4>
               <img src="<?php echo base_url();?>assets/img/facebook_big.png" onclick="fblogin();">
               <h2>Search many of <br>
                  colleges and there <br>
                  information as Per your <br>
                  Requirments..
               </h2>
            </article>
			</div>
		 </div>
      </div>
      <!--end main-->
	 
	 <?php $this->load->view('layout/js');?>
	   <script src="<?php echo base_url();?>assets/js/custom/client.js" type="text/javascript"></script>
	 <script src="<?php echo base_url();?>assets/js/custom/login.js" type="text/javascript"></script> 
	 <script>
		$(document).ready(function () {
			login.execute();									//code of JavaScript to be executed
		})
	</script>
	 