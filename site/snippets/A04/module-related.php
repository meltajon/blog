<?php 
if ($page->isHomepage() == true && c::get('is_personal', false) == true):
	$siblings_featured = $site->index()->filterBy('is_featured', '1')->visible()->flip()->limit('10');
	$siblings = $site->index()->filterBy('is_featured', '!=', '1')->sortBy('date', 'desc')->visible()->limit('5');
elseif ($page->uid() == 'error' && c::get('is_personal', false) == true):
	$siblings_featured = $site->index()->filterBy('is_featured', '1')->visible()->flip()->limit('10');
	$siblings = $site->index()->filterBy('is_featured', '!=', '1')->sortBy('date', 'desc')->visible()->limit('5');
elseif ($page->uid() == 'error' && c::get('is_personal', false) == false):
	$siblings_featured = $site->children()->visible()->children()->filterBy('is_featured', '1')->visible()->flip()->limit('10');
	$siblings = $site->children()->visible()->children()->filterBy('is_featured', '!=', '1')->sortBy('date', 'desc')->visible()->limit('5');
else:
	$siblings_featured = $page->siblings()->filterBy('is_featured', '1')->visible()->flip()->limit('10'); 
	$siblings = $page->siblings()->index()->filterBy('is_featured', '!=', '1')->sortBy('date', 'desc')->filterBy('date', '<', $page->date())->visible()->limit('5');
endif;
?>
<?php if ($siblings > '1'): ?>
	<aside class="related">
		<h1 class="related-title">
			<?php if ($page->isHomepage() == true && c::get('is_personal', false) == true): ?>
			Popular Posts
			<?php else: ?>
			Previous Posts
			<?php endif; ?>
		</h1>
		<ul class="related-list">
		<?php
		foreach($siblings_featured as $sibling):
			$sibling_type = 'Most Read';
			snippet($site->theme() . '/module-related-item', array('sibling' => $sibling, 'sibling_type' => $sibling_type));
		endforeach;

		if ($page->isHomepage() != true):
			foreach($siblings as $sibling):
				$sibling_type = '';
				snippet($site->theme() . '/module-related-item', array('sibling' => $sibling, 'sibling_type' => $sibling_type));
			endforeach;
		endif;
		?>
		</ul>
	</aside><!-- related-posts -->
<?php endif; // if page has featured related posts ?>