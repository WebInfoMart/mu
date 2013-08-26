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
									  <button type='submit' class='btn btn-success  btn-mini'>Mu Connect</button>
									  <p><a href='#'>Quick View</a></p>
									  <p><a href="<?php echo base_url().'college/individualCollege/'.$universities->id?>">View Full Profile</a></p>
									   </aside>
									   </article>
									<article class='clearfix'>
									   <div class='clearfix'>					
								<?php
								}
								?>         
                     </section>
                     <div class="pagination pagination-small" id="my_pagi">
					   <?php echo $links;?>
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