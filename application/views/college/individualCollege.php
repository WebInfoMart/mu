  
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
                  <h2><?php echo $universityData[0]['univName'];?></h2>
               </div>
               <section class="clearfix row">
                  <div class="pull-left">
                     <article class="span8 box-shadow" id="in_d0">
                        <div class="box_content row">
                           <a href="#" class="add_school_link"><i class="icon-plus-sign"></i>Add This School</a> <br>
                           <section class="span2">
                              <article>
                                 <p><span>LOCATION</span> <br>
                                    <?php echo (isset($cityName))?$cityName:'N/A';?>
                                 </p>
                              </article>
                              <article>
                                 <p><span>STUDENT RATIO </span> <br>
                                    <em> NOT REPORTED </em>
                                 </p>
                              </article>
                              <article>
                                 <p><span>APPLIATION DEADLINE </span> <br>
                                    September 9 
                                 </p>
                              </article>
                           </section>
                           <section class="span3">
                              <article>
                                 <p><span>Type</span> <br>
                                    <?php echo (isset($universityDetail['type']))?$universityDetail['type']:'N/A';?> 
                                 </p>
                              </article>
                              <article>
                                 <p><span>TOTAL STUDENTS </span> <br>
                                    <?php echo (isset($universityDetail['students']))?$universityDetail['students']:'N/A';?> 
                                 </p>
                              </article>
                              <article>
                                 <p><span>ACCEPTANCE RATE </span> <br>
                                    <em> NOT REPORTED</em> 
                                 </p>
                              </article>
                           </section>
                           <section class="span4">
                              <article>
                                 <p><span>Year Of Establishment</span> <br>
                                    <?php echo (isset($universityDetail['yearOfEst']))?$universityDetail['yearOfEst']:'N/A';?> 
                                 </p>
                              </article>
                              <article>
                                 <p><span>IN_STATE TUTION | OUT - OF STATE TUTION</span> <br>
                                    $0  |  $5,370 
                                 </p>
                              </article>
                              <article>
                                 <p><span> ADMISSION DIFFICULTY</span> <br>
                                    <em> NOT REPORTED </em>
                                 </p>
                              </article>
                           </section>
                           <section class="span2 ave_test">
                              <p>Average test scores for all first-year 
                                 students that were accepted and 
                                 enrolled. 
                              </p>
                           </section>
                           <section class="span5 student_report">
                              <article class="span1">
                                 <p>SAT MATH <br>
                                    Not Reported
                                 </p>
                              </article>
                              <article class="span1">
                                 <p>SAT MATH <br>
                                    Not Reported
                                 </p>
                              </article>
                              <article class="span1">
                                 <p>SAT MATH <br>
                                    Not Reported
                                 </p>
                              </article>
                              <article class="span1">
                                 <p>SAT MATH <br>
                                    Not Reported
                                 </p>
                              </article>
                           </section>
                        </div>
                     </article>
                     
                     <article id="major_degree">
                        <div class="span8">
                           <div  id="myTab" class="span5"> <a href="#home">Majors & Degrees</a> <a href="#profile">Location & Contact</a> </div>
                           <section class="span6">
                              <div class="tab-content">
                                 <div class="tab-pane active" id="home">
                                    <h5>Majors &amp; Degrees</h5>
                                    <!--<table class="table">
                                       <tr class="success">
                                          <td> Degrees Offered</td>
                                          <td class="text-success">Associate’s</td>
                                          <td class="text-success">Bachelor’s</td>
                                       </tr>
                                       <tr class="text-error">
                                          <td>Business / marketing</td>
                                          <td></td>
                                          <td></td>
                                       </tr>
                                       <tr class="space">
                                          <td></td>
                                       </tr>
                                       <tr class="error">
                                          <td>Business Management and adminstration</td>
                                          <td><img src="<?php echo base_url()?>assets/img/check_opt.png"></td>
                                          <td></td>
                                       </tr>
                                       <tr  class="text-error">
                                          <td>Communication technologies</td>
                                          <td>&nbsp;</td>
                                          <td></td>
                                       </tr>
                                       <tr  >
                                          <td>Communication technologies</td>
                                          <td>&nbsp;</td>
                                          <td></td>
                                       </tr>
                                       <tr>
                                          <td>Graphic Communications</td>
                                          <td><img src="<?php echo base_url()?>assets/img/check_opt.png"></td>
                                          <td></td>
                                       </tr>
                                       <tr class="text-error">
                                          <td>Computer and information sciences</td>
                                          <td>&nbsp;</td>
                                          <td></td>
                                       </tr>
                                       <tr class="space">
                                          <td></td>
                                       </tr>
                                       <tr class="error">
                                          <td>Network and System Administration</td>
                                          <td><img src="<?php echo base_url()?>assets/img/check_opt.png"></td>
                                          <td></td>
                                       </tr>
                                       <tr class="text-error" >
                                          <td> Engineering technologies</td>
                                          <td></td>
                                          <td></td>
                                       </tr>
                                       <tr class="space">
                                          <td></td>
                                       </tr>
                                       <tr class="error" >
                                          <td>Electrical, Electronic and Communications 
                                             Engineering Technology 
                                          </td>
                                          <td><img src="<?php echo base_url()?>assets/img/check_opt.png"></td>
                                          <td></td>
                                       </tr>
                                       <tr class="error" >
                                          <td> Computer Software Technology </td>
                                          <td><img src="<?php echo base_url()?>assets/img/check_opt.png"></td>
                                          <td></td>
                                       </tr>
                                       <tr class="error" >
                                          <td> Drafting and Design Technology </td>
                                          <td><img src="<?php echo base_url()?>assets/img/check_opt.png"></td>
                                          <td></td>
                                       </tr>
                                       <tr >
                                          <td><a href="#">+More</a></td>
                                          <td></td>
                                          <td></td>
                                       </tr>
                                    </table>-->
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
											echo "<tr><td>".$output->Title."</td></tr>";
										}
									}
									?>
									</table>
                                 </div>
                                 <div class="tab-pane " id="profile">
                                    <h5>Location</h5>
                                    <div id="map">
                                       <!--map code here-->
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
                           </section>
                           </div>
                     </article>
                     </div>
                     <aside class="span4 indv_sidebar">
                        <article>
                           <h3>More School Link Us... </h3>
                           <span class="arrow_b"></span>
                           <ul class="unstyled">
                              <li>
                                 <img src="<?php echo base_url()?>assets/img/The-los-angeles-school.png" alt="The los angeles school">
                                 <div class="list_content">
                                    <h4>The los angeles school</h4>
                                    <p class="city">Hollywood, CA</p>
                                 </div>
                              </li>
                              <li>
                                 <img src="<?php echo base_url()?>assets/img/The-New-Common.png" alt="The New Common school">
                                 <div class="list_content">
                                    <h4>The New Common
                                       school
                                    </h4>
                                    <p class="city">Hollywood, CA</p>
                                 </div>
                              </li>
                              <li>
                                 <img src="<?php echo base_url()?>assets/img/The-New-Common.png" alt="The New Common school">
                                 <div class="list_content">
                                    <h4>The New Common
                                       school
                                    </h4>
                                    <p class="city">Hollywood, CA</p>
                                 </div>
                              </li>
                              <li>
                                 <img src="<?php echo base_url()?>assets/img/The-New-Common.png" alt="The New Common school">
                                 <div class="list_content">
                                    <h4>The los angeles school</h4>
                                    <p class="city">Hollywood, CA</p>
                                 </div>
                              </li>
                           </ul>
                        </article>
                     </aside>
               </section>
            </article>
            </div>
         </div>
         <!--end main-->