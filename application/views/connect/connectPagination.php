<div class="row">
								<div class="span6">
									<p class="text-right">Showing 2/<?php echo $countResults;?> <i class="icon-circle-arrow-right"></i></p>
								</div>
							</div>
					<?php
					$counter=1;
					foreach($results as $connect)
					{
						$univName=$this->connectmodel->getUniversityNameById($connect->univId);
						$location=$this->collegemodel->getUnivLocationById($connect->cityId,$connect->countryId);
					?>
							<div class="row connect-listing">
								<article class="span6">
									<div class="row">
										<div class="span4">
											<div class='content_blog pull-left clearfix'>
												<h4><?php echo $univName;?></h4>
												<hr>
												<p><?php echo $connect->tagLine;?></p>
												<p class="date-time"><i class="icon-calendar"></i>&nbsp;&nbsp;<?php echo $connect->date;?><br>
												<i class="icon-map-marker"></i>&nbsp;&nbsp;<?php echo $connect->time?></p>
											</div>
										</div>
										<div class="span2 mu-connect">
											<aside class="celender">
												<div class="cl"> <small class="date"><?php echo substr($connect->date,3,3);?></small> <small class="day"><?php echo substr($connect->date,0,2);?></small> </div>
												<div class="btn-group">
												<button class="btn dropdown-toggle btn-success btn-mini" data-toggle="dropdown">Get Details <span class="caret"></span></button>
												<ul class="dropdown-menu">
												  <li><a href="javascript:void(0)" onclick='ConnectMU("<?php echo $univName;?>","<?php echo $connect->tagLine;?>","<?php echo $connect->date;?>","<?php echo $location;?>");'><i class="icon-mobile-phone"></i>&nbsp;&nbsp;SMS</a></li>
												  <li><a href="#"><i class="icon-envelope-alt"></i>&nbsp;&nbsp;E-Mail</a></li>
												</ul>
												</div>
												<button class="btn btn-mini btn-primary voilet" type="button" id="attending-<?php echo $counter;?>" onclick="showAttending(this.id);">I am Attending</button>
												Attending <a href="#">+<?php echo $connect->counter;?></a>
											</aside>
										</div>
									</div>
									<div class="row">
										<div class="span6">
											<section id="attending" class="attending-<?php echo $counter;?>" style="display:none;">
												 <div class="input-prepend"> <span class="add-on"><img src="<?php echo base_url();?>assets/img/name-icon.png"></span>
													<input class="input-small" id="name-<?php echo $counter;?>" type="text" placeholder="Full Name:" value="<?php echo ($userData)?$userData['fullname']:'';?>">
												 </div>
												 <div class="input-prepend"> <span class="add-on"><img src="<?php echo base_url();?>assets/img/mail-icon.png"></span>
													<input class="input-small" id="email-<?php echo $counter;?>" type="text" placeholder="Email:" value="<?php echo ($userData)?$userData['email']:'';?>">
												 </div>
												 <div class="input-prepend"> <span class="add-on"><img src="<?php echo base_url();?>assets/img/cell-icon.png"></span>
													<input class="input-small" id="phone-<?php echo $counter;?>" type="text" placeholder="Mobile No:" value="<?php echo ($userData)?$userData['mobile']:'';?>">
												 </div>
												 <input class="input-small" id="connect-<?php echo $counter;?>" value="<?php echo $connect->id;?>" type="hidden">
												 <button class="btn btn-mini btn-primary green_bu" type="button" onclick="attendEvent(<?php echo $counter;?>)">Connect</button>
											</section>
										</div>
									</div>
								</article>
							</div>
					<?php 
					$counter++;
					}?>
							<div class="pagination pagination-small" id="my_pagi">
							<?php echo $links; ?>
							
							</div>
							<script>
								$(document).ready(function(){$('.dropdown-toggle').dropdown();});
							</script>