<!--main-->
      <div role="main" id="main">
         <div class="row container">
            <article id="college_listing" class="page">
               <ul class="breadcrumb univ_breadcrumb">
                  <li><a href="<?php echo base_url()?>">Home</a> <span class="divider"><i class=" icon-arrow-right"></i></span></li>
                  <li><a href="<?php echo base_url('college')?>">College Search</a> <span class="divider"><i class=" icon-arrow-right"></i></span></li>
                  <li class="active">Search Result</li>
               </ul>
               <div class="clearfix"></div>
               <h2 class="search_header pull-left"><?php echo $countResults;?> Colleges Found</h2>
               <div class="search_input  pull-right">
                  <form class="form-search">
                     <div class="input-append">
                        <input type="text" class="span2 " Placeholder="Search Your Keyword...">
                        <button type="submit" class="btn">Search</button>
                     </div>
                  </form>
               </div>
               <div class="clearfix"></div>
               <div class="row clearfix" id="collage_listing_page">
                  <section class="span3">
                     <h5 class="no_margin margin_b_10">Filter Your Search:</h5>
                     <div class="tab_spine clearfix">
                        <h4>Location</h4>
                        <ul class="unstyled">
                           <li><i class="icon-remove-sign icon-class-red"></i><a href="#">London</a></li>
                           <li><i class="icon-remove-sign icon-class-red"></i><a href="#">Newcastle</a></li>
                        </ul>
                     </div>
                     <div class="tab_spine clearfix">
                        <h4>Degree Type</h4>
                        <ul class="unstyled">
                           <li><i class="icon-remove-sign icon-class-red"></i><a href="#">Foundation</a></li>
                           <li><i class="icon-remove-sign icon-class-red"></i><a href="#">Undergraduate</a></li>
                        </ul>
                     </div>
                     <div class="tab_spine clearfix">
                        <h4>Interest</h4>
                        <ul class="unstyled">
                           <li><i class="icon-remove-sign icon-class-red"></i><a href="#">Science</a></li>
                           <li><i class="icon-remove-sign icon-class-red"></i><a href="#">Commerce</a></li>
                        </ul>
                     </div>
                     <div class="tab_spine clearfix">
                        <h4>Criteria</h4>
                        <ul class="unstyled">
                           <li><i class="icon-remove-sign icon-class-red"></i><a href="#">IELTS</a></li>
                           <li><i class="icon-remove-sign icon-class-red"></i><a href="#">PTE</a></li>
                        </ul>
                     </div>
                     <div class="tab_spine clearfix">
                        <h4>Financials</h4>
                        <ul class="unstyled">
                           <li><i class="icon-remove-sign icon-class-red"></i><a href="#">Below &pound; 5000</a></li>
                           <li><i class="icon-remove-sign icon-class-red"></i><a href="#">Above &pound; 5000</a></li>
                        </ul>
                     </div>
                     <div class="tab_spine clearfix">
                        <h4>Intake</h4>
                        <ul class="unstyled">
                           <li><i class="icon-remove-sign icon-class-red"></i><a href="#">Sept 2013</a></li>
                           <li><i class="icon-remove-sign icon-class-red"></i><a href="#">Jan 2014</a></li>
                        </ul>
                     </div>
                  </section>
                  <article class="span6"  id="collegeContent">
                     <p class="text-right">Showing 10/<?php echo $countResults;?> <i class="icon-circle-arrow-right"></i></p>
                     <section class="blog_style">
                        <article class="clearfix">
                           <div class="clearfix">
								<?php 
									foreach ($results as $universities)
									{?>
									<h4 class='pull-left'><?php echo $universities->univName; ?></h4>
									<div class='place pull-right'>
									<i class="icon-map-marker icon-class-mu"></i>
									<?php 
									echo $this->collegemodel->getUnivLocationById($universities->cityId,$universities->countryId);
									?></div>
									</div>
									<hr class='clearfix'>
									<div class='content_blog pull-left clearfix'>
									<p><?php echo substr($universities->overview,0,200)."...";?>
										</p>
										<p><a href='#'><i class='icon-plus-sign'></i> Add College</a></p>
										</div>
									 <aside class='pull-right' >
									  <button type='submit' class='btn btn-success  btn-mini'>MU Connect</button>
									  <p><a href='#'>Quick View</a></p>
									  <?php
										$link = str_replace(' ','-',$universities->univName);
										$link = preg_replace('/[^A-Za-z0-9\-]/', '',$link);
									  ?>
									  <p><a href="<?php echo base_url().'college/'.$link.'/'.$universities->id?>">View Full Profile</a></p>
									   </aside>
									   </article>
									<article class='clearfix'>
									   <div class='clearfix'>					
								<?php
								}
								?>         
                     </section>
                     <div class="pagination pagination-small" id="my_pagi">
					   <?php echo $links; ?>
					 <!--  <ul>
                           <li><a href="#">&lt;</a></li>
                           <li class="disabled no_border"><a href="#">1/201</a></li>
                           <li ><a href="#">&gt;</a></li>
                        </ul>-->
                     </div>
					 
                  </article>
                  <aside class="span3">
                     <article><img src="<?php echo base_url();?>assets/img/st_georges.png"> </article>
                     <article>
                        <img src="<?php echo base_url();?>assets/img/british-council.png">
                        <h5>international students comprise almost <br>
                           percent of the total student body .<br>
                           Total cost of attendance for most <br>
                           international ...
                        </h5>
                     </article>
                     <article> <img src="<?php echo base_url();?>assets/img/summer.png"></article>
                  </aside>
               </div>
            </article>
         </div>
      </div>
      <!--end main-->
	  <?php $this->load->view('layout/js'); ?>
	  <script>
					$(document).ready(function(){
					
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
					
					</script>