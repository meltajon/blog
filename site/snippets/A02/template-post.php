<?php snippet('A02/module-header'); ?>
<div class="wrapper">
<?php
$item = $page;
snippet('A02/module-post', array('item' => $item)); 
?>

<?php $siblings = $page->siblings()->index()->filterBy('is_featured', '1')->visible()->flip()->limit('10'); ?>
<?php if ($siblings > '1'): ?>
<aside class="related">
	<h1 class="related-title">Related Posts</h1>
	<ul class="related-list">
	<?php
	foreach($siblings as $sibling):
		snippet('A02/module-related', array('sibling' => $sibling));
	endforeach;
	?>
	</ul>
</aside><!-- related-posts -->
<?php endif; // if page has featured related posts ?>

</div><!-- wrapper -->
<?php snippet('A02/module-footer'); ?>