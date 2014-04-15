<!--main-->
      <div role="main" id="main">
         <div class="row container no_padding" id="contact_page" >
            <ul class="breadcrumb univ_breadcrumb">
               <li><a href="#">Home</a> <span class="divider"><i class=" icon-arrow-right"></i></span></li>
               <li class="active">Profile Dashboard</li>
            </ul>
            <section id="dashboard_container" >
               <article>
			    <div class="row">
                  <div id="profile_sidebar" class="span3 pull-left">
					 <?php 
							if(isset($userProfile['profilePic'])&& $userProfile['profilePic'])
							{
								if(substr($userProfile['profilePic'],0,1)=='f')
								{
								?>
								<img src="https://graph.facebook.com/<?php echo substr($userProfile['profilePic'],1)?>/picture?type=large" class="img-circle profile-img"/>
								<?php
								}
								else
								{
						?>
							<img src="<?php echo base_url();?>uploads/user_pic/<?php echo $userProfile['profilePic'];?>" class="img-circle profile-img">
						<?php 
								}
							}
							else
							{
						?>
								<img src="<?php echo base_url();?>assets/img/man.jpg" alt="..." class="img-circle profile-img"> 
						<?php
							} 
						?>
                     <h2><?php echo $userData['fullname']?> </h2>
                     <!--<p>Lorem ipsum dolor sit amet 
                        consectetuer adipiscing
                     </p>-->
                     <br>
                     <img src="<?php echo base_url();?>assets/img/profile_statues.png">
                     <p style="text-align:center;">Profile Status</p>
                     <ul id="profile_status" class="inline">
                        <li>Info<span>100%</span></li>
                        <li>Edu Info<span>60%</span></li>
                        <li>Test<span>70%</span></li>
                     </ul>
                  </div>
                  <article class="span9">
				   <div class="row">
                     <section id="dashboard_cont" class="span6">
                           <ul id="profile_tab" class="nav nav-tabs">
                              <li class="active" ><a href="#Info">Info </a></li>
                              <li><a href="#Edu_ingo" data-toggle="tab">Edu.info</a></li>
                              <li><a href="#Tests" data-toggle="tab">Tests</a></li>
                           </ul>
                           <div class="tab-content">
                              <div class="active tab-pane row" id="Info">
                                 <section>
                                    <article class="span2">
                                       <h6 class="icon email">Email:</h6>
                                    </article>
                                    <article class="span2 text-right">
                                       <p><?php echo $userData['email'];?></p>
                                    </article>
                                 </section>
                                 <section>
                                    <article class="span2">
                                       <h6 class="icon graduate">Graduation:</h6>
                                    </article>
                                    <article class="span2 text-right">
                                       <p>Not updated.</p>
                                    </article>
                                 </section>
                                 <section>
                                    <article class="span2">
                                       <h6 class="icon loc">Location</h6>
                                    </article>
                                    <article class="span2 text-right">
                                       <p>Not updated.</p>
                                    </article>
                                 </section>
                                 <section>
                                    <article class="span2">
                                       <h6 class="icon looking">Looking For</h6>
                                    </article>
                                    <article class="span2 text-right">
                                       <p>Not updated.</p>
                                    </article>
                                 </section>
                                 <section id="recent_events" class="span5 ">
                                    <h2>Recent Events</h2>
									<?php 
									foreach($recentEvents as $event)
									{
									$univName=$this->connectmodel->getUniversityNameById($event['univId']);
									?>
                                    <article class="alert" >
                                       <h3><?php echo $univName;?></h3>
                                       <div class="span2"><?php echo $event['tagLine'];?>
                                       </div>
                                       <div class="span1"><i class="icon-calendar"  style="font-size:14px"></i>&nbsp;<?php echo $event['date'];?><br>
									   <i class="icon-time" style="font-size:14px"></i>&nbsp;<?php echo $event['time'];?>
                                       </div>
                                       <a class="close" data-dismiss="alert" href="#">&times;</a> 
                                    </article>
									<?php }?>
                                 </section>
                              </div>
                              <div class="tab-pane" id="Edu_ingo">Coming Soon</div>
                              <div class="tab-pane" id="Tests">Coming Soon</div>
                           </div>
                     </section>
                     <aside id="dashboard_sidebar" class="span3">
                        <h5 class="profile_name"><?php echo $userData['fullname']?> <!--<img src="<?php echo base_url();?>assets/img/man.jpg" alt="..." class="img-circle" style="width:45px; height:45px;">--></h5>
                        <!--<ul id="notification" class="unstyled">
                           <li><img src="<?php echo base_url();?>assets/img/arrow-bottom.png"></li>
                           <li><a href="#"><img src="<?php echo base_url();?>assets/img/bell.png"></a><span>6</span></li>
                           <li><a href="#"><img src="<?php echo base_url();?>assets/img/link.png"></a></li>
                           <li><a href="#"><img src="<?php echo base_url();?>assets/img/notice.png"></a></li>
                        </ul>-->
                        <article>
                           <h3 >Saved Events</h3>
                           <p>Still you have not saved any 
                              events!
                           </p>
                        </article>
                        <article>
                           <h3 class="save_college">Saved Colleges</h3>
                           <p>You have saved 0 college</p>
                           <!--<p class="saved"><a href="#">St Georges college of medical science</a> <a class="close" data-dismiss="alert" href="#">&times;</a> </p>-->
                        </article>
                        <article>
                           <h3 class="college">College Search</h3>
                           <p>
						    <ul class="unstyled">
                               <li><a href="#">My colleges </a><span class="badge badge-success pull-right">1</span></li>
                               <li><a href="#"> Saved Colleges </a><span class="badge badge-warning pull-right">2</span></li>
                               <li><a href="#"> Recomeded Colleges</a><span class="badge badge-important pull-right">3</span></li>
                            </ul>
						   </p>
                        </article>
                        <article><img src="<?php echo base_url();?>assets/img/facebook_fane_icon.png"></article>
                        <article>
                           <img src="<?php echo base_url();?>assets/img/british-council.png">
                           <h6>The most trusted source of information about studying in the UK, in association with MeetUniv.com outlines the essential information for you to know & where to begin from.Single source , to keep you updated with the happenings in UK education.
                           </h6>
                        </article>
                     </aside>
                   </div>
				  </article>
				</div>
               </article>
            </section>
         </div>
      </div>
      <!--end main-->
	  <?php $this->load->view('layout/js');?>