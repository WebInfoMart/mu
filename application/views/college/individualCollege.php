  
  <!--main-->
      <div role="main" id="main">
         <div class="row container">
            <article id="college_listing" class="page">
               <ul class="breadcrumb univ_breadcrumb">
                  <li><a href="<?php echo base_url()?>">Home</a> <span class="divider"><i class=" icon-arrow-right"></i></span></li>
                  <li><a href="<?php echo base_url('college')?>">College Search</a> <span class="divider"><i class=" icon-arrow-right"></i></span></li>
                  <li class="active"><?php echo $universityData[0]['univName'];?></li>
               </ul>
			   
			   <div class="row">
        
          <div class="span12 box-shadow college-list">
            
            <div class="left box-content">
           
              <div class="caption-bar">
                <p class="title"> <?php echo $universityData[0]['univName'];?> </p>
                <!-- <img src="assets/images/logo.jpg" />-->
				 <?php 
				  if($universityData[0]['logo'])
				  {?>
				  <img src="<?php echo base_url()?>assets/univ_logo/<?php echo $universityData[0]['logo'];?>" alt="<?php echo $universityData[0]['univName'];?>" title="<?php echo $universityData[0]['univName'];?>" style="max-width: 115px;"></img>
				  <?php 
				  }else{?>
				   <img src="<?php echo base_url()?>assets/univ_logo/univ.png?>" alt="<?php echo $universityData[0]['univName'];?>" title="<?php echo $universityData[0]['univName'];?>" style="max-width: 35px;padding: 0px 23px;"></img>
				  <?php }?>
                 
              </div>
              <p><span><?php echo $universityData[0]['univName'];?></span>
			  <br />
				In Newcastle upon Tyne, is an expanding multicultural 
				learning community, with excellent links with further and 
				higher education...</p>
            </div>
            <div class=" left right-section">
            
            
                  <div class="yellow-bg">
					<i class="icon-map-marker"></i>
                    <p><?php echo (isset($cityName))?$cityName:'N/A';?> <br /> 
					
					<span>
					<?php echo (isset($countryName))?$countryName:'N/A';?>
					</span><p>
                  </div>
                  
                  <div class="year" >  Year of Establishment<br /><i class="icon-calendar icon-2x"></i> 
				  <span><?php echo (isset($universityDetail['yearOfEst']))?$universityDetail['yearOfEst']:'N/A';?> </span></div>
                  
                  <div class="type"><p>Type<p><span class="color"><?php echo (isset($universityDetail['type']))?$universityDetail['type']:'N/A';?></span></div>
                  
                  <div class=" left facilities">
                    <p>Facilities</p>
                    <div class="fac-img">
                      <!--<img src="assets/images/book-icon.jpg"/>
                      <img src="assets/images/globe-icon.jpg" />
                       <img src="assets/images/build-icon.jpg" />
                      <img src="assets/images/cup-icon.jpg" />
                      <img src="assets/images/laptop-icon.jpg" />
					  <i class="icon-book" style="color:#fa5c5d"></i>
					  <i class="icon-globe" style="color:#197079;"></i>
					  <i class="icon-building" style="color:#2b7eb2;"></i>
					  <i class="icon-trophy" style="color:#9a4682;"></i>
					  <i class="icon-laptop" style="color:#609d64;"></i>-->
					  <?php echo (isset($universityDetail['library'])&&$universityDetail['library']=='1')?"<i class='icon-book'  style='color:#609d64' rel='tooltip' title='Library'></i>":"<i class='icon-book not-activated' rel='tooltip' title='Library'></i>";?> 
					  <?php echo (isset($universityDetail['sports'])&&$universityDetail['sports']=='1')?"<i class='icon-gamepad' style='color:#609d64;'  rel='tooltip' title='Sports Facility'></i>":"<i class='icon-gamepad not-activated' rel='tooltip' title='Sports Facility'></i>";?> 
					  <?php echo (isset($universityDetail['scholer'])&&$universityDetail['scholer']=='1')?"<i class='icon-trophy' 'color:#609d64;' rel='tooltip' title='Scholerships'></i>":"<i class='icon-trophy not-activated' rel='tooltip' title='Scholerships'></i>";?> 
					  <?php echo (isset($universityDetail['housing'])&&$universityDetail['housing']=='1')?"<i class='icon-building' style='color:#609d64;' rel='tooltip' title='Housing'></i>":"<i class='icon-building not-activated' rel='tooltip' title='Housing'></i>";?> 
					  <?php echo (isset($universityDetail['exchange'])&&$universityDetail['exchange']=='1')?"<i class='icon-globe'  style='color:#609d64;' rel='tooltip' title='Exchange Programs'></i>":"<i class='icon-globe not-activated' rel='tooltip' title='Exchange Programs'></i>";?> 
					  <?php echo (isset($universityDetail['online'])&&$universityDetail['online']=='1')?"<i class='icon-laptop' style='color:#609d64;' rel='tooltip' title='Online Courses'></i>":"<i class='icon-laptop not-activated' rel='tooltip' title='Online Courses'></i>";?> 
					  
                    </div>
              </div>
            
                <div class="intake-date" >
                  <p> Intake</p>
                  <p class="big-font">Sep 2013</p>
                </div>
                  <div class="scholarship" >
                  <p>Scholarship</p>
                  <img src="<?php echo base_url();?>assets/img/1.jpg" class="left"/>
                  <p class="green"><?php echo (isset($universityDetail['scholership']))?$universityDetail['scholership']:'N/A';?></p>
               </div>
             
                <div class="students" >
                  <p> Students <br /> <img src="<?php echo base_url();?>assets/img/people.jpg" /> <br /> <span><?php echo (isset($universityDetail['students']))?$universityDetail['students']:'N/A';?></span></p>
                </div>
               <div class="staff" >
                  <p>Staff <br /><span> <?php echo (isset($universityDetail['staff']))?$universityDetail['staff']:'N/A';?></span></p>
                </div>
                <div class="accomodation" >
                  <p>ACCOMODATION<br /><span>2287</span></p>
                </div>
                 <div class="acceptance-criteria">
                  <p class="title"> Acceptance Criteria</p>
                  <p class="sub-title" > post graduate <br /><span> 65% in xII</span></p>
                  <p class="sub-title" >undergraduate <br /><span>60% in UG</span></p>
                  <p class="sub-title" > language <br /><span>IELTS 6.0</span></p>
              </div> 
            </div>
          </div>  
            
          
        </div>
			   
			   
				<!--<div class="row">
					<div class="span8">
					klsdjf
					</div>
					<div class="span4">
					klsjdf
					</div>
				</div>-->
			   <!--<div class="well">
                 <div class="row">
                  <div class="span1">
				  
				  <?php 
				  if($universityData[0]['logo'])
				  {?>
				  <img src="<?php echo base_url()?>assets/univ_logo/<?php echo $universityData[0]['logo'];?>" alt="<?php echo $universityData[0]['univName'];?>" title="<?php echo $universityData[0]['univName'];?>" style="max-width: 115px;"></img>
				  <?php 
				  }else{?>
				   <img src="<?php echo base_url()?>assets/univ_logo/univ.png?>" alt="<?php echo $universityData[0]['univName'];?>" title="<?php echo $universityData[0]['univName'];?>" style="max-width: 35px;padding: 0px 23px;"></img>
				  <?php }?>
				  </div>
				  <div class="span9 <?php echo ($universityData[0]['logo'])?"offset1":"";?>"><h3><?php echo $universityData[0]['univName'];?></h3></div>
				  <span class=" clearfix"></span>
				  </div>
               </div>-->
			<!--<div class="row">
				<div class="span8">
					<div class="box-shadow">
						<div class="box-content">
							<div class="add-school">
								<a href="#" class="add_school_link white"><i class="icon-plus-sign icon-white"></i>&nbsp;Add This School</a> <br>
							</div>
							<div class="dashboard-data">
								<section class="dashboard-section">
									<article>
										<p><span >LOCATION</span> <br>
											<i class="icon-compass icon-large blue" rel='tooltip' title='Location'></i>&nbsp;
											<?php echo (isset($cityName))?$cityName:'N/A';?>
										</p>
									</article>
									<article>
										<p><span>TYPE </span> <br>
											<?php echo (isset($universityDetail['type']))?$universityDetail['type']:'N/A';?>
										</p>
									</article>
									<article>
										<p><span>YEAR OF ESTABLISHMENT </span> <br>
											<i class="icon-calendar blue" rel='tooltip' title='Year of Establishment'></i>&nbsp;
											<?php echo (isset($universityDetail['yearOfEst']))?$universityDetail['yearOfEst']:'N/A';?> 
										</p>
									</article>
									<span class="clearfix"></span>
								</section>
								<hr>
								<section class="dashboard-section">
									<article>
										<p><span>Scholarship</span> <br>
											<?php echo (isset($universityDetail['scholership']))?$universityDetail['scholership']:'N/A';?>
										</p>
									</article>
									<article>
										<p><span>  TOTAL STUDENTS </span> <br>
											<?php echo (isset($universityDetail['students']))?$universityDetail['students']:'N/A';?> 
										</p>
									</article>
									<article>
										<p><span>STAFF </span> <br>
											<?php echo (isset($universityDetail['staff']))?$universityDetail['staff']:'N/A';?> 
										</p>
									</article>
									<span class="clearfix"></span>
								</section>
								<hr>
								<section class="dashboard-section">
									<article>
										<p><span>INTAKE </span> <br>
											<?php echo (isset($universityDetail['intakes']))?$universityDetail['intakes']:'N/A';?>  
										</p>
									</article>
									<article>
										<p><span>ACCOMODATION  </span> <br>
										<?php
											$ukprn=$universityData[0]['UKPRN'];
											$service_url = "https://JY4PDF8DMA1SS2WE16KB@data.unistats.ac.uk/api/KIS/Institution/$ukprn.json";
											// Initialize session and set URL.
											$ch = curl_init();
											curl_setopt($ch, CURLOPT_URL, $service_url);
											
											// Set so curl_exec returns the result instead of outputting it.
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
											curl_error($ch);
											curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
											// Get the response and close the channel.
											$response = curl_exec($ch);
											curl_close($ch);
											$output=json_decode($response);
											//print_r($output);
											echo (isset($output->NumberOfBeds))?$output->NumberOfBeds:'N/A';
										?>
											<?php //echo (isset($universityDetail['accomodation'])&&$universityDetail['accomodation'])?$universityDetail['accomodation']:'N/A';?> 
										</p>
									</article>
									<article id="facilities">
										<p><span>Facilities </span> <br>
											<?php echo (isset($universityDetail['library'])&&$universityDetail['library']=='1')?"<i class='icon-book' rel='tooltip' title='Library'></i>":"<i class='icon-book not-activated' rel='tooltip' title='Library'></i>";?> 
											<?php echo (isset($universityDetail['sports'])&&$universityDetail['sports']=='1')?"<i class='icon-gamepad' class='icon-book' rel='tooltip' title='Sports Facility'></i>":"<i class='icon-gamepad not-activated' class='icon-book' rel='tooltip' title='Sports Facility'></i>";?> 
											<?php echo (isset($universityDetail['scholer'])&&$universityDetail['scholer']=='1')?"<i class='icon-trophy' class='icon-book' rel='tooltip' title='Scholerships'></i>":"<i class='icon-trophy not-activated' class='icon-book' rel='tooltip' title='Scholerships'></i>";?> 
											<?php echo (isset($universityDetail['housing'])&&$universityDetail['housing']=='1')?"<i class='icon-building' class='icon-book' rel='tooltip' title='Housing'></i>":"<i class='icon-building not-activated' class='icon-book' rel='tooltip' title='Housing'></i>";?> 
											<?php echo (isset($universityDetail['exchange'])&&$universityDetail['exchange']=='1')?"<i class='icon-globe' class='icon-book' rel='tooltip' title='Exchange Programs'></i>":"<i class='icon-globe not-activated' class='icon-book' rel='tooltip' title='Exchange Programs'></i>";?> 
											<?php echo (isset($universityDetail['online'])&&$universityDetail['online']=='1')?"<i class='icon-desktop' class='icon-book' rel='tooltip' title='Online Courses'></i>":"<i class='icon-desktop not-activated' class='icon-book' rel='tooltip' title='Online Courses'></i>";?> 
										</p>
									</article>
									<span class="clearfix"></span>
								</section>
								<hr>
								<section class="dashboard-footer">
								 <article class="statistic">
								  <p><span class="first">Acceptance Criteria</span>
								  </p>
								 </article>
								 <article>
								  <p><span>Undergraduate <br>
								   > 65% in XII</span>
								  </p>
								 </article>
								 <article>
								  <p><span>Postgraduate <br>
								   > 60% in UG</span>
								  </p>
								 </article>
								 <article>
								  <p><span>Language <br>
								   IELTS 6.0</span>
								  </p>
								 </article>
								 <span class="clearfix"></span>
								</section>
							</div>
						</div>
					</div>
				</div>
				<div class="span4 box-shadow1 college-list">
						<h4 class="blue">More School Like Us...</h4>
						<ul class="unstyled">
							<li class="colored">
								<img src="<?php echo base_url()?>assets/img/The-los-angeles-school.png" alt="The los angeles school">
								<div class="list_content">
									<h5>The los angeles school</h5>
									<small class="city">Hollywood, CA</small>
									<span class="view-more pull-right"><a href="#">VIEW MORE</a></span>
									<span class="clearfix"></span>
								</div>
							</li>
							<li>
								<img src="<?php echo base_url()?>assets/img/The-New-Common.png" alt="The los angeles school">
								<div class="list_content">
									<h5>The los angeles school</h5>
									<small class="city">Hollywood, CA</small>
									<span class="view-more pull-right"><a href="#">VIEW MORE</a></span>
									<span class="clearfix"></span>
								</div>
							</li>
							<li class="colored">
								<img src="<?php echo base_url()?>assets/img/The-los-angeles-school.png" alt="The los angeles school" title="The los angeles school">
								<div class="list_content">
									<h5>The los angeles school</h5>
									<small class="city">Hollywood, CA</small>
									<span class="view-more pull-right"><a href="#">VIEW MORE</a></span>
									<span class="clearfix"></span>
								</div>
							</li>
							<li>
								<img src="<?php echo base_url()?>assets/img/The-New-Common.png" alt="The los angeles school"  title="The los angeles school">
								<div class="list_content">
									<h5>The los angeles school</h5>
									<small class="city">Hollywood, CA</small>
									<span class="view-more pull-right"><a href="#">VIEW MORE</a></span>
									<span class="clearfix"></span>
								</div>
							</li>
							<li class="colored">
								<img src="<?php echo base_url()?>assets/img/The-los-angeles-school.png" alt="The los angeles school">
								<div class="list_content">
									<h5>The los angeles school</h5>
									<small class="city">Hollywood, CA</small>
									<span class="view-more pull-right"><a href="#">VIEW MORE</a></span>
									<span class="clearfix"></span>
								</div>
							</li>
						</ul>
				</div>
			</div>-->
					 
					 <article id="major_degree">
						<div class="row">
							<div class="span8">
								<div class="row">
									 <div  id="myTab" class="span2 college-tab"> <a href="#profile">Location & Contact</a><br><a href="#home">Majors & Degrees</a>  </div>
									 <section class="span6">
                              <div class="tab-content">
                                 <div class="tab-pane" id="home">
                                    <h5>Majors &amp; Degrees</h5>
									
									<table class="table">
									 <tr class="success">
                                          <td> Degrees Offered</td>
                                          <td class="text-success">Associate’s</td>
                                          <td class="text-success">Bachelor’s</td>
                                     </tr>
									 <?php 
									 $tempraryHeader = '';
									 $counter=1;
									 foreach($courseDetail as $course)
									 {
									 if(!empty($course->level2))
									 {
										$levelName = $this->collegemodel->getCourseLevelName($course->level2);
										if($levelName!=$tempraryHeader)
										{
										?>
										<tr class="text-error course-<?php echo $counter;?>" <?php echo ($counter>10)?'style="display:none;"':''?>>
										<td><?php echo $levelName;?></td>
										<td><img src="<?php echo base_url();?>assets/img/check_opt.png"></td>
                                          <td></td>
										</tr>
										<tr class="space course-<?php echo $counter;?>" <?php echo ($counter>10)?'style="display:none;"':''?>>
                                          <td></td>
                                       </tr>
										<?php
										}
										
									 $tempraryHeader = $levelName;
									 }
									 else
									 {	
									 if($tempraryHeader!='Others')
										{
										?>
										<tr class="text-error course-<?php echo $counter;?>" <?php echo ($counter>10)?'style="display:none;"':''?>>
										<td>Others</td>
										<td><img src="<?php echo base_url();?>assets/img/check_opt.png"></td>
                                          <td></td>
										</tr>
										<tr class="space course-<?php echo $counter;?>" <?php echo ($counter>10)?'style="display:none;"':''?>>
                                          <td></td>
                                       </tr>
										<?php
										}
										$tempraryHeader='Others';
									 }
									 
									 ?>
									 <tr class="course-<?php echo $counter;?>" <?php echo ($counter>10)?'style="display:none;"':'';?>>
										<td><?php echo $course->name;?></td>
										<td></td>
                                          <td></td>
									 </tr>
									 <?php 
									 $counter++;
									 }?>
									 <tr>
                                          <td><a href="javascript:void(0)" onclick="show_more_courses()">+More</a></td>
                                          <td><input type="hidden" value="2" id="courseCount"/></td>
                                          <td></td>
                                       </tr>
									</table>
                                 </div>
                                 <div class="tab-pane  active" id="profile">
                                    <h5>Location</h5>
									<input id="address" type="hidden" value="<?php echo (isset($universityDetail['address'])&&$universityDetail['address'])?$universityDetail['address']:'New Delhi, India';?>">
                                    <div id="map-canvas" style="height:190px;width:280px;border: 1px solid #ccc;box-shadow: 0 0 11px rgba(0, 0, 0, 0.2);">
                                       <!--<img src="<?php echo base_url()?>assets/img/map.png">-->
                                    </div>
                                    <br>
                                    <h5>Contact</h5>
                                    <address>
                                       <strong>College Address</strong><br>
                                       <?php echo (isset($universityDetail['address'])&&$universityDetail['address'])?$universityDetail['address']:'N/A';?> 
                                    </address>
                                    <!--<address>
                                       <strong>Director of Recruitment</strong><br>
                                       Phone: 304-733-8700
                                    </address>-->
                                 </div>
							  </div>
						   </section>
								</div>
							</div>
							<div class="span4">
							<a target="_blank" href="http://meetuniv.com/Study-In-UK-Top-Universities.php?campaign=0&src=home" style="text-decoration:none;text-align:centre"><img title="Northumbria University Event in India" alt="Northumbria University Event in India" src="<?php echo base_url();?>assets/img/ad/nu300.jpg"></a><br/><br/>
							<a target="_blank" href="http://meetuniv.com/Study-In-UK-Top-Universities.php?campaign=0&src=home" style="text-decoration:none;text-align:centre"><img title="University of East London Event in India" alt="University of East London Event in India" src="<?php echo base_url();?>assets/img/ad/uel300.jpg"></a>
						   </div>
						</div>
                        <!--<div class="span9">
                           <div  id="myTab" class="span5"> <a href="#home">Majors & Degrees</a> <a href="#profile">Location & Contact</a> </div>
                           
                        </div> -->
                     </article>
            </article>
            </div>
         </div>
         <!--end main-->
		 
		 <?php $this->load->view('layout/js')?>
		 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
		 <script>
         $(document).ready(function(){
         		codeAddress();				   
         						       $('.carousel').carousel({
             interval: 5000,
         	pause:"hover"
             })
         							   
         						   })
         
         
         
         
         
         
         
             $('#myTab a').click(function (e) {
             e.preventDefault();
             $(this).tab('show');
             })
			$("[rel=tooltip]").tooltip({ placement: 'bottom'});
         
			var geocoder;
			var map;
			function initialize() {
			  geocoder = new google.maps.Geocoder();
			  var latlng = new google.maps.LatLng(-34.397, 150.644);
			  var mapOptions = {
				zoom: 8,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			  }
			  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
			}

			function codeAddress() {
			  var address = document.getElementById('address').value;
			  initialize();
			  geocoder.geocode( { 'address': address}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
				  map.setCenter(results[0].geometry.location);
				  var marker = new google.maps.Marker({
					  map: map,
					  position: results[0].geometry.location
				  });
				} else {
				  alert('Geocode was not successful for the following reason: ' + status);
				}
			  });
			}

			google.maps.event.addDomListener(window, 'load', initialize);
			function show_more_courses()
			{
				var count = $("#courseCount").val();
				for(var i=0;i<=count*10;i++)
				{
					$(".course-"+i).fadeIn();
				}
				$("#courseCount").val(parseInt(count)+1);
			}
      </script>