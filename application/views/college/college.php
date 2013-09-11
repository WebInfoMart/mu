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
               <h3 class="search_header pull-left"><?php echo $countResults;?> Colleges Found</h3>
               <div class="search_input  pull-right">
                  <!--<form class="form-search">
                     <div class="input-append">
                        <input type="text" class="span2 " Placeholder="Search Your Keyword...">
                        <button type="submit" class="btn">Search</button>
                     </div>
                  </form>-->
               </div>
               <div class="clearfix"></div>
               <div class="row" id="collage_listing_page">
                  <section class="span3">
                     <h5 class="no_margin margin_b_10">Filter Your Search:</h5>
                     <div class="tab_spine clearfix">
                        <h4>Location</h4>
                        <ul class="unstyled">
                           <li id="addingContent">
							<div class="input-prepend">
							  <span class="add-on" onclick="addLocation()" style="cursor:pointer;"><i class="icon-plus blue" style="font-size: 20px;"></i></span>
							  <input class="span2" id="locationFilter" type="text" data-provide="typeahead" data-items="4">
							  <input type="hidden" id="filtrationCities" value=""/>
							</div>
						   </li>
                           <li id="allLocation">All Cities</li>
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
                  <section class="span6" id="collegeContent">
					<div class="row">
						<div class="span6">
							<p class="text-right">Showing 10/<?php echo $countResults;?> <i class="icon-circle-arrow-right"></i></p>
						</div>
					</div>
					
					<?php 
					foreach ($results as $universities)
					{
					?>
					<div class="row blog_style">
						<article class="span6">
							<div class="row">
								<div class="span4">
									<h4><?php echo $universities->univName; ?></h4>
								</div>
								<div class="span2">
									<div class='place pull-right'>
									<i class="icon-map-marker icon-class-mu"></i>
									<?php 
									echo $this->collegemodel->getUnivLocationById($universities->cityId,$universities->countryId);
									?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="span4">
									<div class='content_blog pull-left clearfix'>
									<p><?php echo substr($universities->overview,0,150)."...";?></p>
									</div>
								</div>
								<div class="span2 mu-connect">
									<div class="btn-group">
										<button class="btn dropdown-toggle btn-success btn-mini" data-toggle="dropdown">MU Connect <span class="caret"></span></button>
										<ul class="dropdown-menu">
										  <li><a href="#"><i class="icon-group"></i>&nbsp;&nbsp;In-Person</a></li>
										  <li><a href="#"><i class="icon-phone"></i>&nbsp;&nbsp;On-Tel</a></li>
										  <li><a href="#"><i class="icon-facetime-video"></i>&nbsp;&nbsp;Virtual</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="span6">
									<div class="row">
										<div class="span3">
										<a class="btn btn-primary btn-mini" href='#'><i class='icon-plus-sign'></i> Add College</a>
										</div>
										<div class="span3 mu-connect">
										<?php
											$link = str_replace(' ','-',$universities->univName);
											$link = preg_replace('/[^A-Za-z0-9\-]/', '',$link);
										?>
										<a class="btn btn-info btn-mini" href="<?php echo base_url().'college/'.$link.'/'.base64_encode($universities->id)?>">Univ Details</a>
										</div>
									</div>
								</div>
							</div>
						</article>
					</div>
					<?php
					}
					?> 
					<div class="pagination pagination-small" id="my_pagi">
					   <?php echo $links; ?>
					 <!--  <ul>
                           <li><a href="#">&lt;</a></li>
                           <li class="disabled no_border"><a href="#">1/201</a></li>
                           <li ><a href="#">&gt;</a></li>
                        </ul>-->
                     </div>
				  </section>
                  <aside class="span3">
                     <article><img src="<?php echo base_url();?>assets/img/st_georges.png"> </article>
                     <article onclick="window.open('http://www.britishcouncil.in/why-the-uk')" style="cursor:pointer;">
                        <img src="<?php echo base_url();?>assets/img/british-council.png">
                        <h6 class="british-counsil">The most trusted source of information about studying in the UK, in association with MeetUniv.com outlines the essential information for you to know & where to begin from.Single source , to keep you updated with the happenings in UK education.
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
	  <script src="<?php echo base_url();?>assets/js/bootstrap-dropdown.js"></script>
	  <script src="<?php echo base_url();?>assets/js/bootstrap-typeahead.js"></script>
	  <script>
					$(document).ready(function(){
						
						/*typehead*/
						/* $.get('<?php echo base_url()?>college/cityJsonList',function(data){
									console.log(data);
								}); */
						$('#locationFilter').typeahead({
							source: function(query, process){
								 return $.get('<?php echo base_url()?>/college/cityJsonList',function(data){
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
					function addLocation()
					{
						var location = $("#locationFilter").val();
						if(location!='')
						{
						  var filtrationCities = $("#filtrationCities").val();
							
						  if(filtrationCities.indexOf(location)<=-1)
						  {
							$("#addingContent").after("<li><i class='icon-remove-sign icon-class-red' id='"+location.substring(0,4)+"' onclick='removeCity(\""+location+"\",this.id)'></i>"+location+"</li>");
							
							if(filtrationCities=='')
							{
								$("#allLocation").hide();
								$("#filtrationCities").val(location);
							}
							else
								$("#filtrationCities").val(filtrationCities+","+location);
							
							//alert($("#filtrationCities").val());
							url="<?php echo base_url();?>college/filterByLocation";
							data = {cityName:$("#filtrationCities").val()};
							 $.ajax({
								type	:	'POST',
								data	:	data,
								url		:	url,
								beforeSend: function(){
									$("#collegeContent").css('opicity','0.4');
								},
								success: function(data){
									//alert(data);
									$("#collegeContent").html(data);
									$("#collegeContent").css('opicity','1');
								},
								
							}) 
						  }
						}
					}
					function removeCity(cityName,id)
					{
					  var city = cityName;
					  var filtrationCities = $("#filtrationCities").val();
					  filtrationCities = filtrationCities.replace(city+",","");
					  filtrationCities = filtrationCities.replace(","+city,"");
					  filtrationCities = filtrationCities.replace(city,"");
					  $("#filtrationCities").val(filtrationCities);
					  $("#"+id).parent().remove();
					  url="<?php echo base_url();?>college/filterByLocation";
					  data = {cityName:$("#filtrationCities").val()};
					   $.ajax({
					  	type	:	'POST',
					  	data	:	data,
					  	url		:	url,
					  	beforeSend: function(){
					  		$("#collegeContent").css('opicity','0.4');
					  	},
					  	success: function(data){
					  		//alert(data);
					  		$("#collegeContent").html(data);
					  		$("#collegeContent").css('opicity','1');
					  	},
					  	
					  }) 
					  //if()
					}
					</script>