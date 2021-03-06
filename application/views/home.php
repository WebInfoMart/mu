<!--model open-->
<div id="betaModal" class="modal hide fade">
 <span  id="sendSmsForm">
    <div class="modal-header">
            <button class="close" data-dismiss="modal">�</button>
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
                        <span class="add-on">+91</span><input id="smsphone" class="prependedInput" size="10" type="text" placeholder="Mobile phone" value="<?php echo (isset($userData)&&$userData)?$userData['mobile']:'';?>">
                    
						<input type="hidden" id="connectId" value="">
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
            <button class="close" data-dismiss="modal">�</button>
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
						<button class="btn btn-medium" type="button" data-dismiss="modal">Cancel</button>
					</div>
				</form>
</div>
</span>
    <div class="modal-footer">
        <p>&copy; MeetUniv.Com</p>
    </div>
</div>	  
<!--model close-->	  
	  <!--Slider-->
      <div itemscope itemtype="http://schema.org/Event" id="myCarousel" class="carousel slide">
         <ol itemscope itemtype="http://schema.org/Event" class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
         </ol>
         <!-- Carousel items -->
         <div class="carousel-inner">
			<article class="active item">
               <img src="<?php echo base_url()?>assets/img/college_search.jpg">
				<!--<div style="position:absolute; top:370px; left:336px; width:830px;">
					<div id="ca-container" class="ca-container">
					  <div class="ca-wrapper">
					  
								<div class="ca-item ca-item-1">
									<div class="ca-item-main">
										<div class="ca-icon"></div>
									</div>
								</div>
					  
								<div class="ca-item ca-item-2">
									<div class="ca-item-main">
										<div class="ca-icon"></div>
									</div>
								</div>
					  
								<div class="ca-item ca-item-3">
									<div class="ca-item-main">
										<div class="ca-icon"></div>
										</div>
									</div>
						
								<div class="ca-item ca-item-4">
									<div class="ca-item-main">
										<div class="ca-icon"></div>
										
									</div>
									
								</div>
								<div class="ca-item ca-item-5">
									<div class="ca-item-main">
										<div class="ca-icon"></div>
									</div>
								</div>
					  
								</div>
								
					</div>
               </div>-->
			   <!-- scroll items starts -->
			   <!--<marquee style="position:absolute; top:353px; left:442px; width:700px;">
			   <?php 
			   foreach($featuredCollges as $clg){?>
                    <img src="<?php echo base_url()?>assets/univ_logo/<?php echo $clg['logo'];?>" alt="<?php echo $clg['univName'];?>" title="<?php echo $clg['univName'];?>" style="max-width: 80px;margin: 10px;" />
				<?php }?>
                  </marquee>-->
               <div style="position:absolute; top:380px; left:488px;" >
                 <div id="demo5" class="scroll-img">
                  <ul>
                    <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/img/thumb1.jpg"></a></li>
                    <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/img/thumb2.jpg"></a></li>
                    <li><a href="<?php echo base_url()?>college/Sheffield-Hallam-University/NjM5" target="_blank"><img src="<?php echo base_url();?>assets/img/thumb3.jpg"></a></li>
                    <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/img/thumb4.jpg"></a></li>
                    <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/img/thumb5.jpg"></a></li>
                    <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/img/thumb1.jpg"></a></li>
                    <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/img/thumb2.jpg"></a></li>
                    <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/img/thumb3.jpg"></a></li>
                    <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/img/thumb4.jpg"></a></li>
                    <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/img/thumb5.jpg"></a></li>
                    <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/img/thumb1.jpg"></a></li>
                    <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/img/thumb2.jpg"></a></li>
                    <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/img/thumb3.jpg"></a></li>
                    <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/img/thumb4.jpg"></a></li>
                    <li><a href="#" target="_blank"><img src="<?php echo base_url();?>assets/img/thumb5.jpg"></a></li>
                  </ul>
                </div>
              </div>
            <!-- scroll items ends -->
               <div class="slider_content" id="test_prearation" style="bottom:20%;width:330px;top:59px;">
                  <h2 class="test_college"></h2>
                  
                  <section class="college_content">
                     <article>
                        <div class="para-1">
                          <p> Choosing the right College is important to begin your successful career. We provide a listing of more than 1000  Colleges worldwide. </p>
                           <button class="btn btn-small slider_bu" type="button" onclick="location.replace('<?php echo base_url('college-study-in-abroad')?>')">Take a Look</button>
                        </div>
                     </article>
                     <article>
                          <div class="para-1">
                           <h3>Most Searched Colleges</h3>
                           <ul>
						   <?php foreach($featuredCollges as $clg){
						   $link = str_replace(' ','-',$clg['univName']);
						   ?>
                              <li>
							  <a class="feature-link" href="<?php echo base_url().'college/'.$link.'/'.base64_encode($clg['id']);?>">
							  <?php echo $clg['univName']?>
							  </a>
							  </li>
							  <?php }?>
                           </ul>
						   <div class="pull-right" style="padding: 0px 20px;">
							<a href="<?php echo base_url('college-study-in-abroad')?>" class="see-more"> see more</a>
						   </div>
                        </div>
                     </article>
                    </section>
               </div>
            </article>
			<article class="item">
               <img src="<?php echo base_url()?>assets/img/connect_img.jpg">
               <div class="slider_content" id="career">
                  <h2 class="connect"><img itemprop="image" src="<?php echo base_url()?>assets/img/mu-connect.png"></h2>
                  <div id="connect_content" class="clearfix">
                     <article id="univ_connect" class="no_border">
                        <table class="table table-hover">
                           
						<?php
						foreach($connect as $connectshow)
						{?>   
						   <tr>
                              <td id="<?php echo $connectshow->id?>" class="univ"><strong><?php echo substr($this->connectmodel->getUniversityNameById($connectshow->univId),0,20)."..";?></strong><br>
                                 <small itemprop="name"> <?php echo $connectshow->tagLine;?></small>
                              </td>
                              <td>
                                 <date itemprop="startDate" content="<?php echo $connectshow->date?>" class="homedate"><?php echo $connectshow->date?></date>
                                 <div class="place"><?php echo $this->collegemodel->getUnivLocationById($connectshow->cityId,$connectshow->countryId);?></div>
                              </td>
                           </tr>
						<?php } ?>
                        </table>
						<span class="pull-right" style="padding: 10px 40px;font-style:normal;"><a href="<?php echo base_url('connect');?>"> see more</a></span>
                     </article>
                  </div>
               </div>
			   <?php
				$counter=0;
			   foreach($connect as $connect)
				{
				$univName=$this->connectmodel->getUniversityNameById($connect->univId);
				$location=$this->collegemodel->getUnivLocationById($connect->cityId,$connect->countryId);
				$rest = substr($connect->id, 1, +2); 
				$c_value = $rest + $connect->counter;
				$counterValue = floor($c_value/4);
				?>
			   <aside id="slide<?php echo $connect->id;?>" class="slider_content extra_block" style="z-index:888">
					<div class="row">
						<div class="span4">
							<div class='content_blog pull-left clearfix'>
								<h4><?php echo $univName;?></h4>
								<hr>
								<p><?php echo $connect->tagLine;?></p>
								<p class="date-time"><i class="icon-calendar"></i>&nbsp;&nbsp;<?php echo $connect->date;?><br>
								<i class="icon-time"></i>&nbsp;&nbsp;<?php echo $connect->time?>
								<?php if($connect->location){?>
								<br><i class="icon-map-marker"></i>&nbsp;&nbsp;<?php echo $connect->location?>
								<?php }?>
								</p>
							</div>
						</div>
						<div class="span2 mu-connect">
							<aside class="celender">
								<div class="cl"> <small class="date"><?php echo $connect->month;?></small> <small class="day"><?php echo $connect->connectDate?></small> </div>
								<div class="btn-group">
								<button class="btn dropdown-toggle btn-success btn-mini" data-toggle="dropdown">Get Details <span class="caret"></span></button>
								<ul class="dropdown-menu pull-right">
								  <li><a href="javascript:void(0)" onclick='ConnectMU("<?php echo $connect->id;?>","<?php echo $univName;?>","<?php echo $connect->tagLine;?>","<?php echo $connect->date;?>","<?php echo $location;?>");'><i class="icon-mobile-phone"></i>&nbsp;&nbsp;SMS</a></li>
								  <li><a href="#"><i class="icon-envelope-alt"></i>&nbsp;&nbsp;E-Mail</a></li>
								</ul>
								</div>
								<button class="btn btn-mini btn-primary voilet" type="button" id="attending-<?php echo $counter;?>" onclick="showAttending(this.id);">I am Attending</button>
								<p class="attending_count">Attending <a href="#">+<?php echo $counterValue;?></a></p>
							</aside>
						</div>
					</div>
					<div class="row">
						<div class="span6">
							<section class="attending attending-<?php echo $counter;?>" id="attending" style="display:none;margin: 0px 20px 10px;">
								 <div class="input-prepend"> <span class="add-on"><img src="<?php echo base_url();?>assets/img/name-icon.png"></span>
									<input class="input-small" id="name-<?php echo $counter;?>" type="text" placeholder="Full Name:" value="<?php echo (isset($userData)&&$userData)?$userData['fullname']:'';?>">
									
									<input type="hidden" id="connectid-<?php echo $counter;?>" name="connectid-<?php echo $counter;?>" value="<?php echo $connect->id;?>">
									
								 </div>
								 <div class="input-prepend"> <span class="add-on"><img src="<?php echo base_url();?>assets/img/mail-icon.png"></span>
									<input class="input-small" id="email-<?php echo $counter;?>" type="text" placeholder="Email:" value="<?php echo (isset($userData)&&$userData)?$userData['email']:'';?>">
								 </div>
								 <div class="input-prepend"> <span class="add-on"><img src="<?php echo base_url();?>assets/img/cell-icon.png"></span>
									<input class="input-small" id="phone-<?php echo $counter;?>" type="text" placeholder="Mobile No:" value="<?php echo (isset($userData)&&$userData)?$userData['mobile']:'';?>">
								 </div>
								 <input class="input-small" id="connect-<?php echo $counter;?>" value="<?php echo $connect->id;?>" type="hidden">
								 <button class="btn btn-mini btn-primary green_bu" type="button" onclick="attendEvent(<?php echo $counter;?>)">Connect</button>
							</section>
							<section id="attendingsuccess" class="attendingsuccess-<?php echo $counter;?>" style="padding: 0px 75px 10px;color: green;display:none;">
								 <strong>You have successfully register for this Event!</strong>
							</section>
						</div>
					</div>
               </aside>
			   <?php $counter++;}
			   ?>
            </article>
            <article class="item">
               <img src="<?php echo base_url()?>assets/img/courses.jpg">
               <div class="slider_content" id="cource">
                  <h2 class="no_margin"><img src="<?php echo base_url()?>assets/img/search-courses.png"></h2>
                  <div id="cource_content" class="clearfix">
                     <p><i>Search our database of over 100,000 courses worldwide. Fill in the details below and click on the Start course search button to search for a specific course. </i></p>
                     <form method="post" action="<?php echo base_url();?>college/searchCollegeByCourse" name="search" id="search">
					 <aside id="s_search">
                        <p  class="no_margin">
                           <input type="text" id="collegeFilter" data-provide="typeahead" data-items="4" placeholder="Search Course" name="search" autocomplete="off">
                           <button class="btn" type="submit">Search</button>
                        </p>
                     </aside>
					 </form>
                     <article>
                        <h3>Recently Searched courses:</h3>
                        <p> Humanities, Social and Political Science, Veterinary Medicine, MBA Finance, Accountancy<br>
                           <span class="pull-right" style="padding: 10px 25px;font-style:normal;">
						   <a href="#">see more</a>
						   </span>
                        </p>
                     </article>
<!-- 
                     <article>
                        <h4> Popular courses: </h4>
                        <p> Humanities, Social and Political Sciences, Veterinary Medicine Bachelors in 
                           Engineering, Theology and Religous Studies Management Studies.<br>
                           <a href="#">see more courses</a>
                        </p>
                     </article>
 -->
                  </div>
               </div>
            </article>
            <article class="item">
               <img src="<?php echo base_url()?>assets/img/career.jpg">
               <div class="slider_content" id="career">
                  <h2 class="no_margin"><img src="<?php echo base_url()?>assets/img/career-guide.png"></h2>
                  <div id="career_content" class="clearfix">
                     <article>
                        <h4><a href="#">Counselling</a></h4>
                        <p> Need any guidance in choosing the right college? career? subject? Our counsellors will assist you. </p>
                     </article>
                     <article>
                        <h4><a href="#">Free Advice</a></h4>
                        <p> In a dilemma? Valuable suggestions costs nothing. Contact us for 'free' advice! </p>
                     </article>
                     <article>
                        <h4><a href="#">Helping Hand / Choose Correct Stream</a></h4>
                        <p> Unable to decide which is the right path for you? Let us lend you a helping hand to choose the right career.
                        </p>
                     </article>
                     <button class="btn sl_bn" type="button" onclick="window.location.href='<?php echo base_url('gifted')?>'">Gifted</button>
                  </div>
               </div>
            </article>
			<article class="item">
               <img src="<?php echo base_url()?>assets/img/slide_1.jpg">
               <div class="slider_content" id="test_prearation">
                  <h2 class="test_heading"></h2>
                  <section class="test_content">
                     <article>
                        <img src="<?php echo base_url()?>assets/img/trial-test.png" class="pull-left adj_img">
                        <div class="para">
                           <h3>Trial Tests</h3>
                           <p><i>To help you get the perfect score in exams, we have a series of trial tests. Challenge yourself!</i></p>
                           <button class="btn btn-small slider_bu" type="button" onclick="window.location.href='<?php echo base_url('ielts-preparation')?>'">See Test List</button>
                        </div>
                     </article>
                     <article>
                        <img src="<?php echo base_url()?>assets/img/purchase-test-material.png" class="pull-left adj_img">
                        <div class="para">
                           <h3>Options to purchase test material from multiple sources</h3>
                           <p><i>Need more material for practicing? We are providing you with various options to purchase test material.</i></p>
                           <button class="btn btn-small slider_bu" type="button" onclick="window.location.href='<?php echo base_url('ielts_preparation')?>'">More Info</button>
                        </div>
                     </article>
<!-- 
                     <aside>
                        <h4> POPULAR TEST: </h4>
                        <p> IELTS preparation test, TOEFL test, GRE sample quiz, Language Test <a href="#">see more</a></p>
                     </aside>
 -->
                  </section>
               </div>
            </article>
            <!--conect slider-->
            
         </div>
         <!-- Carousel nav -->
         <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a> <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a> 
		 
		<meta itemprop="url" content="http://www.meetuniv.com">
		<meta itemprop="description" content="2014 Abroad University Events & Abroad Education fairs in India : Meetuniv.com">
		<span itemprop="location" itemscope itemtype="http://schema.org/Place">
		<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
		<meta itemprop="postalCode" content="400058">
		<meta itemprop="addressCountry" content="India">
		<meta itemprop="addressRegion" content="Maharashtra">
		<meta itemprop="addressLocality" content="Next to BMC Office,  Opposite Andheri Station, Andheri (West), Mumbai">
		<meta itemprop="streetAddress" content="Business Point, 2nd Floor, Paliram Road, Off S.V. Road, Behind Brahmakumari Hospital,"></span></span></div>
		 
		 
      </div>
	    </div>
      <!--End Slider-->
      
	  <!--main-->
	  <div role="main" id="main">
	  <div class="container">
	  <div class="row main-div">
		<span class="span12">
			<h3>MeetUniv.Com  -  Guide to college information</h3>
			<hr>
			<div class="row">
				<div class="span8">
					<div class="row main-row">
						<div class="span4">
							<div class="row" onclick="window.location.href='<?php echo base_url('college-study-in-abroad')?>'" style="cursor:pointer;">
							<div class="span1">
								<i class="icon-comments-alt"></i>
							</div>
							<div class="span3">
								<h4>Get Counseled</h4>
								<p>Not sure where to start from ?<br>
									Confused start your search here:<br/><br/>
								</p>
								<p><a href="<?php echo base_url('college-study-in-abroad')?>">College search &rarr;</a></p>
							</div>
							</div>
						</div>
						<div class="span4">
							<div class="row" onclick="window.location.href='<?php echo base_url('connect')?>'" style="cursor:pointer;">
							<div class="span1">
								<i class="icon-sitemap"></i>
							</div>
							<div class="span3">
								<h4>Get Connected</h4>
								<p>Shortlisted College!<br>
									Know your options to get connected - Directly!
								</p>
								<p><a href="<?php echo base_url('connect')?>">MU Connect &rarr;</a></p>
							</div>
							</div>
						</div>
					</div>
					<div class="row main-row">
						<div class="span4">
							<div class="row" onclick="window.location.href='<?php echo base_url('ielts-preparation')?>'" style="cursor:pointer;">
							<div class="span1">
								<i class="icon-laptop"></i>
							</div>
							<div class="span3">
								<h4>Get Coached</h4>
								<p>Help in your application process<br>
									Free Courseware for Exams.<br/><br/>
								</p>
								<p><a href="<?php echo base_url('ielts-preparation')?>">IELTS - Academic / English &rarr;</a></p>
							</div>
							</div>
						</div>
						<div class="span4">
							<div class="row" onclick="window.location.href='<?php echo base_url('gifted-intro')?>'" style="cursor:pointer;">
							<div class="span1">
								<i class="icon-magic"></i>
							</div>
							<div class="span3">
								<h4>Gifted - <small class="txt-info">Know what you excel at?</small></h4>
								<p>Don't know which stream to choose?<br>
									Confused Career choices?
								</p>
								<p><a href="<?php echo base_url('gifted-intro')?>">I am Gifted &rarr;</a></p>
							</div>
							</div>
						</div>
					</div>
				</div>
				<!---<aside class="span4" id="british_council" onclick="window.open('http://www.britishcouncil.in/why-the-uk')">--->
				<aside class="span4" id="british_council">
					<?php echo $this->load->view('rotator/homeImgRotator');?>
					<!--<h4>British Council</h4>
					
					<p>
						The most trusted source of information about studying in the UK, in association with MeetUniv.com outlines the essential information for you to know & where to begin from.Single source , to keep you updated with the happenings in UK education.
					</p>-->
				</aside>
			</div>
		</span>
		<span class="span12 bottom-span">
			<div class="row">
				<div class="span8">
					<div class="row">
						<div class="span6">
							<div></div>
							<h3><i class="icon-fast-forward"></i> &nbsp; Want to get into Harvard or MIT ?</h3>
							<h5>Let experts help you through the process.</h5>
							<div class="pull-right">
							<button class="btn btn-info" type="button" onclick="location.replace('<?php echo base_url('contact-us')?>?type=3')">GET EXPERT HELP NOW</button>
							</div>
						</div>
						<div class="span2">
							<img src="<?php echo base_url();?>assets/img/feature_photo.png"/>
						</div>
					</div>
				</div>
				<div class="span4">
					<h4>Spotlight</h4>
					<ul>
						<?php foreach($latestArticles as $article){ 
						$articleTitle = str_replace(".","",$article->title);
						$articlerows = str_replace(" ","-",$articleTitle);
						$art = rtrim($articlerows, "-"); 
						?>
						<p><i class="icon-play-circle" style="color:green;font-size:12px"></i>&nbsp;<a href="<?php echo base_url();?>learn/blog/read-<?php echo $art; ?>-<?php echo $article->id;?>.html" style="font-family:'Open Sans', sans-serif;font-size:12px;color:#333333;"><?php echo $articleTitle; 
						?></a></p>
						<?php } ?>
						<!--<p><a href="#"> Myths about College Scholarships</a></p>
						<p><a href="#"> Key Steps in the Law Admission Process</a></p>
						<p><a href="#"> List of Rolling Admissions Schools</a></p>
						<p><a href="#"> The Basics of Financial Aid </a></p>
						<p><a href="#">Information for Chinese Students</a></p>-->
						<!--<p><a href="#"> Information for Indian Students</a></p>-->
					</ul>
				</div>
			</div>
		</span>
	  </div>
	  </div>
	  </div>
      <!--end main-->
      
      <!--for offline testing 
         <script src="js/jquery-1.9.1.min.js"></script>
         
         -->
   <?php $this->load->view('layout/js');?>
	
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.scrollbox.js"></script>
	
	<!---Added by Raghvendra for course search--->
	<script src="<?php echo base_url();?>assets/js/bootstrap-dropdown.js"></script>
	  <script src="<?php echo base_url();?>assets/js/bootstrap-typeahead.js"></script>
	  <script>
					$("[rel=tooltip]").tooltip({ placement: 'bottom'});
					$(document).ready(function(){
						
						/*typehead*/
						/* $.get('<?php echo base_url()?>college/cityJsonList',function(data){
									console.log(data);
								}); */
						$('#search').submit(function(){
							var c_name = $('#collegeFilter').val();
							
							//var courseName = c_name.replace("-","=");
							
							var courseName = c_name.replace(/\s+/g, '+');
							//var courseName = c_name.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').replace(/\//g, "-");
							window.location.href = "<?php echo base_url();?>college/searchCollegeByCourse/"+courseName;
							return false;
						});
						$('#collegeFilter').typeahead({
							source: function(query, process){
								 //return $.get('<?php echo base_url()?>/college/courseJsonList',function(data){
								 return $.get('<?php echo base_url()?>/assets/courses.json',function(data){
									return process(data)
								}); 
							}
						});
						
						/*end*/
						$('.dropdown-toggle').dropdown();
						$("#pagination a").click(function(){
							var url = $(this).attr('href');
							var temp = url.split('/');
							
							var data = {offset:temp[6]};
							$.ajax({
								type	:	'POST',
								data	:	data,
								url		:	url,
								beforeSend: function(){
									$("#collegeContent").css('opicity','0.4');
								},
								success: function(data){
									$("#collegeContent").html(data);
									$("#collegeContent").css('opicity','1');
								},
								
							})
							return false;
						});
					
					});
					
					function searchCollegesByCourse()
					{
						var courseName = $("#collegeFilter").val();
						//alert(courseName);
						//if(courseName!='')
						{
						  url="<?php echo base_url();?>college/searchCollegeByCourse";
							data = {courseName:$("#collegeFilter").val()};
							 $.ajax({
								type	:	'POST',
								data	:	data,
								url		:	url,
								success: function(data){
									//alert(data);
									
									//window.location.href="<?php echo base_url();?>college/c";
									
								},
								
							}) 
						 
						  //$("#locationFilter").val('');
						}
					}
	</script>
<!---end here---->
	<script>
         $(document).ready(function(){
         	
			$('#demo5').scrollbox({
				direction: 'h',
				distance: 134
			  });
			  
			  var queueNext = 7;
			  (function () {
				$('#demo6-queue ul').append('<li><p>'+ queueNext +'</p></li>');
				queueNext++;
				setTimeout(arguments.callee, 2000 + parseInt(Math.random() * 2000, 10));
			  }());
			
			/*  $(".univ").hover(function(){
			  var pid=$(this).attr('id');
			  $(".extra_block").animate({right:'209'},'fast',function(){
			  
				  $(".extra_block").removeClass("show-div");
				  $("#slide"+pid).addClass("show-div");
				  $("#slide"+pid).animate({right:'565'},'slow');
			  });
			   
			 }); */
			 $(".univ").hover(function(){
			  var pid=$(this).attr('id');
				  $(".extra_block").removeClass("show-div");
				  $(".extra_block").css('right','209px');
				  $("#slide"+pid).addClass("show-div");
				  $("#slide"+pid).animate({right:'565'},'slow');
			 },function(){});
			 
			  /* $(".univ").mouseout(function(){
			  var pid=$(this).attr('id');
			   $(".extra_block").removeClass("show-div");
			   $("#slide"+pid).animate({right:'190'}); 
			 });  */
         							   
        });
		$(document).mouseup(function (e)
		{
			var container = $(".slider_content");

			if (!container.is(e.target) // if the target of the click isn't the container...
				&& container.has(e.target).length === 0) // ... nor a descendant of the container
			{
				$(".extra_block").animate({right:'209'},function(){$(".extra_block").removeClass("show-div");});
			
			}
		});
		function ConnectMU(connectId,univName,eventName,eventDate,eventPlace)
		{
			$("#universityName").text(univName);
			$("#eventName").html(eventName);
			$("#eventDate").html(eventDate);
			$("#eventPlace").html(eventPlace);
			$("#connectId").val(connectId);
			$('#registrationForm').hide();
			$('#sendSmsForm').show();
			$("#betaModal").modal('show');
		}
		function sendConnectSms()
		{
			
			url="<?php echo base_url('connect/attendEvent')?>";
			var fullname = $("#smsfullname").val();
			var email = $("#smsemail").val();
			var phone = $("#smsphone").val();
			var connectId = $("#connectId").val();
			var error = '';
			if(fullname=='' || fullname==null)
			{
				error=error+"Name required!<br>";
			}
			if(email=='' || email==null)
			{
				error=error+"Email required!<br>";
			}
			else
			{
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;	
				if (reg.test(email) == false) 
				{         
					$("#email").addClass('needsfilled');
					error = error+"Email is not valid.<br>";
					
				}
			}
			if(phone=='' || phone==null || isNaN(phone) || phone.length!=10)
			{
				error=error+"Phone Number Not Valid!";
			}
			if(error!='')
			{
				$('#sendSmsError').html(error);
				$('#sendSmsError').fadeIn();
				return;
			}
			var data = {name:fullname,email:email,phone:phone,type:'sms',connectId:connectId}
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
		
		function showAttending(id)
		{
			$(".attending").hide();
			$('.'+id).fadeIn();
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
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;	
				if (reg.test(email) == false) 
				{         
					$('#email-'+id).addClass('needsfilled');
					valid = false;
				}
				else
				{
					$('#email-'+id).removeClass('needsfilled');
				}
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
			var data = {name:$('#name-'+id).val(),phone:$('#phone-'+id).val(),email:$('#email-'+id).val(),connectId:connectId,type:'register'};
			$.post("<?php echo base_url('connect/attendEvent')?>",data,function(msg){
			console.log(msg);
			$('.attending-'+id).hide();
			$(".attendingsuccess-"+id).fadeIn();
			var attendCount = parseInt($('#attendCount-'+id).val());
			$('#attendCount-'+id).val(attendCount+1);
			$('#attendCountTxt-'+id).text("+"+(attendCount+1));
			$(".name").val(fullname);
			$(".email").val(email);
			$(".phone").val(phone);
			});
			}
		}
         
      </script>
   