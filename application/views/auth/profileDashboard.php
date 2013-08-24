<!--main-->
      <div role="main" id="main">
         <div class="row container no_padding" id="contact_page" >
            <ul class="breadcrumb univ_breadcrumb">
               <li><a href="#">Home</a> <span class="divider"><i class=" icon-arrow-right"></i></span></li>
               <li class="active">Profile Dashboard</li>
            </ul>
            <section id="dashboard_container" >
               <article>
                  <div id="profile_sidebar" class="span3 pull-left">
                     <img src="<?php echo base_url();?>assets/img/man.jpg" alt="..." class="img-circle">
                     <h2><?php echo $userData['fullname']?> </h2>
                     <p>Lorem ipsum dolor sit amet 
                        consectetuer adipiscing
                     </p>
                     <br>
                     <img src="<?php echo base_url();?>assets/img/profile_statues.png">
                     <p>Profile Status</p>
                     <ul id="profile_status" class="inline">
                        <li>Info<span>100%</span></li>
                        <li>Edu Info<span>60%</span></li>
                        <li>Test<span>70%</span></li>
                     </ul>
                  </div>
                  <article class="span9" id="dashboard" >
                     <section id="dashboard_cont" class="span6">
                        <div class="row">
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
                                       <h6 class="icon looking">Email</h6>
                                    </article>
                                    <article class="span2 text-right">
                                       <p>Master courses</p>
                                    </article>
                                 </section>
                                 <section id="recent_events" class="span5 ">
                                    <h2>Recent Events</h2>
                                    <article class="alert" >
                                       <h3>Mubin University</h3>
                                       <div class="span2">Roll Royace Exhibition 
                                          Exhibition is just About to give you 
                                          knowledge of RR Cars
                                       </div>
                                       <div class="span1">Melbourne stadium 
                                          24-july-2013 
                                       </div>
                                       <a class="close" data-dismiss="alert" href="#">&times;</a> 
                                    </article>
                                    <article class="alert" >
                                       <h3>Mubin University</h3>
                                       <div class="span2">Roll Royace Exhibition 
                                          Exhibition is just About to give you 
                                          knowledge of RR Cars
                                       </div>
                                       <div class="span1">Melbourne stadium 
                                          24-july-2013 
                                       </div>
                                       <a class="close" data-dismiss="alert" href="#">&times;</a> 
                                    </article>
                                    <article class="alert" >
                                       <h3>Mubin University</h3>
                                       <div class="span2">Roll Royace Exhibition 
                                          Exhibition is just About to give you 
                                          knowledge of RR Cars
                                       </div>
                                       <div class="span1">Melbourne stadium 
                                          24-july-2013 
                                       </div>
                                       <a class="close" data-dismiss="alert" href="#">&times;</a> 
                                    </article>
                                    <article class="alert" >
                                       <h3>Mubin University</h3>
                                       <div class="span2">Roll Royace Exhibition 
                                          Exhibition is just About to give you 
                                          knowledge of RR Cars
                                       </div>
                                       <div class="span1">Melbourne stadium 
                                          24-july-2013 
                                       </div>
                                       <a class="close" data-dismiss="alert" href="#">&times;</a> 
                                    </article>
                                 </section>
                              </div>
                              <div class="tab-pane" id="Edu_ingo">.Edu_ingo</div>
                              <div class="tab-pane" id="Tests">.Tests</div>
                           </div>
                        </div>
                     </section>
                     <aside id="dashboard_sidebar" class="span4">
                        <h6 class="profile_name" onclick="location.href='video.html'"><?php echo $userData['fullname']?> <img src="<?php echo base_url();?>assets/img/man.jpg" alt="..." class="img-circle" style="width:45px; height:45px;"></h6>
                        <ul id="notification" class="unstyled">
                           <li><img src="<?php echo base_url();?>assets/img/arrow-bottom.png"></li>
                           <li><a href="#"><img src="<?php echo base_url();?>assets/img/bell.png"></a><span>6</span></li>
                           <li><a href="#"><img src="<?php echo base_url();?>assets/img/link.png"></a></li>
                           <li><a href="#"><img src="<?php echo base_url();?>assets/img/notice.png"></a></li>
                        </ul>
                        <article>
                           <h3 >Saved Events</h3>
                           <p>still you have not saved any 
                              events
                           </p>
                        </article>
                        <article>
                           <h3 class="save_college">Saved Colleges</h3>
                           <p>You have saved 1 college</p>
                           <p class="saved"><a href="#">St Georges college of medical science</a> <a class="close" data-dismiss="alert" href="#">&times;</a> </p>
                        </article>
                        <article>
                           <h3 class="college">College Search</h3>
                           <ul class="unstyled">
                              <li><a href="#">My colleges </a></li>
                              <li><a href="#"> Saved Colleges </a></li>
                              <li><a href="#"> Recomeded Colleges</a></li>
                           </ul>
                        </article>
                        <article><img src="<?php echo base_url();?>assets/img/facebook_fane_icon.png"></article>
                        <article>
                           <img src="<?php echo base_url();?>assets/img/british-council.png">
                           <h5>international students comprise almost <br>
                              percent of the total student body .<br>
                              Total cost of attendance for most <br>
                              international ...
                           </h5>
                        </article>
                     </aside>
                  </article>
               </article>
            </section>
         </div>
      </div>
      <!--end main-->
	  <?php $this->load->view('layout/js');?>