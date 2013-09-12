<div role="main" id="main">
<div class="container">
	<ul class="breadcrumb univ_breadcrumb">
	  <li><a href="<?php echo base_url()?>">Home</a> <span class="divider"><i class=" icon-arrow-right"></i></span></li>
	  <li>Contact Us </li>
	</ul>
	<div class="row">
		<div class="span6">
			<div class="well">
				<blockquote>
					<p class="text-info">Contact Us!</p>
					<small>MeetUniv.Com - Registered Office</small>
					E-11,<br>Greater Kailash Part 1<br>New Delhi
				</blockquote>
			</div>
			
			<br/><br/>
		</div>
		<div class="span6">
			<h4>Reach Us! <!--Fill Up the Details!--></h4>
		  <form action="" method="post">
			  <?php if(form_error('name')||form_error('email')||form_error('type')||form_error('message')){?>
			  <div class="alert alert-error"  id="contact-error">
				  <?php echo form_error('name');?>
				 <?php echo form_error('email');?>
				 <?php echo form_error('type');?>
				 <?php echo form_error('message');?>
			  </div><?php }?>
			  <?php if(isset($success)){?>
				<div class="alert alert-success"  id="contact-error">
				  Success fully saved!
			  </div><?php }?>
			  <div class="controls controls-row">
				  <input id="name" name="name" type="text" class="span3" placeholder="Name"> 
				  <input id="email" name="email" type="email" class="span3" placeholder="Email address">
			  </div>
			  <div class="controls controls-row">
				  <select name="type" id="type">
					<option value="">Type</option>
					<option value="1" <?php echo(isset($_GET['type']) && $_GET['type']==1)?"selected":"";?>>Contact US</option>
					<option value="2" <?php echo(isset($_GET['type']) && $_GET['type']==2)?"selected":"";?>>Jobs</option>
					<option value="3" <?php echo(isset($_GET['type']) && $_GET['type']==3)?"selected":"";?>>Experts Help</option>
					<option value="4">I Want More</option>
				  </select>
			  </div>
			  <div class="controls">
				  <textarea id="message" name="message" class="span6" placeholder="Your Message" rows="5"></textarea>
			  </div>			  
			  <div class="controls">
				  <button id="contact-submit" name="submit-contact" type="submit" class="btn btn-primary input-medium pull-right">Send</button>
			  </div>
			  <br><br>
		  </form>
		</div>
	</div>
</div>
</div>
	<?php $this->load->view('layout/js');?>
	<script>
		$(document).ready(function(){
			$('#type').change(function(){
				if($('#type option:selected').val()==4)
				{
					$('#message').val('We want to give you guys more . Too Bad there are just 24Hrs in a day . Motivate our team of developers , content writers /curators , counselors to get you more. Drop in a email. Will help us priortise');
				}
			});
		});
	</script>