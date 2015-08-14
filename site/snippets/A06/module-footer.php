	</main>
	
	<footer id="footer">
		<div id="menu"></div>
		<nav id="footer-nav" class="nav" role="navigation">
			<span><a class="footer-link" href="/#top" onClick="ga('send', 'event', 'footer-link', 'click', 'Home');">Home</a></span>

			<?php if (c::get('is_personal', false) == true): ?>
			<span><a class="footer-link" href="/about" onClick="ga('send', 'event', 'footer-link', 'click', 'About Mel My Finger');">About<ins> Me</ins></a></span>
			<span><a class="footer-link" href="/personal" onClick="ga('send', 'event', 'footer-link', 'click', 'Personal');">Personal</a></span>
			<span><a class="footer-link" href="/friends" onClick="ga('send', 'event', 'footer-link', 'click', 'Friends');">Friends</a></span>
			<span><a class="footer-link" href="/buzz" onClick="ga('send', 'event', 'footer-link', 'click', 'Buzzworthy');">Buzzworthy</a></span>
			<span><a class="footer-link" href="/tech" onClick="ga('send', 'event', 'footer-link', 'click', 'Technology');">Technology</a></span>
			<span><a class="footer-link" href="/design" onClick="ga('send', 'event', 'footer-link', 'click', 'Design');">Design</a></span>
			<span><a class="footer-link" href="/wisdom" onClick="ga('send', 'event', 'footer-link', 'click', 'Wisdom');">Wisdom</a></span>
			<?php else: ?>
			<span><a class="footer-link" href="/about" onClick="ga('send', 'event', 'footer-link', 'click', 'About Mel Tajon');">About Me</a></span>
			<span><a class="footer-link" href="/tech" onClick="ga('send', 'event', 'footer-link', 'click', 'Technology');">Technology</a></span>
			<span><a class="footer-link" href="/design" onClick="ga('send', 'event', 'footer-link', 'click', 'Design');">Design</a></span>
			<span><a class="footer-link" href="/wisdom" onClick="ga('send', 'event', 'footer-link', 'click', 'Wisdom');">Wisdom</a></span>
			<span><a class="footer-link" href="/buzz" onClick="ga('send', 'event', 'footer-link', 'click', 'Buzzworthy');">Buzzworthy</a></span>
			<span><a class="footer-link" href="/personal" onClick="ga('send', 'event', 'footer-link', 'click', 'Personal');">Personal</a></span>
			<?php endif; ?>
		</nav><!-- footer-nav -->
		<small id="copyright">
			<ins>Copyright </ins>&copy; 1999-<?php echo date("Y"); ?> 
			<?php if (c::get('is_personal', false) == true): ?>
			Mel M. Finger
			<?php else: ?>
			Mel Tajon
			<?php endif; ?> - 
			<a class="copyright-link" href="/feed" onClick="ga('send', 'event', 'copyright-link', 'click', 'RSS Feed');">RSS Feed</a> - 
			<?php if (c::get('is_personal', false) == true): ?>
			<a class="copyright-link" href="https://instagram.com/melmyfinger" onClick="ga('send', 'event', 'copyright-link', 'click', 'Instagram');">Instagram</a>
			<?php else: ?>
			<a class="copyright-link" href="https://twitter.com/meltajon" onClick="ga('send', 'event', 'copyright-link', 'click', 'Twitter');">Twitter</a>
			<?php endif; ?>
		</small>
	</footer>
</body>

<script>
// call lower-priority CSS after HTML is fully loaded
$(document).ready(function() {

	if($("body").size()>0){
		if (document.createStyleSheet) {
			document.createStyleSheet('//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300italic,400,400italic');
			// document.createStyleSheet('//cloud.typography.com/7950712/692046/css/fonts.css');
			// document.createStyleSheet('_________');
		}
		else {
			$("head").append($('<link rel="stylesheet" media="screen" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300italic,400,400italic" />'));
			// $("head").append($('<link rel="stylesheet" media="screen" href="//cloud.typography.com/7950712/692046/css/fonts.css" />'));
			// $("head").append($('<link rel="stylesheet" media="screen" href="______" />'));
		}
	}
});
</script>

</html>