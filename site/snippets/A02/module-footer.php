	</main>
	
	<footer id="footer">
		<div id="menu"></div>
		<nav id="footer-nav" class="nav" role="navigation">
			<span><a class="footer-link" href="/#top">Home</a></span>
			<?php if (c::get('is_personal', false) == true): ?>
			<span><a class="footer-link" href="/about">About<ins> Me</ins></a></span>
			<?php else: ?>
			<span><a class="footer-link" href="http://about.me/meltajon">About<ins> Me</ins></a></span>
			<?php endif; ?>
			<?php if (c::get('is_personal', false) == true): ?>
			<span><a class="footer-link" href="/personal" >Personal</a></span>
			<span><a class="footer-link" href="/friends" >Friends</a></span>
			<?php else: ?>
			<?php endif; ?>
			<span><a class="footer-link footer-link_active" href="/tech" >Tech<ins>nology</ins></a></span>
			<span><a class="footer-link" href="/design" >Design</a></span>
			<span><a class="footer-link" href="/wisdom" >Wisdom</a></span>
			<span><a class="footer-link" href="/feed">RSS<ins> Feed</ins></a></span>
			<?php if (c::get('is_personal', false) == true): ?>
			<span><a class="footer-link" href="http://instagram.com/melmyfinger">Instagram</a></span>
			<?php else: ?>
			<span><a class="footer-link" href="http://twitter.com/meltajon">Twitter</a></span>
			<?php endif; ?>
		</nav><!-- footer-nav -->
		<small id="copyright">
			Copyright &copy; 1999-2014 
			<?php if (c::get('is_personal', false) == true): ?>
			Mel M. Finger
			<?php else: ?>
			Mel Tajon
			<?php endif; ?>
		</small>
	</footer>

</body>

<script>
// call lower-priority CSS after HTML is fully loaded
$(document).ready(function() {

	if($("body").size()>0){
		if (document.createStyleSheet) {
			// document.createStyleSheet('//www1.moon-ray.com/formeditor/formeditor/css/form.default.css');
		}
		else {
			// $("head").append($('<link rel="stylesheet" media="screen" href="//www1.moon-ray.com/formeditor/formeditor/css/form.default.css" />'));
		}
	}
});
</script>

</html>