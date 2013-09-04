 <!--main-->
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
					 <div class="span6">
							<div class="row">
								<div class="span6">
									<p class="text-right">Showing 10/100 <i class="icon-circle-arrow-right"></i></p>
								</div>
							</div>
							<div class="row connect-listing">
								<article class="span6">
									<div class="row">
										<div class="span4">
											<div class='content_blog pull-left clearfix'>
												<h4>Middlesex University</h4>
												<hr>
												<p>Education UK Exhibition</p>
												<p class="date-time"><i class="icon-calendar"></i>&nbsp;&nbsp;26 Nov 2013<br>
												<i class="icon-map-marker"></i>&nbsp;&nbsp;Mumbai, India</p>
											</div>
										</div>
										<div class="span2 mu-connect">
											<aside class="celender">
												<div class="cl"> <small class="date">NOV</small> <small class="day">26</small> </div>
												<div class="btn-group">
												<button class="btn dropdown-toggle btn-success btn-mini" data-toggle="dropdown">Get Details <span class="caret"></span></button>
												<ul class="dropdown-menu">
												  <li><a href="#"><i class="icon-mobile-phone"></i>&nbsp;&nbsp;SMS</a></li>
												  <li><a href="#"><i class="icon-envelope-alt"></i>&nbsp;&nbsp;E-Mail</a></li>
												</ul>
												</div>
												<button class="btn btn-mini btn-primary voilet" type="button" id="attending-1" onclick="showAttending(this.id);">I am Attending</button>
												Attending <a href="#">+124</a>
											</aside>
										</div>
									</div>
									<div class="row">
										<div class="span6">
											<section id="attending" class="attending-1" style="display:none;">
												 <div class="input-prepend"> <span class="add-on"><img src="<?php echo base_url();?>assets/img/name-icon.png"></span>
													<input class="input-small" id="prependedInput" type="text" placeholder="Full Name:">
												 </div>
												 <div class="input-prepend"> <span class="add-on"><img src="<?php echo base_url();?>assets/img/mail-icon.png"></span>
													<input class="input-small" id="prependedInput" type="text" placeholder="Email:">
												 </div>
												 <div class="input-prepend"> <span class="add-on"><img src="<?php echo base_url();?>assets/img/cell-icon.png"></span>
													<input class="input-small" id="prependedInput" type="text" placeholder="Mobile No:">
												 </div>
												 <button class="btn btn-mini btn-primary green_bu" type="button">Connect</button>
											</section>
										</div>
									</div>
								</article>
							</div>
							<div class="row connect-listing">
								<article class="span6">
									<div class="row">
										<div class="span4">
											<div class='content_blog pull-left clearfix'>
												<h4>University of Greenwich</h4>
												<hr>
												<p>Offices of Education Link</p>
												<p class="date-time"><i class="icon-calendar"></i>&nbsp;&nbsp;03 Oct 2013, 11:00 - 17:00<br>
												<i class="icon-map-marker"></i>&nbsp;&nbsp;New Delhi, India</p>
											</div>
										</div>
										<div class="span2 mu-connect">
											<aside class="celender">
												<div class="cl"> <small class="date">OCT</small> <small class="day">03</small> </div>
												<div class="btn-group">
												<button class="btn dropdown-toggle btn-success btn-mini" data-toggle="dropdown">MU Connect <span class="caret"></span></button>
												<ul class="dropdown-menu">
												  <li><a href="#"><i class="icon-mobile-phone"></i>&nbsp;&nbsp;SMS</a></li>
												  <li><a href="#"><i class="icon-envelope-alt"></i>&nbsp;&nbsp;E-Mail</a></li>
												</ul>
												</div>
												<button class="btn btn-mini btn-primary voilet" type="button" id="attending-2" onclick="showAttending(this.id);">I am Attending</button>
												Attending <a href="#">+67</a>
											</aside>
										</div>
									</div>
									<div class="row">
										<div class="span6">
											<section id="attending" class="attending-2" style="display:none;">
												 <div class="input-prepend"> <span class="add-on"><img src="<?php echo base_url();?>assets/img/name-icon.png"></span>
													<input class="input-small" id="prependedInput" type="text" placeholder="Full Name:">
												 </div>
												 <div class="input-prepend"> <span class="add-on"><img src="<?php echo base_url();?>assets/img/mail-icon.png"></span>
													<input class="input-small" id="prependedInput" type="text" placeholder="Email:">
												 </div>
												 <div class="input-prepend"> <span class="add-on"><img src="<?php echo base_url();?>assets/img/cell-icon.png"></span>
													<input class="input-small" id="prependedInput" type="text" placeholder="Mobile No:">
												 </div>
												 <button class="btn btn-mini btn-primary green_bu" type="button">Connect</button>
											</section>
										</div>
									</div>
								</article>
							</div>
							<div class="pagination pagination-small" id="my_pagi">
							<?php //echo $links; ?>
							<!--  <ul>
								<li><a href="#">&lt;</a></li>
								<li class="disabled no_border"><a href="#">1/201</a></li>
								<li ><a href="#">&gt;</a></li>
								</ul>-->
							</div>
					</div>
                     <!--<article class="span6">
                        <p class="text-right">Showing 12/233 <i class="icon-circle-arrow-right"></i></p>
                        <section class="search_style">
                           <article>
                              <figure class="feature_image pull-left">
                                 <img src="<?php echo base_url();?>assets/img/collete-image.png">
                                 <figcaption>Tameside 
                                    College
                                 </figcaption>
                              </figure>
                              <div class="filter_content">
                                 <h3>International technology Association 2013</h3>
                                 <p>River Community College is a Public institution located in 
                                    Dublin, Virginia .
                                 </p>
                                 <div class="date">21 Aug, 2013,6:30 pm - 9:00 pm<br>
                                    London, UK
                                 </div>
                              </div>
                              <aside class="celender">
                                 <div class="cl"> <small class="date">AUG</small> <small class="day">22</small> </div>
                                 <p class="green">Get Details Via<br>
                                    <a href="#"><img src="<?php echo base_url();?>assets/img/sms.png">SMS</a> <img src="<?php echo base_url();?>assets/img/mail_red.png"><a href="#">Mail</a>
                                 </p>
                              </aside>
							  <aside>
								<button class="btn btn-mini btn-primary voilet" type="button" id="attending-1" onclick="showAttending(this.id);">I am Attending</button>
                                 Attending <a href="#">+134</a>
							  </aside>
                              <div class="clearfix"></div>
                              <section id="attending" class="attending-1" style="display:none;">
                                 <div class="input-prepend"> <span class="add-on"><img src="<?php echo base_url();?>assets/img/name-icon.png"></span>
                                    <input class="span1" id="prependedInput" type="text" placeholder="Full Name:">
                                 </div>
                                 <div class="input-prepend"> <span class="add-on"><img src="<?php echo base_url();?>assets/img/mail-icon.png"></span>
                                    <input class="span1" id="prependedInput" type="text" placeholder="Email:">
                                 </div>
                                 <div class="input-prepend"> <span class="add-on"><img src="<?php echo base_url();?>assets/img/cell-icon.png"></span>
                                    <input class="span1" id="prependedInput" type="text" placeholder="Mobile No:">
                                 </div>
                                 <button class="btn btn-mini btn-primary green_bu" type="button">Connect</button>
                              </section>
                           </article>
						   <article>
                              <figure class="feature_image pull-left">
                                 <img src="<?php echo base_url();?>assets/img/collete-image.png">
                                 <figcaption>Tameside 
                                    College
                                 </figcaption>
                              </figure>
                              <div class="filter_content">
                                 <h3>International technology Association 2013</h3>
                                 <p>River Community College is a Public institution located in 
                                    Dublin, Virginia .
                                 </p>
                                 <div class="date">21 Aug, 2013,6:30 pm - 9:00 pm<br>
                                    London, UK
                                 </div>
                              </div>
                              <aside class="celender">
                                 <div class="cl"> <small class="date">AUG</small> <small class="day">22</small> </div>
                                 <p class="green">Get Details Via<br>
                                    <a href="#"><img src="<?php echo base_url();?>assets/img/sms.png">SMS</a> <img src="<?php echo base_url();?>assets/img/mail_red.png"><a href="#">Mail</a>
                                 </p>
                              </aside>
							  <aside>
								<button class="btn btn-mini btn-primary voilet" type="button" id="attending-2" onclick="showAttending(this.id);">I am Attending</button>
                                 Attending <a href="#">+134</a>
							  </aside>
                              <div class="clearfix"></div>
                              <section id="attending" class="attending-2" style="display:none;">
                                 <div class="input-prepend"> <span class="add-on"><img src="<?php echo base_url();?>assets/img/name-icon.png"></span>
                                    <input class="span1" id="prependedInput" type="text" placeholder="Full Name:">
                                 </div>
                                 <div class="input-prepend"> <span class="add-on"><img src="<?php echo base_url();?>assets/img/mail-icon.png"></span>
                                    <input class="span1" id="prependedInput" type="text" placeholder="Email:">
                                 </div>
                                 <div class="input-prepend"> <span class="add-on"><img src="<?php echo base_url();?>assets/img/cell-icon.png"></span>
                                    <input class="span1" id="prependedInput" type="text" placeholder="Mobile No:">
                                 </div>
                                 <button class="btn btn-mini btn-primary green_bu" type="button">Connect</button>
                              </section>
                           </article>
                        </section>
                        <div class="pagination pagination-small" id="my_pagi">
                           <ul>
                              <li><a href="#">&lt;</a></li>
                              <li class="disabled no_border"><a href="#">1/201</a></li>
                              <li ><a href="#">&gt;</a></li>
                           </ul>
                        </div>
                     </article>-->
					 <article class="span3">
                     <article><img src="<?php echo base_url();?>assets/img/calender.jpg"> </article>
                     <article><img src="<?php echo base_url();?>assets/img/st_georges.png"> </article>
                     <article>
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
			$('.dropdown-toggle').dropdown();
		});
		function showAttending(id)
		{
			$('.'+id).fadeIn();
		
		}
	  </script>