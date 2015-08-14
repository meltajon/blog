	</main>

	<div id="categories" class="categories_light">
		<div id="categories-wrapper" class="wrapper">
			<nav id="categories-nav" class="nav" role="navigation">

			<?php if (c::get('is_personal', false) == true): ?>
			<strong class="nav-title"><a class="nav-title-link" href="/personal">Personal</a></strong>
			<ul class="nav-list">
			<?php foreach(page('personal')->index()->visible()->filterBy('is_featured', '1')->flip() as $item): ?>
				<li class="nav-item"><a class="nav-link" href="<?php echo $item->url(); ?>" rel="bookmark"><?php echo html($item->title()) ?></a></li>
			<?php endforeach; ?>
			</ul>
			<?php endif; // is_personal ?>

			</nav><!-- footer-nav -->
		</div><!-- wrapper -->
	</div>
	
	<footer id="footer">
		<div id="footer-wrapper" class="wrapper">
			<nav id="footer-nav" class="nav" role="navigation">
				<a class="footer-link" href="/">Home</a> - 
				<?php if (c::get('is_personal', false) == true): ?>
				<a class="footer-link" href="/about">About Me</a> - 
				<?php else: ?>
				<a class="footer-link" href="http://about.me/meltajon">About Me</a> - 
				<?php endif; ?>
				<!--<a class="footer-link" href="/archive">Archives</a> - 
				<!--<a class="footer-link" href="/tags">Tags</a> - -->
				<!--<a class="footer-link" href="/?s">Search</a> - -->
				<a class="footer-link" href="/feed">RSS Feed</a> - 
				<?php if (c::get('is_personal', false) == true): ?>
				<a class="footer-link" href="http://instagram.com/melmyfinger">Instagram</a>
				<?php else: ?>
				<a href="http://twitter.com/meltajon">Twitter</a>
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
		</div><!-- wrapper -->
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