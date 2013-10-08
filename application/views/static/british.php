<?php $url = (rand(1,2)==1)?"http://bit.do/w2smsconnect":"http://bit.do/w2smscollege";?>
<?php header( "Refresh:3; url=$url", true, 303);?>
<div role="main" id="main">
	 <div class="row container">
	 <div class="british">
		<div class="sapn3" style="padding: 188px 246px;">
			<button class="surveyButton" onclick="location.replace('<?php echo $url;?>')">Start Survey</button>
		</div>
	 </div>
	 <div class="british-footer">
	 <p>We are registered in England as a charity. Our <a href="http://www.britishcouncil.org/home-privacy-policy.htm" target="_blank">privacy</a> and <a href="http://www.britishcouncil.org/home-copyright-policy.htm" target="_blank">copyright</a> statements.
<a href="http://foi.britishcouncil.org/" target="_blank">Our Freedom of Information Publications Scheme</a>. Double-click for <a href="http://www.britishcouncil.org/home-dictionary.htm" target="_blank">pop-up dictionary</a>.</p>
	 </div>
	 <div class="span12">
		<br>
		<br>
		<br>
	 </div>
	 </div>
</div>