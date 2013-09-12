<div class="row">
						<div class="span7">
							<p class="text-right">Showing 10/<?php echo $countResults;?> <i class="icon-circle-arrow-right"></i></p>
						</div>
					</div>
					
					<?php 
					foreach ($results as $universities)
					{
					?>
					<div class="row blog_style">
						<article class="span7">
						  <div class="row">
						   <div class="span1">
						   <?php if($universities->logo){?>
						   <img src="<?php echo base_url()?>assets/univ_logo/<?php echo $universities->logo;?>" alt="<?php echo $universities->univName;?>" title="<?php echo $universities->univName;?>" style="max-width: 70px;margin: 11px 4px;" class="img-polaroid"></img>
						   <?php }else{?>
						   <img src="<?php echo base_url()?>assets/univ_logo/univ.png?>" alt="<?php echo $universities->univName;?>" title="<?php echo $universities->univName;?>" style="max-width: 56px;margin: 13px 14px;" class="img-polaroid"></img>
						   <?php }?>
						   </div>
						   <div class="span6">
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
						   </div>
						  </div>
							<div class="row">
								<div class="span7">
									<div class="row">
										<div class="span3">
										<a class="btn btn-primary btn-mini" href='#'><i class='icon-plus-sign'></i> Add College</a>
										</div>
										<div class="span4 mu-connect">
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
<script>					 
 $(document).ready(function(){
	  
		$("#pagination a").click(function(){
		     
			var url = $(this).attr('href');
			var temp = url.split('/');
			var data = {offset:temp[6],cityName:$("#filtrationCities").val()};
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