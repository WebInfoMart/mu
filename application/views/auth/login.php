
<?php $email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> '',
	'maxlength'	=> 80,
	'size'	=> 30,
	'type'	=> 'hidden'
	
);
if(isset($userData))
{
	$email['value']=$userData['email'];
}
?>

<!--main-->
      <div role="main" id="main">
         <div class="row container" id="register_page">
            <div class="well well-small">
               <h2>Log In with Meet Univ’s Account </h2>
            </div>
			<?php if(!$this->session->flashdata('message') && isset($notActivated)){?>
			<?php echo form_open(base_url('auth/send_again')); ?>
			<div class="alert alert-block alert-error fade in" style="font-size: 14px;">
				<div class="span6">
					<h4 class="alert-heading">Oops! Your Account not Activated Yet!</h4>
				</div>
				<div class="pull-right">
					<!--<button type="button" class='btn btn-danger btn-small' data-toggle="modal" data-target="#sendEmail">Send Again</button>-->
					
					<?php echo form_input($email); ?>
					<button type="submit" class='btn btn-danger btn-small'>Send Again</button>
					
				</div>
				<div class="clearfix"></div>
			</div>
			<?php form_close(); ?>
			<?php }?>
			<?php if($this->session->flashdata('message')){?>
			<div class="alert alert-success" style="font-size: 14px;">
				<?php echo $this->session->flashdata('message');?>
			</div>
			<?php }?>
            <div class="border"></div>
            <article class="span6 l_col_sing">
               <h3>Login <span>or  <a href="<?php echo base_url('register')?>">Sign up</a></span></h3>
               <h4>Student Details!</h4>
			   <?php
					$login = array(
						'name'	=> 'login',
						'id'	=> 'login',
						'value' => set_value('login'),
						'maxlength'	=> 80,
						'size'	=> 30,
						'class'	=> 'span4',
						'placeholder'=> 'Email'
					);
					if ($login_by_username AND $login_by_email) {
						$login_label = 'Email or login';
					} else if ($login_by_username) {
						$login_label = 'Login';
					} else {
						$login_label = 'Email';
					}
					$password = array(
						'name'	=> 'password',
						'id'	=> 'password',
						'size'	=> 30,
						'class'	=> 'span4',
						'placeholder'=> 'Password'
					);
					$remember = array(
						'name'	=> 'remember',
						'id'	=> 'remember',
						'value'	=> 1,
						'checked'	=> set_value('remember'),
						'style' => 'margin:0;padding:0',
					);
					$captcha = array(
						'name'	=> 'captcha',
						'id'	=> 'captcha',
						'maxlength'	=> 8,
					);
					$formAttr=array('id'=>'loginForm');
				?>
				<?php echo form_open($this->uri->uri_string(),$formAttr); ?>
				
						
				<div class="control-group">
					<div class="controls">		
						<div class="input-prepend">
							<span class="add-on"><img src="<?php echo base_url();?>assets/img/mail.png"></span>
							<?php echo form_input($login); ?>
							
						</div>
						<span class="help-inline" style="color:red;">
						<?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
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
						<?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
						</span>
					</div>
				</div>
				
				<div class="control-group">
					<div class="controls">	
						<div class="form_bu clearfix">
							<input type="checkbox" class="styled" name="remember" id="remember" value="1">Remember Me
							<?php //echo form_checkbox($remember); ?>
							<?php //echo form_label('Remember me', $remember['id']); ?>
						</div>
						
					</div>
				</div>
				
						<div class="form_bu clearfix">
						<input class="btn btn-large" type="submit" value="Let Me In">
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
               <img src="<?php echo base_url();?>assets/img/facebook_big.png">
               <h2>Search many of <br>
                  colleges and there <br>
                  information as Per your <br>
                  Requirments..
               </h2>
            </article>
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