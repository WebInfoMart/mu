 <!--main-->
 <div id="betaModal" class="modal hide fade">
 <span  id="sendSmsForm">
    <div class="modal-header">
            <button class="close" data-dismiss="modal">×</button>
            <h3 id="eventName">Event Name</h3>
    </div>
<div class="modal-body">
    <div class="row-fluid">
        <div class="span12">
            <div class="span6">
				  <div class="thumbnail" style="padding: 0;line-height:12px;">
					<div style="padding:4px">
					  <img alt="300x200" style="width: 248px;height: 100px;" src="http://placehold.it/200x150">
					</div>
					<div class="caption" style="padding:0px 9px;">
					  <h4 id="universityName" style="color:#373;">Project A</h4>
					  <p><a class="btn btn-primary btn-mini" href="#"><i class="icon-plus-sign"></i> Add College</a></p>
					  <p id="eventLocation">
						<i class="icon icon-calendar"></i> <span id="eventDate">Date</span>
						</p><p><i class="icon icon-map-marker"></i> <span id="eventPlace">Place, Country</span>
					  </p>
					</div>
					<div class="modal-footer" style="text-align: left">
					  <div class="progress progress-striped active" style="background: #ddd">
						<div class="bar" style="width: 60%;"></div>
					  </div>
					  <div class="row-fluid">
						<div class="span4"><b>60%</b><br/><small>FUNDED</small></div>
						<div class="span4"><b>$400</b><br/><small>PLEDGED</small></div>
						<div class="span4"><b>18</b><br/><small>DAYS</small></div>
					  </div>
					</div>
            </div>
            </div>
            <div class="span6">
                <form class="form-horizontal">
                    <p class="help-block">Name</p>
                    <div class="input-prepend">
                        <span class="add-on">*</span><input id="smsfullname" class="prependedInput" size="16" type="text" placeholder="Full Name" value="<?php echo (isset($userData)&&$userData)?$userData['fullname']:'';?>">
                    </div>
                    <p class="help-block">Email</p>
                    <div class="input-prepend">
                        <span class="add-on">@</span><input id="smsemail" class="prependedInput" size="16" type="email" placeholder="Email" value="<?php echo (isset($userData)&&$userData)?$userData['email']:'';?>">
                    </div>
					<p class="help-block">Phone</p>
                    <div class="input-prepend">
                        <span class="add-on">@</span><input id="smsphone" class="prependedInput" size="10" type="text" placeholder="Mobile phone" value="<?php echo (isset($userData)&&$userData)?$userData['mobile']:'';?>">
                    </div>
                  	<hr>
					<div class="help-block" >
                        <div class="alert alert-error" id="sendSmsError" style="display:none;">
						  
						</div>
                    </div>
                    <div class="help-block">
                        <button type="button" class="btn btn-small btn-info pull-right" onclick="sendConnectSms();">Send SMS</button>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>
</span>
<span id="registrationForm" style="display:none;">
<div class="modal-header">
            <button class="close" data-dismiss="modal">×</button>
            <h4>Sent Successfully!</h4>
    </div>
<div class="modal-body">
    <form action="http://localhost/mu/register" method="post" accept-charset="utf-8" id="registerForm">				<div class="control-group">
					<div class="controls">
						<div class="input-prepend">
							<span class="add-on"><img src="http://localhost/mu/assets/img/student_name.png"></span>
							<input type="text" name="fullname" value="" id="fullname" size="30" class="span4" placeholder="Full Name">						</div>
						<span class="help-inline" style="color:red;"></span>
					</div>
				</div>
						
				<div class="control-group">
					<div class="controls">		
						<div class="input-prepend">
							<span class="add-on"><img src="http://localhost/mu/assets/img/mail.png"></span>
							<input type="text" name="email" value="" id="email" maxlength="80" size="30" class="span4" placeholder="Email">							
						</div>
						<span class="help-inline" style="color:red;">
												</span>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">	
						<div class="input-prepend">
							<span class="add-on"><img src="http://localhost/mu/assets/img/Mobile.png"></span>
							<input type="text" name="mobile" value="" id="mobile" maxlength="10" size="30" class="span4" placeholder="Mobile">						</div>
						<span class="help-inline" style="color:red;">
												</span>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">	
						<div class="input-prepend">
							<span class="add-on"><img src="http://localhost/mu/assets/img/Password.png"></span>
							<input type="password" name="password" value="" id="password" maxlength="20" size="30" class="span4" placeholder="Password">						</div>
						<span class="help-inline" style="color:red;">
												</span>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div class="input-prepend">
							<span class="add-on"><img src="http://localhost/mu/assets/img/Confirm-Password.png"></span>
							<input type="password" name="confirm_password" value="" id="confirm_password" maxlength="20" size="30" class="span4" placeholder="Confirm Password">						</div>
						<span class="help-inline" style="color:red;">
													</span>
					</div>
				</div>
						<div class="form_bu clearfix">
						<button class="btn btn-medium btn-info" type="button" onclick="$('#registerForm').submit();">Create Account</button>
						<button class="btn btn-medium" type="button">Cancel</button>
					</div>
				</form>
</div>
</span>
    <div class="modal-footer">
        <p>&copy; MeetUniv.Com</p>
    </div>
</div>
      <div role="main" id="main">
         <div class="row container">
            <article id="college_listing" class="page">
               <ul class="breadcrumb univ_breadcrumb">
                  <li><a href="<?php echo base_url()?>">Home</a> <span class="divider"><i class=" icon-arrow-right"></i></span></li>
                  <li><a href="<?php echo base_url('connect')?>">Connect Search</a> <span class="divider"><i class=" icon-arrow-right"></i></span></li>
                  <li class="active">Search Result</li>
               </ul>
               <div class="clearfix"></div>
               <div class="clearfix"></div>
               <div class="row clearfix" id="collage_listing_page">
                  <article class="span12">
                     <section id="sort_listing">
                        <h2 class="pull-left">Connect Listing - All</h2>
                        <ul class="inline pull-right">
                           <li>Sort By</li>
                           <li class="active"><a href="#">Date</a></li>
                           <li><a href="#"> University</a></li>
                           <li><a href="#"> Destination</a></li>
                        </ul>
                     </section>
				  <div class="row">
					 <section class="span3">
                        <h5 class="no_margin margin_b_10">Filter Your Search:</h5>
                        <div class="tab_spine clearfix">
							<h4>Location</h4>
							<ul class="unstyled">
							<li><i class="icon-remove-sign icon-class-red"></i><a href="#">50 miles of 24712</a></li>
							<li><i class="icon-remove-sign icon-class-red"></i><a href="#">West Virginia</a></li>
							</ul>
						</div>
						<div class="tab_spine clearfix">
							<h4>Collage Type</h4>
							<ul class="unstyled">
							<li><i class="icon-remove-sign icon-class-red"></i><a href="#">50 miles of 24712</a></li>
							<li><i class="icon-remove-sign icon-class-red"></i><a href="#">West Virginia</a></li>
							</ul>
						</div>
						<div class="tab_spine clearfix">
							<h4>Interest</h4>
							<ul class="unstyled">
							<li><i class="icon-remove-sign icon-class-red"></i><a href="#">50 miles of 24712</a></li>
							<li><i class="icon-remove-sign icon-class-red"></i><a href="#">West Virginia</a></li>
							</ul>
						</div>
						<div class="tab_spine clearfix">
							<h4>Financial</h4>
							<ul class="unstyled">
							<li><i class="icon-remove-sign icon-class-red"></i><a href="#">50 miles of 24712</a></li>
							<li><i class="icon-remove-sign icon-class-red"></i><a href="#">West Virginia</a></li>
							</ul>
						</div>
						<div class="tab_spine clearfix">
							<h4>Critical</h4>
							<ul class="unstyled">
							<li><i class="icon-remove-sign icon-class-red"></i><a href="#">50 miles of 24712</a></li>
							<li><i class="icon-remove-sign icon-class-red"></i><a href="#">West Virginia</a></li>
							</ul>
						</div>
						<div class="tab_spine clearfix">
							<h4>Intex</h4>
							<ul class="unstyled">
							<li><i class="icon-remove-sign icon-class-red"></i><a href="#">50 miles of 24712</a></li>
							<li><i class="icon-remove-sign icon-class-red"></i><a href="#">West Virginia</a></li>
							</ul>
						</div>
                     </section>
					 <div class="span6" id="connectPagination">
							
					</div>
                     
					 <article class="span3">
                     <article><!--<img src="<?php echo base_url();?>assets/img/calender.jpg">-->
					 <div class="calendar_test" style="padding: 30px 0px;"></div> </article>
                     <article><img src="<?php echo base_url();?>assets/img/st_georges.png"> </article>
                     <article onclick="window.open('http://www.britishcouncil.in/why-the-uk')" style="cursor:pointer;">
                        <img src="<?php echo base_url();?>assets/img/british-council.png">
                        <h6 class="british-counsil">The most trusted source of information about studying in the UK, in association with MeetUniv.com outlines the essential information for you to know & where to begin from.Single source , to keep you updated with the happenings in UK education.
                        </h5>
                     </article>
					 </article>
                  </div>
				  </article>
                  
               </div>
            </article>
         </div>
      </div>
      <!--end main-->
	  <?php $this->load->view('layout/js');?>
	  <script src="<?php echo base_url();?>assets/js/bootstrap-dropdown.js"></script>
	  <script>
		$(document).ready(function(){
			theMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
				theDays = ["S", "M", "T", "W", "T", "F", "S"];
				theDate= ["05/September/2013",'Current Date','sdfds','blue'];
				
			$('.dropdown-toggle').dropdown();
			$('.calendar_test').calendar({
					months: theMonths,
					days: theDays,
					req_ajax: {
						type: 'get',
						url: '<?php echo base_url('connect/CurrentDate');?>'
					}
				});
			
			$.ajax({
				type	:	'POST',
				data	:	{offset:'6'},
				url		:	"<?php echo base_url('connect/connectPagination')?>",
				beforeSend: function(){
					$("#connectPagination").css('opicity','0.4');
				},
				success: function(data){
					$("#connectPagination").html(data);
					$("#connectPagination").css('opicity','1');
				},
				
			});
		});
		function showAttending(id)
		{
			$('.'+id).fadeIn();
		}
		function ConnectMU(univName,eventName,eventDate,eventPlace)
		{
			$("#universityName").text(univName);
			$("#eventName").html(eventName);
			$("#eventDate").html(eventDate);
			$("#eventPlace").html(eventPlace);
			$("#betaModal").modal('show');
		}
		function sendConnectSms()
		{
			
			url="<?php echo base_url('connect/attendEvent')?>";
			var fullname = $("#smsfullname").val();
			var email = $("#smsemail").val();
			var phone = $("#smsphone").val();
			var error = '';
			if(fullname=='' || fullname==null)
			{
				error=error+"Name required!<br>";
			}
			if(email=='' || email==null)
			{
				error=error+"Email required!<br>";
			}
			if(phone=='' || phone==null || isNaN(phone))
			{
				error=error+"Phone Number Not Valid!";
			}
			if(error!='')
			{
				$('#sendSmsError').html(error);
				$('#sendSmsError').fadeIn();
				return;
			}
			var data = {name:fullname,email:email,phone:phone,type:'sms'}
			$.post(url,data,function(data){
				if(data=="NoLoggedIn")
				{
					$('#sendSmsForm').hide();
					$("#fullname").val($("#smsfullname").val());
					$("#email").val($("#smsemail").val());
					$("#mobile").val($("#smsphone").val());
					$('#registrationForm').fadeIn();
				}
				else
				{
					$("#betaModal").modal('hide');
				}
			});
		}
		function attendEvent(id)
		{
			var fullname = $('#name-'+id).val();
			var phone = $('#phone-'+id).val();
			var email  = $('#email-'+id).val();
			var connectId = $('#connectid-'+id).val();
			var valid = true;
			if(fullname=='' || fullname==null)
			{
				$('#name-'+id).addClass('needsfilled');
				valid = false;
			}
			else
			{
				$('#name-'+id).removeClass('needsfilled');
			}
			if(email=='' || email==null)
			{
				$('#email-'+id).addClass('needsfilled');
				valid = false;
			}
			else
			{
				$('#email-'+id).removeClass('needsfilled');
			}
			if(phone=='' || phone==null || isNaN(phone) || phone.length!=10)
			{
				$('#phone-'+id).addClass('needsfilled');
				valid = false;
			}
			else
			{
				$('#phone-'+id).removeClass('needsfilled');
			}
			
			if(valid == true)
			{
			var data = {name:$('#name-'+id).val(),phone:$('#phone-'+id).val(),email:$('#email-'+id).val(),connectId:$('#connect-'+id).val(),type:'register',connectId:connectId};
			$.post("<?php echo base_url('connect/attendEvent')?>",data,function(msg){
			console.log(msg);
			$('.attending-'+id).hide();
			$(".attendingsuccess-"+id).fadeIn();
			});
			}
		}
	  </script>