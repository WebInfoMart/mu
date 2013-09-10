
      <!--Slider-->
      <div id="myCarousel" class="carousel slide">
         <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
         </ol>
         <!-- Carousel items -->
         <div class="carousel-inner">
			<article class="item active">
               <img src="<?php echo base_url()?>assets/img/connect_img.jpg">
               <div class="slider_content" id="career">
                  <h2 class="connect"><img src="<?php echo base_url()?>assets/img/mu-connect.png"></h2>
                  <div id="connect_content" class="clearfix">
                     <article id="univ_connect" class="no_border">
                        <table class="table table-hover">
                           
						<?php
						foreach($connect as $connect)
						{?>   
						   <tr>
                              <td><strong><?php echo substr($this->connectmodel->getUniversityNameById($connect->univId),0,20)."..";?></strong><br>
                                 <small> <?php echo $connect->tagLine;?></small>
                              </td>
                              <td>
                                 <date class="homedate"><?php echo $connect->date?></date>
                                 <div class="place"><?php echo $this->collegemodel->getUnivLocationById($connect->cityId,$connect->countryId);?></div>
                              </td>
                           </tr>
						<?php } ?>
                        </table>
                        <!--<div class="shape4"> <img src="<?php echo base_url()?>assets/img/shape4.png" > </div>-->
                        <!--<h4>Meet Universities Events</h4>
                        <table class="table table-hover">
                           <tr>
                              <td>Campagian </td>
                              <td> Guidence Show </td>
                              <td>Meet</td>
                           </tr>
                        </table>-->
                     </article>
                  </div>
               </div>
               <!--<aside class="slider_content extra_block">
                  <div>
                     <h3>Mubin University</h3>
                     <h4>Roll Royace Exhibition </h4>
                     <p> Exhibition is just About to give you 
                        knowledge of RR Cars
                     </p>
                     <table class="table">
                        <tr>
                           <td>Melbourne stadium <br>
                              24-july-2013 
                           </td>
                           <td><button class="btn sl_bn" type="button">Register now</button>
                              <br>
                              <span>Registred <a href="#">+147</a></span>
                           </td>
                        </tr>
                     </table>
                  </div>
               </aside>-->
            </article>
            <article class="item">
               <img src="<?php echo base_url()?>assets/img/courses.jpg">
               <div class="slider_content" id="cource">
                  <h2 class="no_margin"><img src="<?php echo base_url()?>assets/img/search-courses.png"></h2>
                  <div id="cource_content" class="clearfix">
                     <p><i>Search our database of over 100,000 courses worldwide. Fill in the details below and click on the Start course search button to search for a specific course. </i></p>
                     <aside id="s_search">
                        <p  class="no_margin">
                           <input type="text" placeholder="Search Course">
                           <button class="btn" type="button">Search</button>
                        </p>
                     </aside>
                     <article>
                        <h3>Recently Searched courses:</h3>
                        <p> Humanities, Social and Political Science, Veterinary Medicine, MBA Finance, Accountancy<br>
                           <a href="#">see more</a>
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
                     <button class="btn sl_bn" type="button">Ask our counselor</button>
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
                           <button class="btn btn-small slider_bu" type="button">See Test List</button>
                        </div>
                     </article>
                     <article>
                        <img src="<?php echo base_url()?>assets/img/purchase-test-material.png" class="pull-left adj_img">
                        <div class="para">
                           <h3>Options to purchase test material from multiple sources</h3>
                           <p><i>Need more material for practicing? We are providing you with various options to purchase test material.</i></p>
                           <button class="btn btn-small slider_bu" type="button">More Info</button>
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
							<div class="row">
							<div class="span1">
								<i class="icon-comments-alt"></i>
							</div>
							<div class="span3">
								<h4>Get Counseled</h4>
								<p>Not sure where to start from ?<br>
									Confused start your search here:<br/><br/>
								</p>
								<p><a href="<?php echo base_url('college')?>">College search &rarr;</a></p>
							</div>
							</div>
						</div>
						<div class="span4">
							<div class="row">
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
							<div class="row">
							<div class="span1">
								<i class="icon-laptop"></i>
							</div>
							<div class="span3">
								<h4>Get Coached</h4>
								<p>Help in your application process<br>
									Free Courseware for Exams.<br/><br/>
								</p>
								<p><a href="<a href="<?php echo base_url('learn')?>">IELTS - Academic / English &rarr;</a></p>
							</div>
							</div>
						</div>
						<div class="span4">
							<div class="row">
							<div class="span1">
								<i class="icon-magic"></i>
							</div>
							<div class="span3">
								<h4>Gifted - <small class="txt-info">Know what you excel at?</small></h4>
								<p>Don't know which stream to choose?<br>
									Confused Career choices?
								</p>
								<p><a href="#">I am Gifted &rarr;</a></p>
							</div>
							</div>
						</div>
					</div>
				</div>
				<aside class="span4" id="british_council" onclick="window.open('http://www.britishcouncil.in/why-the-uk')">
					<h4>British Council</h4>
					<p>
						The most trusted source of information about studying in the UK, in association with MeetUniv.com outlines the essential information for you to know & where to begin from.Single source , to keep you updated with the happenings in UK education.
					</p>
				</aside>
			</div>
		</span>
		<span class="span12 bottom-span">
			<div class="row">
				<div class="span8">
					<div class="row">
						<div class="span6">
							<div></div>
							<h3><i class="icon-fast-forward"></i> &nbsp; Want to get into Havard or MIT ?</h3>
							<h5>Let experts help you through the process.</h5>
							<div class="pull-right">
							<button class="btn btn-info" type="button">GET EXPERT HELP NOW</button>
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
						<p><a href="#"> Myths about College Scholarships</a></p>
						<p><a href="#"> Key Steps in the Law Admission Process</a></p>
						<p><a href="#"> List of Rolling Admissions Schools</a></p>
						<p><a href="#"> The Basics of Financial Aid </a></p>
						<p><a href="#">Information for Chinese Students</a></p>
						<p><a href="#"> Information for Indian Students</a></p>
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
      <script>
         $(document).ready(function(){
         						   
         						       $('.carousel').carousel({
             interval: 5000,
         	pause:"hover"
             })
         							   
         						   })
         
         
      </script>
   