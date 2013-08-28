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
                  <section class="span2">
                     <h5 class="no_margin margin_b_10">Filter Your Search:</h5>
                     <div class="tab_spine clearfix">
                        <h3>Location</h3>
                        <ul class="unstyled">
                           <li><a href="#">50 miles of 24712</a></li>
                           <li><a href="#">West Virginia</a></li>
                        </ul>
                     </div>
                     <div class="tab_spine clearfix">
                        <h3>Collage Type</h3>
                        <ul class="unstyled">
                           <li><a href="#">50 miles of 24712</a></li>
                           <li><a href="#">West Virginia</a></li>
                        </ul>
                     </div>
                     <div class="tab_spine clearfix">
                        <h3>Interest</h3>
                        <ul class="unstyled">
                           <li><a href="#">50 miles of 24712</a></li>
                           <li><a href="#">West Virginia</a></li>
                        </ul>
                     </div>
                     <div class="tab_spine clearfix">
                        <h3>Financial</h3>
                        <ul class="unstyled">
                           <li><a href="#">50 miles of 24712</a></li>
                           <li><a href="#">West Virginia</a></li>
                        </ul>
                     </div>
                     <div class="tab_spine clearfix">
                        <h3>Critical</h3>
                        <ul class="unstyled">
                           <li><a href="#">50 miles of 24712</a></li>
                           <li><a href="#">West Virginia</a></li>
                        </ul>
                     </div>
                     <div class="tab_spine clearfix">
                        <h3>Intex</h3>
                        <ul class="unstyled">
                           <li><a href="#">50 miles of 24712</a></li>
                           <li><a href="#">West Virginia</a></li>
                        </ul>
                     </div>
                  </section>
                  <article class="span3"  id="collegeContent">
                     <p class="text-right">Showing 10/<?php echo $countResults;?> <i class="icon-circle-arrow-right"></i></p>
                     <section class="blog_style">
                        <article class="clearfix">
                           <div class="clearfix">
								<?php 
									foreach ($results as $universities)
									{?>
									<h4 class='pull-left'><?php echo $universities->univName; ?></h4>
									<div class='place pull-right'>Tokyo, Japan</div>
									</div>
									<hr class='clearfix'>
									<div class='content_blog pull-left clearfix'>
									<p>New River Community College is a Public institution 
									 located in Dublin, Virginia in a Rural setting. The fall 
									 application deadlinefor freshman is . The application 
									 requirements include Transcript of high school ...
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
                  <aside class="span4">
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