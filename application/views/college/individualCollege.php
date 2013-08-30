  
  <!--main-->
      <div role="main" id="main">
         <div class="row container">
            <article id="college_listing" class="page">
               <ul class="breadcrumb univ_breadcrumb">
                  <li><a href="<?php echo base_url()?>">Home</a> <span class="divider"><i class=" icon-arrow-right"></i></span></li>
                  <li><a href="<?php echo base_url('college')?>">College Search</a> <span class="divider"><i class=" icon-arrow-right"></i></span></li>
                  <li class="active"><?php echo $universityData[0]['univName'];?></li>
               </ul>
			   <div class="well">
                  <div class="bg"><img src="<?php echo base_url()?>assets/img/college-bg-r.png"></img></div>
                  <div class="logo"><img src="<?php echo base_url()?>assets/img/The-los-angeles-school.png"></img></div>
				  <div class="span10 offset1"><h3><?php echo $universityData[0]['univName'];?></h3></div>
				  <span class=" clearfix"></span>
               </div>
			<div class="row">
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
											<i class="icon-compass icon-large blue"></i>&nbsp;
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
											<i class="icon-calendar blue"></i>&nbsp;
											<?php echo (isset($universityDetail['yearOfEst']))?$universityDetail['yearOfEst']:'N/A';?> 
										</p>
									</article>
									<span class="clearfix"></span>
								</section>
								<hr>
								<section class="dashboard-section">
									<article>
										<p><span>STUDENT RATIO</span> <br>
											<em>N/A</em>
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
											<?php echo (isset($universityDetail['accomodation']))?$universityDetail['accomodation']:'N/A';?> 
										</p>
									</article>
									<article>
										<p><span>STUDENT SATISFACTION </span> <br>
											<?php echo (isset($universityDetail['studentSatisfaction']))?$universityDetail['studentSatisfaction']:'N/A';?> 
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
										<p><span>SAT MATH <br>
											NOT REPORTED</span>
										</p>
									</article>
									<article>
										<p><span>SAT MATH <br>
											NOT REPORTED</span>
										</p>
									</article>
									<article>
										<p><span>SAT MATH <br>
											NOT REPORTED</span>
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
			</div>
                     <article id="major_degree">
                        <div class="span9">
                           <div  id="myTab" class="span5"> <a href="#home">Majors & Degrees</a> <a href="#profile">Location & Contact</a> </div>
                           <section class="span6">
                              <div class="tab-content">
                                 <div class="tab-pane active" id="home">
                                    <h5>Majors &amp; Degrees</h5>
									<?php
									$ukprn=$universityData[0]['UKPRN'];
									$service_url = "https://JY4PDF8DMA1SS2WE16KB@data.unistats.ac.uk/api/KIS/Institution/$ukprn/Courses.json";
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
									?>
									<table class="table">
									 <tr class="success">
                                          <td> Degrees Offered</td>
                                          <td class="text-success">Associate’s<?php echo $universityData[0]['UKPRN'];?></td>
                                          <td class="text-success">Bachelor’s</td>
                                       </tr>
									<?php
									if($output)
									{
										foreach($output as $output)
										{
											echo "<tr><td>".ucfirst(strtolower($output->Title))."</td></tr>";
										}
									}
									?>
									</table>
                                 </div>
                                 <div class="tab-pane " id="profile">
                                    <h5>Location</h5>
                                    <div id="map">
                                       <img src="<?php echo base_url()?>assets/img/map.png">
                                    </div>
                                    <br>
                                    <h5>Contact</h5>
                                    <address>
                                       <strong>ITT Technical Institute</strong><br>
                                       5183 US Route 60 Building 1, Suite 40<br>
                                       WV 25705
                                    </address>
                                    <address>
                                       <strong>Director of Recruitment</strong><br>
                                       Phone: 304-733-8700
                                    </address>
                                 </div>
							  </div>
						   </section>
                        </div> 
                     </article>
            </article>
            </div>
         </div>
         <!--end main-->