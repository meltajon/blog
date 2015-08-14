	</main>
	
	<footer id="footer">
		<div id="menu"></div>
		<nav id="footer-nav" class="nav" role="navigation">
			<span><a class="footer-link" href="/#top">Home</a></span>
			<?php if (c::get('is_personal', false) == true): ?>
			<span><a class="footer-link" href="/about">About<ins> Me</ins></a></span>
			<?php else: ?>
			<span><a class="footer-link" href="http://about.me/meltajon">About Me</a></span>
			<?php endif; ?>
			<?php if (c::get('is_personal', false) == true): ?>
			<span><a class="footer-link" href="/personal" >Personal</a></span>
			<span><a class="footer-link" href="/friends" >Friends</a></span>
			<span><a class="footer-link" href="/buzz" >Buzzworthy</a></span>
			<?php else: ?>
			<?php endif; ?>
			<span><a class="footer-link footer-link_active" href="/tech" >Technology</a></span>
			<span><a class="footer-link" href="/design" >Design</a></span>
			<?php if (c::get('is_personal', false) == true): ?>
			<span><a class="footer-link" href="/wisdom" >Wisdom</a></span>
			<?php endif; ?>
		</nav><!-- footer-nav -->
		<small id="copyright">
			<ins>Copyright </ins>&copy; 1999-2014 
			<?php if (c::get('is_personal', false) == true): ?>
			Mel M. Finger
			<?php else: ?>
			Mel Tajon
			<?php endif; ?> - 
			<a class="copyright-link" href="/feed">RSS Feed</a> - 
			<?php if (c::get('is_personal', false) == true): ?>
			<a class="copyright-link" href="http://instagram.com/melmyfinger">Instagram</a>
			<?php else: ?>
			<a class="copyright-link" href="http://twitter.com/meltajon">Twitter</a>
			<?php endif; ?>
		</small>
	</footer>
	<?php if (c::get('is_dev', false) == true): ?>
	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
	<?php endif; ?>
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